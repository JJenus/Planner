<?php

namespace App\Controllers;
use CodeIgniter\HTTP\Response;
use CodeIgniter\Files\File;
use CodeIgniter\Controller;
use App\Entities\Plan;
use App\Libraries\Encryptor;

class PlanController extends Controller
{
  use \Myth\Auth\AuthTrait;
  protected $auth;
	/**
	 * @var Auth
	 */
	protected $config;

	/**
	 * @var \CodeIgniter\Session\Session
	 */
	protected $session;
	
	protected $returnType = Plan::class;
	                                                                                                               
  public function __construct()
	{
	 // $this->restrict(route_to('login'));
		// Most services in this controller require
		// the session to be started - so fire it up!
		$this->session = service('session');
		$this->auth = service('authentication');
		
		$this->config = config("Auth");
		
		$this->setupAuthClasses();
	}
	
	public function addToCart(){
	  $cart = service('cart');
	  if(isset($_POST['addToCart'])){
	    $data = $this->request->getPost('plan');
	    $cart->insert($data);
	    $last = $cart->contents()[(count($cart->contents()) - 1)];
	    $id = $last["rowid"];
	    $this->reply(json_encode(
	      ["status" => "ok", "rowId"=> $id]
	    ));
	  } else if(isset($_POST['removeFromCart'])){
	    $cart->remove($this->request->getPost('rowId'));
	  }
	}
	
	public function processImages(){
	  $res = array(
      "status" => false, 
      "report" => []
    );
	  if($imagefile = $this->request->getFiles())
    {
      $movedImgs = [];
       foreach($imagefile['images'] as $img)
       {
          if ($img->isValid() && ! $img->hasMoved())
          {
               $newName = $img->getRandomName();
               $img->move(FCPATH.'uploads', $newName);
               $movedImgs[] = $newName;
          } else $res['report'][] = "Invalid file type";
       }
       $res['status'] = 'ok';
       $res['data'] = $movedImgs;
       
       return $this->reply(json_encode($res));
    }else $res['report'][] = "No files received";
    
    $this->reply (json_encode($res));
	}
	
  public function savePlan(){
    if(!$this->auth->check()){
      return $this->reply(
        json_encode([
          "status" => false, 
          "report" => "You are not logged in or session expired"
        ])
      );
    } 
    $rules = [
      "category" => "required", 
      "dimension" => "required",
      'price-basic' => 'required', 
      "images" => "required", 
      "attr" => "required"
    ];
    
    if (!$this->validate($rules)) {
      $output = json_encode(
        array(
          "status" => false, 
          "report" => "Form entries validation failed",
          "errors" => service("validation")->getErrors()
        ) 
      );
      return $this->reply($output);
    }
    
    helper('auth');
    $plans = model('PlanModel');
    
    $allowed = [
      "user_id" => user()->id, 
      "category" => $this->request->getPost("category"), 
      "dimension" => $this->request->getPost("dimension"), 
      "cost" => $this->request->getPost("price-basic")
    ];
    $plan = new Plan($allowed);
    
    
    $saved = $plans->save($plan);
    
    if (!$saved) {
      $output = json_encode(
        array(
          "status" => false, 
          "report" => "Failed to create plan",
          "errors" => $plans->errors() 
        ) 
      );
      return $this->reply($output);
    }
    
    $planId = $plans->insertID();
    $attrs = [];
    if($infos = $this->request->getPost("attr") ){
      foreach ($infos as $attr) {
        $attrs[] = [
          'plan_id' => $planId, 
          'name' => $attr['name'], 
          'value' => $attr['value']
        ];
      }
    }
    
    (model('PlanInfo'))->insertBatch($attrs);
    
    $images_set = [];
    if($images = $this->request->getPost("images") ){
      
      foreach ($images as $image) {
        #return $image;
        $dir = FCPATH.'uploads/'.$image;
        $path = 'uploads/' .(new Encryptor())->encode($planId);
        if( is_dir(FCPATH.$path) === false )
        {
            mkdir(FCPATH.$path);
        } 
        $path .= '/'.$image;
        (service('image'))->withFile($dir)->save(FCPATH.$path);
  
        unlink($dir);
        
        $images_set[] = [
          'plan_id' => $planId, 
          'url' => base_url().'/'.$path, 
          'type' => 'plan'
        ];
      }
    }
    
    (model('PlanImage'))->insertBatch($images_set); 
    
    $res = array(
      "status" => "ok", 
      "data" => [
        $attrs, $images_set
      ]
    );
    
    
    $res['report']  = "plan created successfully";
    
    
    $this->reply(json_encode($res));
  } 
  
  public function viewPlan($id){
    $n_id = (new Encryptor())->decode($id);
    $plan = (model ('PlanModel'))->where('id = ', $n_id);
    $plan->loadProperties();
    
    $data = [
      'config' => $this->config, 
      'plan' => $plan
    ];
    
    return view('pages/plan_view', $data);
  }
  
  public function getPlans(){
    $this->setupAuthClasses();
    helper('auth'); 
    $user = user();
    $plansModel = model("PlanModel");
    $limit =  intval( $this->request->getPost("limit")) ;
    $begin = intval($this->request->getPost("begin"));
    
    if (!isset($limit) || !isset($begin)) {
      $output = json_encode(
        array(
          "status" => false,
          "data" => [
            "limit" => $limit, 
            "offset" => $begin
           ], 
          "error" => [
            "report" => "limit or offset is not set" 
          ]
        ) 
      );
      
      return $this->reply($output); 
    }
    
    $offset = "LIMIT ". ($begin > 0 ? $begin.",".$limit : "". $limit) ;
    
    $plans = $plansModel->db->query("SELECT * from plan ORDER BY created_at DESC ". $offset)->getResult('array');
    
    foreach ($plans as $key => $val) {
      $plan = (new Plan($val))->loadProperties();
      $plans[$key]['images'] = $plan->images;
      $plans[$key]['infos'] = [];
      foreach($plan->infos as $info){
        $plans[$key]['infos'][$info['name']] = $info['value'];
      } 
    }
  
    
    if(count($plans) < 1)
      $report = "No plan was found";
    else{
      $report = count($plans). " plan(s) were retrieved";
    }
    
    $output = json_encode(
      array(
        "status" => true, 
        "report" => $report,
        "data" =>[
          "plans" => $plans, 
          "count" => $plansModel->countAll() 
        ] 
      ) 
    );
    
    $this->reply($output);
  }
  # END OF CONTROLLER 
  public function fbInsert(){
    $money = Money::of(108.98, 'USD');
    [$a, $b, $c] = $money->split(3, RoundingMode::DOWN);
    return 
    "<h1>Total: $money <br> 
      A: $a <br>
      B: $b <br>
      C: $c
    </h1>";
  }
  
  private function reply ($output){
    $response = service('response');
    $response->setStatusCode(Response::HTTP_OK);
    $response->setBody($output);
    $response->setHeader('Content-type', 'application/json');
    $response->noCache();
    
    // Sends the output to the browser
    // This is typically handled by the framework
    $response->send();
    exit();
  } 
}