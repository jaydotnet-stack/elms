<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentLedgerModel extends Model
{

    protected $db;
    var $csrf; 
    public function __construct() {
        $this->csrf = csrf_hash();
        $this->db = db_connect();    
	} 

    protected $DBGroup          = 'default';
    protected $table            = 'studentledger';
    protected $primaryKey       = 'studentledger_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['studentledger_session', 'studentledger_term', 'studentledger_class_category', 'studentledger_class_level', 'studentledger_admission_no', 'studentledger_particulars', 'studentledger_debit', 'studentledger_credit', 'studentledger_accum_balance', 'studentledger_user_logs'];

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

    public function getclassledgerdtmodel()
    {
        $this->studentledgermodel = new StudentLedgerModel();         
		$session = $_GET['session'];
		$term = $_GET['term'];
		$classlevel = $_GET['classlevel'];
        $query = $this->db->query("

        SELECT t1.*, CONCAT(t2.surname, ' ', t2.othernames) AS fullname
        
        FROM studentledger AS t1 

        LEFT JOIN fipims_pupilsbiodata AS t2

        ON t1.studentledger_admission_no = t2.regno

                
        WHERE t1.studentledger_session = '$session' && studentledger_term = '$term' && studentledger_class_level = '$classlevel' ORDER BY t1.studentledger_id ASC");


        $num_rows =  $query->getNumRows();
        if ($num_rows > 0) {
            # Creating a json data from the result returned
            # ---------------------------------------------
            $sn = 0;
            $sOutput = '{';
            $sOutput .= '"aaData": [ ';
            foreach ($query->getResult() as $row) {
                $sn++;

                $sOutput .= "[";
                $sOutput .= '"' . $sn . '",';
                $sOutput .= '"' . $row->fullname . '",';
                $sOutput .= '"' . $row->studentledger_admission_no . '",';
                $sOutput .= '"' . $row->studentledger_session . '",';
                $sOutput .= '"' . $row->studentledger_term . '",';
                $sOutput .= '"' . $row->studentledger_class_level . '",';
                $sOutput .= '"' . $row->studentledger_debit . '",';
                $sOutput .= '"' . $row->studentledger_credit . '",';
                $sOutput .= '"' . $row->studentledger_accum_balance . '",';
                $sOutput .= '"' . $row->studentledger_particulars . '",';
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

    public function getpupilledgerdtmodel()
    {
        $this->studentledgermodel = new StudentLedgerModel();         
        $regno = $_GET['regno'];
        $query = $this->db->query("

        SELECT t1.*, CONCAT(t2.surname, ' ', t2.othernames) AS fullname
        
        FROM studentledger AS t1 

        LEFT JOIN fipims_pupilsbiodata AS t2

        ON t1.studentledger_admission_no = t2.regno
                
        WHERE t1.studentledger_admission_no = '$regno' ORDER BY t1.studentledger_id ASC");


        $num_rows =  $query->getNumRows();
        if ($num_rows > 0) {
            # Creating a json data from the result returned
            # ---------------------------------------------
            $sn = 0;
            $sOutput = '{';
            $sOutput .= '"aaData": [ ';
            foreach ($query->getResult() as $row) {
                $sn++;

                $sOutput .= "[";
                $sOutput .= '"' . $sn . '",';
                $sOutput .= '"' . $row->fullname . '",';
                $sOutput .= '"' . $row->studentledger_admission_no . '",';
                $sOutput .= '"' . $row->studentledger_session . '",';
                $sOutput .= '"' . $row->studentledger_term . '",';
                $sOutput .= '"' . $row->studentledger_class_level . '",';
                $sOutput .= '"' . $row->studentledger_debit . '",';
                $sOutput .= '"' . $row->studentledger_credit . '",';
                $sOutput .= '"' . $row->studentledger_accum_balance . '",';
                $sOutput .= '"' . $row->studentledger_particulars . '",';
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

    public function getstudentledgerdtmodel()
    {
        $this->studentledgermodel = new StudentLedgerModel();         
        $session = $_GET['session'];
        $term = $_GET['term'];
        $classlevel = $_GET['classlevel'];
        // $classcategory = $_GET['classcategory'];
        $query = $this->db->query("SELECT t1.*, CONCAT (t2.surname, ' ', t2.othernames) AS fullname FROM studentledger AS t1 LEFT JOIN fipims_pupilsbiodata AS t2 ON t1.studentledger_admission_no = t2.regno WHERE t1.studentledger_session = '$session' && t1.studentledger_term = '$term' && t1.studentledger_class_level = '$classlevel' ORDER BY t1.studentledger_id ASC");
        $num_rows =  $query->getNumRows();
        if ($num_rows > 0) {
            # Creating a json data from the result returned
            # ---------------------------------------------
            $sn = 0;
            $sOutput = '{';
            $sOutput .= '"aaData": [ ';
            foreach ($query->getResult() as $row) {
                $sn++;

                $sOutput .= "[";
                $sOutput .= '"' . $sn . '",';
                $sOutput .= '"' . $row->fullname . '",';
                $sOutput .= '"' . $row->studentledger_admission_no . '",';
                $sOutput .= '"' . $row->studentledger_session . '",';
                $sOutput .= '"' . $row->studentledger_term . '",';
                $sOutput .= '"' . $row->studentledger_class_level . '",';
                $sOutput .= '"' . $row->studentledger_debit . '",';
                $sOutput .= '"' . $row->studentledger_credit . '",';
                $sOutput .= '"' . $row->studentledger_accum_balance . '",';
                $sOutput .= '"' . $row->studentledger_particulars . '",';
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

    public function debitstudentaccountmodel(){
        $this->studentledgermodel = new StudentLedgerModel();  
        $session = $_POST['session'];
        $term = $_POST['term'];
        $classlevel = $_POST['classlevel'];
        $classcategory = $_POST['classcategory'];
        $pupil = $_POST['pupil'];
        $pupil = explode(",", $pupil);
        // return $pupil;
        $query = $this->db->query("SELECT * FROM feesetup WHERE feesetup_session = '$session' && feesetup_term = '$term' && feesetup_class_level = '$classlevel' ORDER BY feesetup_id ASC");

        $result = $query->getResult();

        $feesetup_amount = $result[0]->feesetup_amount;

        $userInformation = $userinformation = session()->get('userInformation');
        $fullname = $userinformation->staffaccount_surname . ' ' . $userinformation->staffaccount_othernames;
        $staffno = $userinformation->staffaccount_employment_no;
        $logs = $fullname . '|' . $staffno;
        $skippedpupils = '';

        for($i = 0; $i <= count($pupil)-1; $i++){
            $session = $session;
            $term = $term;
            $classcategory = $classcategory;
            $classlevel = $classlevel;
            $regno = $pupil[$i];
            $particulars = 'Terminal fee deduction';
            $debit = '-' . $feesetup_amount;
            $credit = 0;
            $accumbalance = $debit;

            $query1 = $this->db->query("SELECT * FROM studentledger WHERE studentledger_session = '$session' && studentledger_term = '$term' && studentledger_class_level = '$classlevel' && studentledger_admission_no = '$regno'");

            $num_rows1 =  $query1->getNumRows();  
            if ($num_rows1 == 1){

                // $this->db->query("UPDATE studentledger SET studentledger_particulars = 'Terminal fee deduction (updated)', studentledger_debit = '$debit', studentledger_credit = '$credit', studentledger_accum_balance = '$accumbalance', studentledger_user_logs = '$logs' WHERE studentledger_session = '$session' && studentledger_term = '$term' && studentledger_class_level = '$classlevel' && studentledger_admission_no = '$regno'");
                
                $skippedpupils .= $regno . ', ';

            }else{

                $data = [
                    'studentledger_session'   =>  $session,
                    'studentledger_term'      =>  $term,
                    'studentledger_class_category'   =>  $classcategory,
                    'studentledger_class_level'          =>  $classlevel,
                    'studentledger_admission_no'             =>  $regno,
                    'studentledger_particulars'            =>  $particulars,
                    'studentledger_debit'            =>  $debit,
                    'studentledger_credit'            =>  $credit,
                    'studentledger_accum_balance'            =>  $accumbalance,
                    'studentledger_user_logs'            =>  $logs
                ]; 

                $this->studentledgermodel->insert($data);

            }
        }
        $skippedpupils = trim($skippedpupils, ', ');
        if($skippedpupils != ''){
            $message = 'Student account debited successfully, the following pupils not debitted: [' . $skippedpupils . ']';
        }else{
            $message = 'Student account debited successfully!';
        }
        return ['status' => 1, 'message' => $message, 'newtoken' => $this->csrf]; 
    }

    public function debitcreditstudentaccountmodel(){
        $this->studentledgermodel = new StudentLedgerModel();  
        $session = $_POST['session'];
        $term = $_POST['term'];
        $classlevel = $_POST['classlevel'];
        $classcategory = $_POST['classcategory'];
        $transactiontype = $_POST['transactionType'];
        $amount = $_POST['amount'];
        $particulars = $_POST['particulars'];
        $pupil = $_POST['pupil'];
        $pupil = explode(",", $pupil);

        if($transactiontype == 'debit') {
            $debit = '-' . $amount;
            $credit = 0;
            $transactionstatus = 'debited';
        }else{
            $credit = $amount;
            $debit = 0;
            $transactionstatus = 'creditted';
        }

        // $str = '';

        $userInformation = $userinformation = session()->get('userInformation');
        $fullname = $userinformation->staffaccount_surname . ' ' . $userinformation->staffaccount_othernames;
        $staffno = $userinformation->staffaccount_employment_no;
        $logs = $fullname . '|' . $staffno;        

        for($i = 0; $i < count($pupil); $i++){
            $session = $session;
            $term = $term;
            $classcategory = $classcategory;
            $classlevel = $classlevel;
            $regno = $pupil[$i];
            $particulars = $particulars;


            // $str .= $regno;
            
            $query1 = $this->db->query("SELECT * FROM studentledger WHERE studentledger_session = '$session' && studentledger_term = '$term' && studentledger_class_level = '$classlevel' && studentledger_admission_no = '$regno' ORDER BY studentledger_id DESC LIMIT 1");

            $num_rows1 =  $query1->getNumRows();  
            if ($num_rows1 > 0){
                $result1 = $query1->getResult();
                $oldaccumbalance = $result1[0]->studentledger_accum_balance;  
                if($transactiontype == 'debit') {
                    $accumbalance = $oldaccumbalance + $debit;
                }else{
                    $accumbalance = $oldaccumbalance + $credit;
                }
                $data = [
                    'studentledger_session'   =>  $session,
                    'studentledger_term'      =>  $term,
                    'studentledger_class_category'   =>  $classcategory,
                    'studentledger_class_level'          =>  $classlevel,
                    'studentledger_admission_no'             =>  $regno,
                    'studentledger_particulars'            =>  $particulars,
                    'studentledger_debit'            =>  $debit,
                    'studentledger_credit'            =>  $credit,
                    'studentledger_accum_balance'            =>  $accumbalance,
                    'studentledger_user_logs'            =>  $logs
                ];   
                $this->studentledgermodel->insert($data);
            }else{
                $oldaccumbalance = 0;  
                if($transactiontype == 'debit') {
                    $accumbalance = $oldaccumbalance + $debit;
                }else{
                    $accumbalance = $oldaccumbalance + $credit;
                }

                $data = [
                    'studentledger_session'   =>  $session,
                    'studentledger_term'      =>  $term,
                    'studentledger_class_category'   =>  $classcategory,
                    'studentledger_class_level'          =>  $classlevel,
                    'studentledger_admission_no'             =>  $regno,
                    'studentledger_particulars'            =>  $particulars,
                    'studentledger_debit'            =>  $debit,
                    'studentledger_credit'            =>  $credit,
                    'studentledger_accum_balance'            =>  $accumbalance,
                    'studentledger_user_logs'            =>  $logs
                ];   
                $this->studentledgermodel->insert($data);
            }
        }

        return ['status' => 1, 'message' => "Student account $transactionstatus successfully!", 'newtoken' => $this->csrf]; 
    }         

         
}
