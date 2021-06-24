<?php namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Plan;
use App\Libraries\Encryptor;

class planModel extends Model
{
  #
    # UPDATE TO ADD plan TYPE VALIDATION
  #
    protected $table = 'plan';
    protected $primaryKey = 'id';
    public $sponsor;

    protected $returnType = plan::class;
   # protected $useSoftDeletes = true;
    
    protected $allowedFields = [
        'user_id', 'category', 'dimension', 'cost'
    ];
    

    protected $useTimestamps = true;

    protected $validationRules = [
        'user_id' => 'required', 
        'category'         => 'required',
        'dimension'      => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    # protected $afterInsert = ['startplan'];
    
    
    
    /*
      * $query = $this->db->query("SELECT * FROM date_data ORDER BY id DESC LIMIT 1");
      * $result = $query->result_array();
      * return $result; 
    */
    public function getLast($n){
      return $this->db
      ->query(
        "SELECT * FROM plans Order By created_at DESC limit ".$n
      )->getRow();
    }
    
    public function startplan(){
      $this->getplan()->assignToUsers() ;
    } 
    
    public function getPlan(){
      $plan = $this->db
        ->query(
          "SELECT * FROM plans where sponsor=".$this->sponsor." Order By created_at DESC limit 1"
        )->getRow(0, $this->returnType);
      
      return $plan;
    }
    
} 