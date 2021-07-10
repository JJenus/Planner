<?php
namespace App\Entities;
use CodeIgniter\Entity;
use App\Models\UserModel;
use App\Libraries\Encryptor;
use Brick\Money\Money;
use Brick\Math\RoundingMode;


class Plan extends Entity{
  use \Myth\Auth\AuthTrait;
  
  public function loadProperties(){
    $this->getImages();
    $this->getInfos();
    $this->getOrders();
    return $this;
  }
  
  public function getId(){
    return (new Encryptor())->encode($this->attributes["id"]);
  }
  
	public function getImages(){
	  if (empty($this->attributes["id"]))
    {
        throw new \RuntimeException('Plan must be created before getting images.');
    }
    
    if (empty($this->attributes["images"])) {
      $this->attributes['images'] = (model('PlanImage'))->where('plan_id', $this->attributes["id"])->findAll();
    }
    
    return $this->attributes['images'];
	}
	
	public function getInfos(){
	  if (empty($this->attributes["id"]))
    {
        throw new \RuntimeException('Plan must be created before getting infos.');
    }
    
    if (empty($this->attributes["infos"])) {
      $this->attributes['infos'] = (model('PlanInfo'))->where('plan_id', 1)->findAll();
    }
    
    return $this->attributes['infos'];
	}
	
	public function getOrders(){
	  if (empty($this->attributes["id"]))
    {
        throw new \RuntimeException('Plan must be created before getting infos.');
    }
    
    if (empty($this->attributes["orders"])) {
      $this->attributes["orders"] = (model('OrdersModel'))->where('plan_id', $this->attributes["id"])->findAll();
    }
    if (empty($this->attributes["orders"])) {
      // code...
      $this->orderCount = "0" ;
    }else $this->orderCount = count($this->orders);
    
    return $this->attributes["orders"];
	}
}