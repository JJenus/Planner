<?php
namespace App\Controllers;

class Home extends BaseController
{
  private $auth;
	/**
	 * @var Auth
	 */
	protected $config;

	/**
	 * @var \CodeIgniter\Session\Session
	 */
	protected $session;
	
	public function __construct(){
	  $this->session = service('session');
		$this->config = config('Auth');
		$this->auth = service('authentication');
	}
	
	public function index()
	{
		return view('home', [
		  "config" =>$this->config, 
		  "auth" => $this->auth
		]);
	}
	
	 public function view($page = 'home')
  {
    if ($page == "home") {
      return $this->index();
    }
      if ( ! is_file(APPPATH.'/Views/pages/'. $page. '.php'))
      {
          // Whoops, we don't have a page for that!
          throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
      }
  
      //$data['title'] = ucfirst($page); // Capitalize the first letter
      
      $data = [ 
        'config' => $this->config,
        'auth' => $this->auth,
        'page' => [
          'title' => 'Yohplanner', 
          'desc' => 'What ever'
         ],
      ];
      
	    return view('pages/'.$page, $data);
  } 
}
