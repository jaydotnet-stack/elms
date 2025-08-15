<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassCategoryModel extends Model
{

    protected $db;
    var $csrf; 
    public function __construct() {
        $this->csrf = csrf_hash();
        $this->db = db_connect();    
       
	} 

    protected $DBGroup          = 'default';
    protected $table            = 'classescategory';
    protected $primaryKey       = 'classescategory_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['classescategory_name', 'updated_by'];

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

    public function getclasscategorymodel(){
        $query = $this->db->query("SELECT * FROM classescategory ORDER BY classescategory_name ASC");
        $num_rows =  $query->getNumRows();        
        if ($num_rows > 0){
            return [
                'status' => 1, 
                'classescategory' => $query->getResult(), 
                'newtoken' => $this->csrf
            ];
        }else{
            return ['status' => 0, 'classescategory' => 0, 'newtoken' => $this->csrf];
        } 	
    }
}
