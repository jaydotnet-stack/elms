<?php

namespace App\Models;

use CodeIgniter\Model;

class AddAwardSetupModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'awardsetup';
    protected $primaryKey       = 'award_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'award_session',
        'award_name',
        'award_value',
        'award_type',
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


    public function addAwardSetup()
    {
        extract($_POST);
        $this->addawardsetupmodel = new AddAwardSetupModel();
        $session = $session;
        $awardname = ucwords($this->refineInput($awardname));
        $awardvalue = $this->refineInput($awardvalue);
        $awardtype = ucwords($this->refineInput($awardtype));
        $query = $this->db->query("SELECT * FROM awardsetup WHERE award_name = '$awardname'");
        $num_rows =  $query->getNumRows();       
        if ($num_rows==0){
            $data = [
                'award_session'         =>  $session,
                'award_name'         =>  $awardname,
                'award_value'        =>  $awardvalue,
                'award_type'         =>   $awardtype
            ];    
            if($this->addawardsetupmodel->insert($data)){
                return [
                    'status' => 1,
                    'message' => 'Award created successfully',
                    'newtoken' => $this->csrf
                ];
            }else{
                return [
                    'status' => 0,
                    'message' => 'Error adding Award',
                    'newtoken' => $this->csrf
                ];
            }
        }else{
            $data = [
                'award_session'        =>  $session,
                'award_value'        =>  $awardvalue,
                'award_type'         =>  $awardtype
            ];
            if($this->db->table('awardsetup')->where('award_name', $awardname)->update($data)){
                return [
                    'status' => 1,
                    'message' => 'Award updated successfully',
                    'newtoken' => $this->csrf
                ];		
            }else{
                return [
                    'status' => 0,
                    'message' => 'Error updating Award',
                    'newtoken' => $this->csrf
                ];
            }
        } 
    }

    //refine post 
    public function refineInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function getawardtypedtmodel()
    {
        $query = $this->db->query("SELECT * FROM awardsetup ORDER BY award_name ASC");
        $num_rows =  $query->getNumRows();
        if ($num_rows > 0) {
            # Creating a json data from the result returned
            # ---------------------------------------------
            $sn = 0;
            $sOutput = '{';
            $sOutput .= '"aaData": [ ';
            foreach ($query->getResult() as $row) {
                $sn++;
                $button1    =   "<button type='button' class='btn btn-success' value='" . $row->award_id . "' onclick='editAwardType(this.value)'>Edit</button>";
                $button2    =   "<button type='button' class='btn btn-danger' value='" . $row->award_id . "' onclick='deleteAwardType(this.value)'>Delete</button>";
                $buttons = "<center>" . $button1 . ' ' . $button2 . "</center>";
                $sOutput .= "[";
                $sOutput .= '"' . $sn . '",';
                $sOutput .= '"' . $row->award_session . '",';
                $sOutput .= '"' . $row->award_name . '",';
                $sOutput .= '"' . $row->award_value . '",';
                $sOutput .= '"' . $row->award_type . '",';
                $sOutput .= '"' . $buttons . '",';
                $sOutput = substr_replace($sOutput, "", -1);
                $sOutput .= "],";
            }
            $sOutput = substr_replace($sOutput, "", -1);
            $sOutput .= '] }';
        } else {
            $sOutput = 0;
        }
        return $sOutput;
    }

    public function editawardtypemodel()
    {
        $awardid = $_POST['awardid'];
        $query = $this->db->query("SELECT * FROM awardsetup WHERE award_id = '$awardid'");
        $num_rows =  $query->getNumRows();
        if ($num_rows > 0) {
            return ['status' => 1, 'message' => '', 'awardsetup' => $query->getResult(), 'newtoken' => $this->csrf];
        } else {
            return ['status' => 0, 'message' => '', 'awardsetup' => 0, 'newtoken' => $this->csrf];
        }
    }

    public function deleteawardtypemodel()
    {
        $awardid = $_POST['awardid'];
        $query = $this->db->query("DELETE FROM awardsetup WHERE award_id = '$awardid'");   
        if ($query){
            return ['status' => 1, 'message' => 'Award type deleted successfully', 'awardsetup' => 0, 'newtoken' => $this->csrf];
        }else{
            return ['status' => 0, 'message' => 'Unable to delete Award type', 'awardsetup' => 0, 'newtoken' => $this->csrf];
        } 	
    }

    public function getawardtypemodel()
    {
        $query = $this->db->query("SELECT * FROM awardsetup ORDER BY award_name ASC");
        $num_rows =  $query->getNumRows();
        if ($num_rows > 0) {
            return ['status' => 1, 'message' => '', 'awardsetup' => $query->getResult(), 'newtoken' => $this->csrf];
        } else {
            return ['status' => 0, 'message' => '', 'awardsetup' => 0, 'newtoken' => $this->csrf];
        }
    }

    public function loadAwardsQuerry() {
        $response = $this->db->query("SELECT * FROM award ORDER BY award_name DESC");
        return $response->getResult(); 
    }
    
    public function loadAwardsTypeQuerry(){
        $response =  $this->db->query("SELECT * FROM award ORDER BY award_name DESC");
        return $response->getResult(); 
    }
}
