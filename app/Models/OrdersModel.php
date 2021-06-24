<?php namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
 
    protected $table = 'orders';
   
    protected $primaryKey = 'id';

    protected $useSoftDeletes = true;
    
    protected $allowedFields = [
        'plan_id', 'user_id', 'status', 'file'
    ];
    

    protected $useTimestamps = true;

    protected $validationRules = [                                        
        'plan_id'    => 'required', 
        'user_id'    => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
    
} 