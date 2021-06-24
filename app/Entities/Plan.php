<?php
namespace App\Entities;
use CodeIgniter\Entity;
use App\Models\UserModel;
use App\Libraries\Encryptor;
use Brick\Money\Money;
use Brick\Math\RoundingMode;


class Plan extends Entity{
  use \Myth\Auth\AuthTrait;
  public $images;
  public $infos;
  public $orders;
  public $orderCount = 0;
  public $likes;
  
  
  
  public function loadProperties(){
    $this->getImages();
    $this->getInfos();
    $this->getOrders();
    return $this;
  }
  
  
	public function getImages(){
	  if (empty($this->id))
    {
        throw new \RuntimeException('Plan must be created before getting images.');
    }
    
    if (empty($this->images)) {
      $this->images = (model('PlanImage'))->where('plan_id', $this->id)->findAll();
    }
    
    return $this->images;
	}
	
	public function getInfos(){
	  if (empty($this->id))
    {
        throw new \RuntimeException('Plan must be created before getting infos.');
    }
    
    if (empty($this->infos)) {
      $this->infos = (model('PlanInfo'))->where('plan_id', $this->id)->findAll();
    }
    
    return $this->infos;
	}
	
	public function getOrders(){
	  if (empty($this->id))
    {
        throw new \RuntimeException('Plan must be created before getting infos.');
    }
    
    if (empty($this->orders)) {
      $this->orders = (model('OrdersModel'))->where('plan_id', $this->id)->findAll();
    }
    if (empty($this->orders)) {
      // code...
      $this->orderCount = "0" ;
    }else $this->orderCount = count($this->orders);
    
    return $this->orders;
	}
}