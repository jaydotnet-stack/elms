<?php

namespace App\Models;

use CodeIgniter\Model;

class SessionModel extends Model
{

    protected $db;
    var $csrf; 
    public function __construct() {
        $this->csrf = csrf_hash();
        $this->db = db_connect();    
       
	} 

    protected $DBGroup          = 'default';
    protected $table            = 'session';
    protected $primaryKey       = 'session_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['session', 'created_at', 'sessionref'];

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

    public function loadsessionQuerry() {
        $response = $this->db->query("SELECT * FROM session ORDER BY session_id ASC");
        return $response->getResult(); 
    }

    
}
