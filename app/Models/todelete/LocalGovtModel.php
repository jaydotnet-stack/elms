<?php

namespace App\Models;

use CodeIgniter\Model;

class LocalGovtModel extends Model
{
    protected $db;
    var $csrf; 
    public function __construct() {
        $this->csrf = csrf_hash();
        $this->db = db_connect();     

	}     

    protected $DBGroup          = 'default';
    protected $table            = 'locals';
    protected $primaryKey       = 'local_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
          'state_id',
        'local_name'
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

    #<!---THIS FUNCTION LOADS STATEs ARM SELECT OPTIONS TO THE ANY FORM WHERE IT IS REQUIRED FORM --->#
    public function selectlocalgovt(){
        $this->localgovtmodel;
        $query =  $this->db->query("SELECT * FROM locals ORDER BY local_name ASC");
        return $query->getResult(); 
    }


    #<!---THIS FUNCTION LOADS STATEs ARM SELECT OPTIONS TO THE ANY FORM WHERE IT IS REQUIRED FORM --->#
    public function seleclga(){
        $this->localgovtmodel;
        $state_id= $_GET['stateid'];
        $query =  $this->db->query("SELECT * FROM locals WHERE state_id = '$state_id' ORDER BY local_name ASC");
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
