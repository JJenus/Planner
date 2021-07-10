<?php
namespace App\Controllers;
use CodeIgniter\HTTP\Response;
use CodeIgniter\Controller;


class Application extends Controller
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
	
  private $path = null;
  
  public function __construct(){
    $this->restrict(route_to('login'));
		$this->session = service('session');

		$this->config = config('Auth');
		$this->auth = service('authentication');
		
		helper('auth'); 
		
    /*$this->user = user();
    $this->user->getRoles();
    $this->user->getPermissions();*/
  }
  
  public function index(){
    helper('auth');  
    $data = [
      'user' => user(), 
      'config' => $this->config,
      'auth' => $this->auth,
    ]; 
    
    return view('app/overview', $data);
  }
  
  public function view($page = 'home')
  {
    
    
      if ( ! is_file(APPPATH.'/Views/app/'. $page. '.php'))
      {
          // Whoops, we don't have a page for that!
          throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
      }
  
      //$data['title'] = ucfirst($page); // Capitalize the first letter
      if($this->path === 'app'){
        $data = [
          'config' => $this->config,
          'auth' => $this->auth,
        ]; 
        
        return view('app/'.$page, $data);
      }
      
      $data = [
        'user' => 'Sponsor', 
        'config' => $this->config,
        'auth' => $this->auth,
        'page' => $page,
        'path'=> base_url(). '/app', 
      ];
      
      
      
	    return view('admin/'. $page, $data);
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