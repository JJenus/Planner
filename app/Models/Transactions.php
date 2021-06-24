<?php namespace App\Models;

use CodeIgniter\Model;

class Transactions extends Model
{
 
    protected $table = 'invoices';
   
    protected $primaryKey = 'id';

    protected $useSoftDeletes = true;
    
    protected $allowedFields = [
        'transaction_ref', 'user_id', 'amount'
    ];
    

    protected $useTimestamps = true;

    protected $validationRules = [                                        
        'transaction_ref'    => 'required', 
        'user_id'    => 'required',
        'amount'    => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
    
} 