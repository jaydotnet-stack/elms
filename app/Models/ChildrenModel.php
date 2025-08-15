<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\Util;
use App\Libraries\CustomEmailSenderExtended;

use App\Libraries\Cencryption;


class ChildrenModel extends Model
{
    // protected $db;
    public $csrf, $encrypter, $request, $cencryption; 
    // protected $request;
    public function __construct()
    {
        parent::__construct();
        $this->csrf = csrf_hash();
        $this->encrypter = \Config\Services::encrypter();    
        $this->request = \Config\Services::request();  
        
        $this->cencryption = new Cencryption();
        
        $this->db = db_connect();
    }    

    protected $DBGroup          = 'default';
    protected $table            = 'children';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'account_unique',
        'firstname',
        'lastname',
        'class',
        'gender',
        'dob',
        'profile_picture_tag',
        'profile_picture',
        'created_at',
        'updated_at'
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


    public function processaddchildmodel($getpost){
        extract($_POST);			
        $firstname = trim($getpost['firstname']);
        $lastname = trim($getpost['lastname']);
        $class = trim($getpost['class']);
        $gender = trim($getpost['gender']);
        $dob = trim($getpost['dob']);		
        $CountArray = count(explode(".", $_FILES["userfile"]["name"]));
        if ($CountArray>=2){
            $filename = $_FILES['userfile']['name']; //gets the file name
            $fileNameParts   = explode(".", $filename); // explode file name to two parts
            $fileExtension   = end($fileNameParts); // give extension
            $fileExtension   = strtolower($fileExtension); 				
            $filename = $serviceno . '.' . $fileExtension;
            // $query = $this->db->query("SELECT * FROM admin WHERE admin_service_no = '$serviceno'");
            // $num_rows =  $query->num_rows();

            $data = array(
                'admin_account_surname' => $surname, 
                'admin_account_othername' => $othernames, 
                'admin_account_fullname' => $surname . ' ' . $othernames, 
                'admin_account_phonenumber' => $phonenumber, 
                'admin_account_phonenumber2' => $phonenumber2, 
                'admin_account_rank' => $rank, 
                'admin_account_gender' => $gender,
                'admin_account_state' => $state,
                'admin_account_lga' => $lga,
                'admin_account_home_town' => $hometown,
                'admin_account_dob' => $dob,
                'admin_account_previous_posting' => $previousposting,
                'admin_account_date_of_previous_posting' => $dateofpreviousposting,
                'admin_account_present_posting' => $presentposting,
                'admin_account_date_of_present_posting' => $dateofpresentposting,
                'admin_account_account_number_1' => $account1,
                'admin_account_date_of_first_appointment' => $dateoffirstappointment,
                'admin_account_date_of_present_appointment' => $dateofpresentappointment,
                'admin_account_highest_educational_qualification' => $highesteducationalqualification,
                'admin_account_field_of_study' => $fieldofstudy,
                'admin_account_account_number_2' => $account2,	
                'admin_account_profile_picture'       =>  $filename,
                'admin_account_profile_picture_tag'        =>  "T",
                // 'admin_account_lock_status'        =>  "T"
                'admin_account_biodata_lock_status'        =>  "T"
            ); 
            $query = $this->db->query("SELECT admin_account_biodata_lock_status FROM admin WHERE admin_service_no = '$serviceno'");
            $admin_account_biodata_lock_status = $query->row(0)->admin_account_biodata_lock_status;
            if($admin_account_biodata_lock_status == 'F'){
                if($this->db->where(array('admin_service_no'=> $serviceno))->update('admin', $data)){
                    // $this->db->query("UPDATE admin SET admin_account_lock_status = 'T' WHERE admin_service_no = '$serviceno'");
                    return ['status' => 1, 'message' => 'Biodata updated successfully', 'serviceno' => $serviceno, 'row' => 1, 'newtoken' => $newtoken];	
                }else{
                    return ['status' => 0, 'message' => 'Unable to update biodata', 'serviceno' => $serviceno, 'row' => 0, 'newtoken' => $newtoken];
                }
            }else{
                return ['status' => 0, 'message' => 'Account is locked, please contact the system administrator!!!', 'serviceno' => $serviceno, 'row' => 0, 'newtoken' => $newtoken];
            }
        }else{
            $data = array(
                'admin_account_surname' => $surname, 
                'admin_account_othername' => $othernames, 
                'admin_account_fullname' => $surname . ' ' . $othernames, 					
                'admin_account_phonenumber' => $phonenumber, 
                'admin_account_phonenumber2' => $phonenumber2, 
                'admin_account_rank' => $rank, 
                'admin_account_gender' => $gender,
                'admin_account_state' => $state,
                'admin_account_lga' => $lga,
                'admin_account_home_town' => $hometown,
                'admin_account_dob' => $dob,
                'admin_account_previous_posting' => $previousposting,
                'admin_account_date_of_previous_posting' => $dateofpreviousposting,
                'admin_account_present_posting' => $presentposting,
                'admin_account_date_of_present_posting' => $dateofpresentposting,
                'admin_account_account_number_1' => $account1,
                'admin_account_date_of_first_appointment' => $dateoffirstappointment,
                'admin_account_date_of_present_appointment' => $dateofpresentappointment,
                'admin_account_highest_educational_qualification' => $highesteducationalqualification,
                'admin_account_field_of_study' => $fieldofstudy,
                'admin_account_account_number_2' => $account2,
                // 'admin_account_profile_picture'       =>  $filename,
                // 'admin_account_profile_picture_tag'        =>  "T"
                // 'admin_account_lock_status'        =>  "T"
                'admin_account_biodata_lock_status'        =>  "T"
            ); 
            $query = $this->db->query("SELECT admin_account_biodata_lock_status FROM admin WHERE admin_service_no = '$serviceno'");
            $admin_account_biodata_lock_status = $query->row(0)->admin_account_biodata_lock_status;
            if($admin_account_biodata_lock_status == 'F'){
                if($this->db->where(array('admin_service_no'=> $serviceno))->update('admin', $data)){
                    // $this->db->query("UPDATE admin SET admin_account_lock_status = 'T' WHERE admin_service_no = '$serviceno'");
                    return ['status' => 1, 'message' => 'Biodata section updated successfully', 'serviceno' => $serviceno, 'row' => 1, 'newtoken' => $newtoken];	
                }else{
                    return ['status' => 0, 'message' => 'Unable to update biodata section', 'serviceno' => $serviceno, 'row' => 0, 'newtoken' => $newtoken];
                }
            }else{
                return ['status' => 0, 'message' => 'Biodata section is locked, please contact the system administrator!!!', 'serviceno' => $serviceno, 'row' => 0, 'newtoken' => $newtoken];
            }					
        }			


    }     

