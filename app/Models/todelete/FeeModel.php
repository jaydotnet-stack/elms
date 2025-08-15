<?php

namespace App\Models;

use CodeIgniter\Model;

class FeeModel extends Model
{

    protected $db;
    var $csrf; 
    public function __construct() {
        $this->csrf = csrf_hash();
        $this->db = db_connect();    
        
	}     


    protected $DBGroup          = 'default';
    protected $table            = 'fee';
    protected $primaryKey       = 'fee_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['fee_code', 'fee_class_category', 'fee_description', 'fee_amount'];

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

    public function processfeetypemodel(){
        extract($_POST);
        $this->feemodel = new FeeModel();         
        $query = $this->db->query("SELECT * FROM fee WHERE fee_code = '$feecode' || fee_description = '$feedescription'");
        $num_rows =  $query->getNumRows();
        if ($num_rows==0){
            $data = [
                'fee_code'                =>  strtoupper($feecode),
                'fee_description'         =>  strtoupper($feedescription)
            ];   
            
            if($this->feemodel->insert($data)){
                return [
                    'status' => 1, 
                    'message' => 'Fee type added successfully',
                    'newtoken' => $this->csrf
                ];
            }else{
                return [
                    'status' => 0, 
                    'message' => 'Error adding fee type',
                    'newtoken' => $this->csrf
                ];
            }

        }else{
            $result = $query->getResult();

            $tablefeedescription = $result[0]->fee_description;  

            if($tablefeedescription == $feedescription){
                return [
                    'status' => 0, 
                    'message' => 'Fee description exists',
                    'newtoken' => $this->csrf
                ];
            }else{
                $data = [
                    'fee_description'         =>  $feedescription
                ];

                if($this->db->table('fee')->where('fee_code', $feecode)->update($data)){
                    return [
                        'status' => 1, 
                        'message' => 'Fee type updated successfully',
                        'newtoken' => $this->csrf
                    ];			
                }else{
                    return [
                        'status' => 0, 
                        'message' => 'Error updating fee type',
                        'newtoken' => $this->csrf
                    ];
                }

            }

        }
    }    

    public function getfeetypedtmodel(){
			
        $query = $this->db->query("SELECT * FROM fee ORDER BY fee_code ASC");
        $num_rows =  $query->getNumRows();        
        if ($num_rows > 0){
            # Creating a json data from the result returned
            # ---------------------------------------------
            $sn = 0;
            $sOutput = '{';
            $sOutput .= '"aaData": [ ';   
            foreach ($query->getResult() as $row) {
                $sn++;

                $button1    =   "<button type='button' class='btn btn-success' value='".$row->fee_code."' onclick='editFeeType(this.value)'>Edit</button>";

                $button2    =   "<button type='button' class='btn btn-danger' value='".$row->fee_code."' onclick='deleteFeeType(this.value)'>Delete</button>";

                $buttons = "<center>" . $button1 . ' ' . $button2 . "</center>";
                
                $sOutput .= "[";
                $sOutput .= '"'. $sn . '",';
                $sOutput .= '"'. $row->fee_code . '",';
                $sOutput .= '"'. $row->fee_description . '",';
                $sOutput .= '"'.$buttons.'",';
                $sOutput = substr_replace( $sOutput, "", -1 );
                $sOutput .= "],"; 
                           
            }
            $sOutput = substr_replace( $sOutput, "", -1 );
            $sOutput .= '] }';	
        }else{
            $sOutput = 0;
        }
        return $sOutput;
    }   
  
    public function deletefeetypemodel(){
        $feecode = $_POST['feecode'];
        $query = $this->db->query("DELETE FROM fee WHERE fee_code = '$feecode'");   
        if ($query){
            return ['status' => 1, 'message' => 'Fee type deleted successfully', 'fee' => 0, 'newtoken' => $this->csrf];
        }else{
            return ['status' => 0, 'message' => 'Unable to delete fee type', 'fee' => 0, 'newtoken' => $this->csrf];
        } 	
    }    
    
    public function editfeetypemodel(){
        $feecode = $_POST['feecode'];
        $query = $this->db->query("SELECT * FROM fee WHERE fee_code = '$feecode'");
        $num_rows =  $query->getNumRows();        
        if ($num_rows > 0){
            return ['status' => 1, 'message' => '', 'fee' => $query->getResult(), 'newtoken' => $this->csrf];
        }else{
            return ['status' => 0, 'message' => '', 'fee' => 0, 'newtoken' => $this->csrf];
        } 	
    }    
    
    public function getfeetypemodel(){
        $query = $this->db->query("SELECT * FROM fee ORDER BY fee_code ASC");
        $num_rows =  $query->getNumRows();        
        if ($num_rows > 0){
            return ['status' => 1, 'message' => '', 'fee' => $query->getResult(), 'newtoken' => $this->csrf];
        }else{
            return ['status' => 0, 'message' => '', 'fee' => 0, 'newtoken' => $this->csrf];
        } 	
    }    
}
