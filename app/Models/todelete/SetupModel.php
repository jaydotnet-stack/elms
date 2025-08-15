<?php

namespace App\Models;

use CodeIgniter\Model;

class SetupModel extends Model
{

    protected $db;
    var $csrf; 
    public function __construct() {
        $this->csrf = csrf_hash();
        $this->db = db_connect();    
        
	} 

    protected $DBGroup          = 'default';
    protected $table            = 'feesetup';
    protected $primaryKey       = 'feesetup_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['feesetup_class_category', 'feesetup_class_level', 'feesetup_fee_description', 'feesetup_session', 'feesetup_term', 'feesetup_amount'];

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

    public function processfeesetupmodel(){
        extract($_POST);
        $this->setupmodel = new SetupModel();   
        $feesstring = explode(",", $fees);
        $amount = 0;
        for($i = 0; $i < count($feesstring); $i++){
            $tempfeesstring =  $feesstring[$i]; 
            $tempfeesstring =  explode(":", $tempfeesstring);
            $amount += $tempfeesstring[1];
        }

        $query = $this->db->query("SELECT * FROM feesetup WHERE feesetup_class_level = '$classlevel' AND feesetup_session = '$session' AND feesetup_term = '$term'");
        $num_rows =  $query->getNumRows();
        if ($num_rows==0){

            $data = [
                'feesetup_class_category'   =>  $classcategory,
                'feesetup_class_level'      =>  $classlevel,
                'feesetup_fee_description'   =>  $fees,
                'feesetup_session'          =>  $session,
                'feesetup_term'             =>  $term,
                'feesetup_amount'            =>  $amount
            ];   
            
            if($this->setupmodel->insert($data)){
                return [
                    'status' => 1, 
                    'message' => 'Fee setup added successfully',
                    'newtoken' => $this->csrf
                ];
            }else{
                return [
                    'status' => 0, 
                    'message' => 'Error adding fee setup',
                    'newtoken' => $this->csrf
                ];
            }

        }else{

            $data = [
                'feesetup_fee_description'   =>  $fees,
                'feesetup_amount'            =>  $amount
            ];

            $query = $this->db->query("UPDATE feesetup SET feesetup_fee_description = '$fees', feesetup_amount =  $amount WHERE feesetup_class_level = '$classlevel' AND feesetup_session = '$session' AND feesetup_term = '$term'");            

            if($query){
                return [
                    'status' => 1, 
                    'message' => 'Fee setup updated successfully',
                    'newtoken' => $this->csrf
                ];			
            }else{
                return [
                    'status' => 0, 
                    'message' => 'Error updating fee setup',
                    'newtoken' => $this->csrf
                ];
            }

        }
    }     