    public function accountUniqueNumberGenerator(){
        $sqlstr	= "SELECT account_unique FROM children ORDER BY account_unique DESC LIMIT 1";
        $query = $this->db->query($sqlstr);
        if ($query->getNumRows() > 0){
            $result = $query->getRow();
            $account_unique = $result->account_unique;
            $result = explode("_", $account_unique);
            $recordno = $result[1];
            $accountunique = '';
            $accountuniquepretext = 'child_';
            if($recordno == 0){
                $accountunique = $accountuniquepretext."000001";
            }elseif($recordno > 0 && $recordno < 9){
                $recordno = $recordno + 1;
                $accountunique = $accountuniquepretext."00000".$recordno;
            }elseif($recordno >=9 && $recordno < 99){
                $recordno = $recordno + 1;
                $accountunique = $accountuniquepretext."0000".$recordno;
            }elseif($recordno >=99 && $recordno < 999){
                $recordno = $recordno + 1;
                $accountunique = $accountuniquepretext."000".$recordno;
            }elseif($recordno >=999 && $recordno < 9999){
                $recordno = $recordno + 1;
                $accountunique = $accountuniquepretext."00".$recordno;
            }elseif($recordno >=9999 && $recordno < 99999){
                $recordno = $recordno + 1;
                $accountunique = $accountuniquepretext."0".$recordno;
            }else{
                $accountunique = -3;
                exit;	
            }	
        }else{
            $accountunique = '';
            $accountuniquepretext = 'child_';
            $accountunique = $accountuniquepretext."000001";
        }	
        return $accountunique;
    } 	    

 

}
