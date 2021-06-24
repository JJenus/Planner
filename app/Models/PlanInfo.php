<?php namespace App\Models;

use CodeIgniter\Model;

class PlanInfo extends Model
{
 
    protected $table = 'plan_info';
   
    protected $primaryKey = 'id';

    # protected $useSoftDeletes = true;
    
    protected $allowedFields = [
        'plan_id', 'name', 'value'
    ];
    

    protected $useTimestamps = true;

    protected $validationRules = [                                        
        'plan_id'    => 'required', 
        'name'    => 'required',
        'value' => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
    
} 