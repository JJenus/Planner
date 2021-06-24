<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class InitializeApp extends BaseController
{
  private $groups = [
    'admin' => 'Users with supreme powers', 
    'buyer' => 'Users that can place orders', 
    'seller' => 'Users with right to sell their works'
  ];
  
  public $setupErrors = [];
  private $auth;
  
  public function __construct(){
    $this->auth = service('authorization'); 
  } 
  
	public function index()
	{
		foreach ($this->groups as $group => $desc) {
		  $this->createGroup($group, $desc);
		}
		
		if (!empty($this->setupErrors)) {
		  return json_encode($this->setupErrors);
		} 
		
		return '<h1> App successfully initiated</h1>';
	}
	
	public function createGroup($group, $desc)
    {
      if (empty($group) || empty($desc)) {
        $this->setupErrors[] = "group or description is empty";
        return false;
      }
    	
      $id = $this->auth->createGroup($group, $desc);
    
    	if(!$id){
    	  $this->setupErrors[] = 'failed to create '. $group;
    	}
    	
    }
    
    public function promote($id){
      if (empty($id)) {
        return "User id can't be empty";
      }
      $id = intval($id);
    	$res = $this->auth->addUserToGroup($id, 1);
      
      if($res) {
        return true;
      }
      return false;
    }
}


        /*
        $userId = $this->authenticate->id();
    	  $good = $this->auth->hasPermission('blog.posts.view', $userId);
    	
        if ($this->request->getMethod() === 'post') 
        {
            echo view('news/success');
        }
        */