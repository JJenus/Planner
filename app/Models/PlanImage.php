<?php namespace App\Models;

use CodeIgniter\Model;

class PlanImage extends Model
{
 
    protected $table = 'plan_images';
   
    protected $primaryKey = 'id';

  #  protected $useSoftDeletes = true;
    
    protected $allowedFields = [
        'plan_id', 'url', 'type'
    ];
    

    protected $useTimestamps = true;

    protected $validationRules = [                                        
        'plan_id'    => 'required', 
        'url'    => 'required',
        'type' => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
    
} 