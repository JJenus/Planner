<?php namespace App\Models;

use CodeIgniter\Model;

class Orders extends Model
{
 
    protected $table = 'orders';
   
    protected $primaryKey = 'id';

    #protected $useSoftDeletes = true;
    
    protected $allowedFields = [
        'plan_id', 'user_id', 'cost', 'status'
    ];
    

    protected $useTimestamps = true;

    protected $validationRules = [                                        
        'plan_id'    => 'required', 
        'user_id'    => 'required',
        'cost'    => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
    
} 