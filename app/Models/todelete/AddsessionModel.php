<?php

namespace App\Models;

use CodeIgniter\Model;

class AddsessionModel extends Model {

    protected $db;
    var $csrf; 
    public function __construct() {
        $this->csrf = csrf_hash();
        $this->db = db_connect();    
        
	}  
    
    protected $DBGroup          = 'default';
    protected $table            = 'fipims_session';
    protected $primaryKey       = 'session';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['session', 'sessionref', 'appstatus', 'created_by'];

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

    function addsessionmode(){
        $this->AddsessionModel = new AddsessionModel();
        extract($_POST);
        $newtoken = $this->csrf;
        $session = $this->refineInput($addsession);
        $sessionref = preg_replace('/[^0-9]/', '', $session);
        $query = $this->db->query("SELECT * FROM fipims_session WHERE session = '$session'");
        $num_rows =  $query->getNumRows();

        return 'johnson';
        exit;


        if ($num_rows==0){
            $userinformation = session()->get('userInformation');
            $userlog = 	$userinformation->staffaccount_employment_no;
            $data = array(
                'session'            =>  $session,
                'appstatus'          =>  'open',
                'sessionref'         =>  $sessionref,
                'created_by'         =>  $userlog
            );   

            if($this->AddsessionModel->insert($data)){
                
                $this->db->query("UPDATE fipims_session SET appstatus = 'closed' WHERE session <> '$session'");  

                //update audit trail
                $message = 'Created new session:' . $session;
                $this->insertIntoAuditrail($message);
                
                
                $applicationtb = "fipimsapplication".$sessionref;
                $this->db->query("CREATE TABLE $applicationtb LIKE fipims_tempscore");  
                
                return ['status' => 1, 'message' => 'Session created successfully', 'session' => $session, 'newtoken' => $newtoken];

            }else{
                return ['status' => -1, 'message' => 'Unable to create session, please contact system administrator!', 'session' => $session, 'newtoken' => $newtoken];
                exit;
            }
        }else{
            return ['status' => 0, 'message' => 'Session already exist', 'session' => $session, 'newtoken' => $newtoken];				
        }
    }

    public function insertIntoAuditrail($getmessage){
        $userinformation = session()->get('userInformation');
        $useremploymentno = $userinformation->staffaccount_employment_no;        
        $this->db->query("INSERT INTO audit_trail SET audit_trail_username = $useremploymentno, audit_trail_description = '$getmessage'");
    }

    public function refineInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Fetching all Session records
    public function getStatesDataTable(){
        $query = $this->db->query("SELECT * FROM fipims_session ORDER BY session_id ASC");			
        if ($query->getNumRows() > 0){
            # Creating a json data from the result returned   organisationName 	positionHeld 	dateFrom1 	dateTo1 	brief
            # ---------------------------------------------
            $sn = 0;
            $sOutput = '{';
            $sOutput .= '"aaData": [ ';
            foreach ($query->getResult() as $row) {
                $sn++;
                if ($row->appstatus == 'closed'){  
                    $button1 = "<button class='btn btn-dark' disabled>ACHIEVED</button>";
                    $usercategory = session()->get('userCat');
                    if($usercategory  !== 'US'){
                        $button2 = "<button class='btn btn-primary' id='" . $row->sessionref . "' onclick='reOpenSession(this.id)'>Re-Open</button>";
                    }else{
                        $button2 = "";
                    }
                }else{
                    $usercategory = session()->get('userCat');
                    if($usercategory  !== 'US'){
                        $button1 = "<button class='btn btn-warning' id='" . $row->sessionref . "' onclick='closeSession(this.id)'>Close Session</button>";  
                    }else{
                        $button1 = "<button class='btn btn-primary' id=''>Opened</button>";  
                    }                    
           
                    $button2 = "";
                }
                
                $buttons = "<center>" . $button1 . ' ' . $button2 . "</center>";

                $sOutput .= "[";
                $sOutput .= '"' . $sn . '",';
                $sOutput .= '"' . $row->session . '",';
                $sOutput .= '"' . ucwords($row->appstatus) . '",';
                $sOutput .= '"' . $buttons . '",';
                $sOutput = substr_replace($sOutput, "", -1);
                $sOutput .= "],";
            }
            $sOutput = substr_replace($sOutput, "", -1);
            $sOutput .= '] }';
            return $sOutput;
        }else{
            return ['aaData' => []];
        }
    }

