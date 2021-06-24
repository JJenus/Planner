<?php namespace App\Models;

use CodeIgniter\Model;

class FavoritesModel extends Model
{
 
    protected $table = 'favorites';
   
    protected $primaryKey = 'id';

    #protected $useSoftDeletes = true;
    
    protected $allowedFields = [
        'plan_id', 'user_id', 
    ];
    

    protected $useTimestamps = true;

    protected $validationRules = [                                        
        'plan_id'    => 'required', 
        'user_id'    => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
    
} 