    public function getfeesetupdtmodel(){
			
        $query = $this->db->query("SELECT * FROM feesetup ORDER BY feesetup_id ASC");
        $num_rows =  $query->getNumRows();        
        if ($num_rows > 0){
            # Creating a json data from the result returned
            # ---------------------------------------------
            $sn = 0;
            $sOutput = '{';
            $sOutput .= '"aaData": [ ';   
            foreach ($query->getResult() as $row) {
                $sn++;

                $button1    =   "<button type='button' class='btn btn-primary' value='".$row->feesetup_id."' onclick='editFeeSetup(this.value)'>Edit</button>";

                $button2    =   "<button type='button' class='btn btn-warning' value='".$row->feesetup_id."' onclick='viewFeeDetails(this.value)'>View</button>";

                $buttons = "<center>" . $button1 . ' ' . $button2. "<center>";




                // $classname = explode(" ", $row->feesetup_class_level);
                $classname = $row->feesetup_class_level;
                // $classname = $classname[0] . '' . $classname[1];

                $sOutput .= "[";


                $sOutput .= '"'. $sn . '",';
                $sOutput .= '"'. $row->feesetup_session . '",';
                $sOutput .= '"'. $row->feesetup_term . '",';
                $sOutput .= '"'. $classname . '",';
                $sOutput .= '"'. $row->feesetup_amount . '",';
                $sOutput .= '"'. $buttons .'",';

                // $sOutput .= '"'. $sn . '",';
                // $sOutput .= '"'. 'fdfd' . '",';
                // $sOutput .= '"'. 'fdfd' . '",';
                // $sOutput .= '"'. 'fdfd' . '",';
                // $sOutput .= '"'. 'fdfd' . '",';
                // $sOutput .= '"'. 'fdfd' . '",';


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

    public function getstudentfeebyoptionsdtmodel(){
		$session = $_GET['session'];
		$term = $_GET['term'];
		$classlevel = $_GET['classlevel'];
        $query = $this->db->query("SELECT * FROM feesetup WHERE feesetup_session = '$session' && feesetup_term = '$term' && feesetup_class_level = '$classlevel' ORDER BY feesetup_id ASC");
        $num_rows =  $query->getNumRows();        
        if ($num_rows > 0){
            # Creating a json data from the result returned
            # ---------------------------------------------
            $sn = 0;
            $sOutput = '{';
            $sOutput .= '"aaData": [ ';   
            // foreach ($query->getResult() as $row) {
                $result = $query->getResult();
                // $feedescription = $row->feesetup_fee_description;
                $feedescription = $result[0]->feesetup_fee_description;
                $feedescription = explode(",", $feedescription);
                $feecode = '';
                $counter = 0;

                for($i = 0; $i <= count($feedescription)-1; $i++){
                    $counter++;
                    $feedescriptionsub = explode(":", $feedescription[$i]);
                    $feecode = $feedescriptionsub[0];
                    $feeamount = $feedescriptionsub[1];
                    $query = $this->db->query("SELECT * FROM fee WHERE fee_code = '$feecode'");
                    $result1 = $query->getResult();
                    $feetitle = $result1[0]->fee_description;

                    $sOutput .= "[";
                    $sOutput .= '"'. $counter . '",';
                    // $sOutput .= '"'. 1 . '",';
                    $sOutput .= '"'. $feetitle . '",';
                    $sOutput .= '"'. $feeamount . '",';
                    // $sOutput .= '"'. $result[0]->feesetup_amount . '",';
                    $sOutput .= '"'. $feetitle . '",';
                    $sOutput = substr_replace( $sOutput, "", -1 );
                    $sOutput .= "],";
                                        
                }
            // }

            $sOutput = substr_replace( $sOutput, "", -1 );
            $sOutput .= '] }';

        }else{
            $sOutput = 0;
        }
        return $sOutput;
    }  

   

    public function getstudentbyoptionsdtmodel(){
			
		$session = $_GET['session'];
		$term = $_GET['term'];
		$classlevel = $_GET['classlevel'];
        $query = $this->db->query("SELECT * FROM fipims_pupilsbiodata WHERE currentsession = '$session' && currentclasslevel = '$classlevel' ORDER BY id ASC");
        $num_rows =  $query->getNumRows();        
        if ($num_rows > 0){
            # Creating a json data from the result returned
            # ---------------------------------------------
            $sn = 0;
            $sOutput = '{';
            $sOutput .= '"aaData": [ ';  

            foreach ($query->getResult() as $row) {
                $sn++;

                $button1    =   "<button type='button' class='btn btn-primary' value='".$row->regno."' onclick='editFeeSetup(this.value)'>Edit</button>";

                $button2    =   "<button type='button' class='btn btn-warning' value='".$row->regno."' onclick='viewFeeDetails(this.value)'>View</button>";
                
                $buttons = "<center>" . $button1 . ' ' . $button2. "<center>";

                // $checkbox    =   "<input type='checkbox' class='form-control' value='".$row->regno."' onclick=''>";

                $checkbox    =   "<input type='checkbox' class='check' id='" . $row->regno . "' value='" . $row->regno . "' onclick='addRemovePupil(this.id)'>";

                $sOutput .= "[";
                $sOutput .= '"'. $sn . '",';
                $sOutput .= '"'. $row->regno . '",';
                $sOutput .= '"'. $row->surname . ' ' . $row->othernames . '",';
                $sOutput .= '"'. $checkbox. '",';
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
    
    public function retrievefeesetupmodel(){
        $session = $_POST['session'];
        $term = $_POST['term'];
        $classlevel = $_POST['classlevel'];

        $query = $this->db->query("SELECT * FROM feesetup WHERE feesetup_session = '$session' && feesetup_term  = '$term' && feesetup_class_level = '$classlevel'");
        $num_rows =  $query->getNumRows();        
        if ($num_rows > 0){
            return ['status' => 1, 'message' => '', 'feesetup' => $query->getResult(), 'newtoken' => $this->csrf];
        }else{
            return ['status' => 0, 'message' => '', 'feesetup' => 0, 'newtoken' => $this->csrf];
        } 	
    }     
    
    public function editfeesetupmodel(){
        $feesetupid = $_POST['feesetupid'];
        $query = $this->db->query("SELECT * FROM feesetup WHERE feesetup_id = '$feesetupid'");
        $num_rows =  $query->getNumRows();        
        if ($num_rows > 0){
            return ['status' => 1, 'message' => '', 'feesetup' => $query->getResult(), 'newtoken' => $this->csrf];
        }else{
            return ['status' => 0, 'message' => '', 'feesetup' => 0, 'newtoken' => $this->csrf];
        } 	
    }     
    
    public function viewfeesetupdetailsmodel(){
        $feesetupid = $_POST['feesetupid'];

        $query = $this->db->query("SELECT * FROM feesetup WHERE feesetup_id = '$feesetupid'");
        $num_rows =  $query->getNumRows();        
        if ($num_rows > 0){
            $result = $query->getResult();
            $feesetup_fee_descriptionarr = $result[0]->feesetup_fee_description;
            $feesetup_fee_descriptionarr = explode("," , $feesetup_fee_descriptionarr);
            $fee_descriptionarr = [];
            $fee_amountarr = [];
            for($i = 0; $i <= count($feesetup_fee_descriptionarr)-1; $i++){
                $feesetup_fee_descriptionarrsub = explode(":", $feesetup_fee_descriptionarr[$i]);
                $feesetup_fee_code = $feesetup_fee_descriptionarrsub[0];
                $feesetup_fee_amount = $feesetup_fee_descriptionarrsub[1];
                $query1 = $this->db->query("SELECT * FROM fee WHERE fee_code = '$feesetup_fee_code'");
                $result1 = $query1->getResult(); 
                $fee_description = $result1[0]->fee_description;  
                $fee_descriptionarr[] = $fee_description;
                $fee_amountarr[] = $feesetup_fee_amount;
            }

            $response = [
                'fee_setup' => $query->getResult(),
                'feedescription' => $fee_descriptionarr,
                'feeamount' => $fee_amountarr
            ];

            return ['status' => 1, 'message' => '', 'feesetup' => $response, 'newtoken' => $this->csrf];
        }else{
            return ['status' => 0, 'message' => '', 'feesetup' => 0, 'newtoken' => $this->csrf];
        } 	
    }     
}