    public function closesessionmodel(){
        $sessionref = $_POST['sessionref'];
        $fullsession = $this->getfullsession($sessionref);
        $query = $this->db->query("UPDATE fipims_session SET appstatus = 'closed' WHERE sessionref = '$sessionref'");
        $this->insertIntoAuditrail($fullsession . ' session closed');
        return 1; 
    }    

    public function reopensessionmodel(){
        $sessionref = $_POST['sessionref'];
        $fullsession = $this->getfullsession($sessionref);
        $query = $this->db->query("UPDATE fipims_session SET appstatus = 'open' WHERE sessionref = '$sessionref'");
        $query = $this->db->query("UPDATE fipims_session SET appstatus = 'closed' WHERE sessionref <> '$sessionref'");
        $this->insertIntoAuditrail($fullsession . ' session reopened');
        return 1; 
    }    

    public function getfullsession($sessionref){
        $sessionstr = $sessionref;
        $sessionleft = substr($sessionstr, 0, 4);
        $sessionright = substr($sessionstr, 4, 8);
        $session = $sessionleft . '/' . $sessionright;
        return $session;
    }

    public function fetchsessionmodel(){
        $query = $this->db->query("SELECT * FROM fipims_session ORDER BY session_id ASC");
        if ($query->getNumRows() > 0){
            $result = $query->getResult();
        }else{
            $result = 0;
        }
        return $result;
    }    

    public function getsessionmodel(){
        $query = $this->db->query("SELECT * FROM fipims_session ORDER BY session_id DESC LIMIT 1");
        if ($query->getNumRows() > 0){
            $result = $query->getResult();
        }else{
            $result = 0;
        }
        return $result;
    }    

    //DELETING SESSION fROM TABLE
    public function deletesessionmode(){
        $request = \Config\Services::request();
        $sessionref = $request->getPost('sessionref');
        // Ensure $addsession is provided
        if ($sessionref) {
            // Use Query Builder to delete the record
            $builder = $this->db->table('fipims_session');
            $builder->where('sessionref', $sessionref);
            $builder->delete();
            // Check if the deletion was successful
            if ($this->db->affectedRows() > 0) {
                $fipimsapplication = 'fipimsapplication' . $sessionref;
                $this->db->query("DROP TABLE $fipimsapplication");
                $response = [
                    'status' => 1,
                    'message' => 'Record Successfully Deleted'
                ];
            } else {
                $response = [
                    'status' => 0,
                    'message' => 'No Record Found or Deletion Failed'
                ];
            }
        } else {
            $response = [
                'status' => 0,
                'message' => 'itemName not provided'
            ];
        }

        return json_encode($response);
    }




    
    public function fetchcurrentsession(){
        $sql     = "SELECT * FROM fipims_session ORDER BY sessionref DESC LIMIT 1";
        $query     = $this->db->query($sql);
        $result = $query->getRow();

        if (!$result) {
            return "";
        }

        $lastsession = trim($result->session);

        $sessionarr =   explode("/", $lastsession);
        $leftside   =   (int)$sessionarr[1];
        $rightside  =   $leftside + 1;
        $newsess    =   $leftside . "/" . trim($rightside);
        return $newsess;
    }

    public function isFirstSession(){
        $sql = "SELECT COUNT(*) as count FROM fipims_session";
        $query = $this->db->query($sql);
        $result = $query->getRow();
        if (!$result) {
            return false; // Return false if query fails
        }
        return $result->count == 0;
    }
}
