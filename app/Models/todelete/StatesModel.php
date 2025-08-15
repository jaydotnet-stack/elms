<?php

namespace App\Models;

use CodeIgniter\Model;

class StatesModel extends Model
{
    protected $db;
    var $csrf; 
    public function __construct() {
        $this->csrf = csrf_hash();
        $this->db = db_connect();     

	}     

    protected $DBGroup          = 'default';
    protected $table            = 'states';
    protected $primaryKey       = 'state_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'names'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    #<!---THIS FUNCTION LOADS STATEs SELECT OPTIONS TO THE ANY FORM WHERE IT IS REQUIRED FORM --->#
    public function selectstate(){
        $this->statesmodel;
        $query =  $this->db->query("SELECT * FROM states ORDER BY names ASC");
        return $query->getResult(); 
    }
    
    //refine post 
    public function refineInput($data) {	
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }     
}
