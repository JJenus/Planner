<?php

namespace App\Controllers;
use CodeIgniter\HTTP\Response;
use CodeIgniter\Controller;
use App\Libraries\Encryptor;


class Dashboard extends Controller
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
	
  public function __construct()
	{
	  
	  # TRACE THIS->AUTH IN dashboard PAGES
	  #$this->restrictToGroups(['admin'] , route_to('login') );
		// Most services in this controller require
		// the session to be started - so fire it up!
		$this->session = service('session');

		$this->config = config('Auth');
		$this->auth = service('authentication');
		
		$this->setupAuthClasses();
	}
	
    public function index()
    {  
      $userModel = model('UserModel');
      helper('auth'); 
      
        $data = [
          'user' => user(), 
          'config' => $this->config, 
          'auth' => $this->auth, 
          'page' => 'overview', 
          'path'=> base_url(). '/admin', 
          'users' => [
            'all' => $userModel->orderBy('created_at', 'desc')->findAll(), 
            'latest' => $userModel->getLatest(), 
            'count' => $userModel->countAll(), 
            'engagementData' => $userModel->getUsersByMonth()
          ], 
        ];
        
		    return view('dashboard/overview', $data);
    }
    
    public function view($page = 'overview')
    {
        helper('auth');
        
        if ($page == 'overview') {
          return $this->index();
        }
        
        if ( ! is_file(APPPATH.'/Views/dashboard/'. $page. '.php'))
        {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        
        //$data['title'] = ucfirst($page); // Capitalize the first letter
    
        $data = [
          'dashboard' => "true",
          'user' => user(), 
          'config' => $this->config,
          'auth' => $this->auth,
          'page' => $page,
          'path'=> base_url(). '/dashboard', 
        ];
       
        
        if ($page === 'users') {
          $data['users'] = (model('UserModel'))->orderBy('created_at', 'desc')->findAll() ;
        }
        else if($page === 'plans'){
          $plans = (model('PlanModel'))->findAll();
          
          foreach ($plans as $key => $val){
            $plans[$key]->loadProperties();
            $plans[$key]->id = (new Encryptor())->encode($val->id);
          } 
          $data['plans'] = $plans;
        } 
        else if($page === 'transactions'){
          $data['transactions'] = (model('Transactions'))->findAll();
        } 
        else if($page === 'orders'){
          $data['orders'] = (model('Orders'))->findAll();
        } 
        
		    return view('dashboard/'. $page, $data);
    }
    
    public function get($req){
      $model = model('UserModel');
      helper('auth');
      $output = json_encode(
        array(
          "user"=>user(), 
          "engagementData" => $model->getUsersByMonth() /*['data'=> [2, 19, 9]]*/
        )
      );
      
      $this->reply($output);
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
  
    
    public function createGroup($group)
    {
      
     # $this->setupAuthClasses();
    	
      $id = $this->authorize->createGroup($group, 'Users that post and review blog posts.');
    
    	if($id){
    	  echo "created user ".$group." with id: ".$id;
    	} else{
    	  echo $group. ' failed: ';
    	}
    	
        /*
        $userId = $this->authenticate->id();
    	  $good = $this->authorize->hasPermission('blog.posts.view', $userId);
    	
        if ($this->request->getMethod() === 'post') 
        {
            echo view('news/success');
        }
        */
        
    }
    
    public function promote($id=900){
      $id = intval($id);
    	$res = $this->authorize->addUserToGroup($id, 1);
      if($res) {
        echo "<h1> User ".$id. " promoted to dashboard successfully.</h1>";
      }else{
        echo "<h1> Unknown error occurred: <br>". $res."</h1>";
      }
      
    }
    
}