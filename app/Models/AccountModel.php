<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\Util;
use App\Libraries\CustomEmailSenderExtended;

use App\Libraries\Cencryption;


class AccountModel extends Model
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

        // $this->accountmodel = new AccountModel();  
        $this->customemailsenderextended = new CustomEmailSenderExtended(); 
    }    

    protected $DBGroup          = 'default';
    protected $table            = 'student';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'uniquecode',
        'firstname',
        'lastname',
        'username',
        'email',
        'password',
        'phonenumber',
        'address',
        'gender',
        'state',
        'country',
        'activation',
        'category',
        'profile_picture',
        'profile_picture_upload_tag',
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


      

    public function processsiginmodel($email, $password)
    {
        $query      = $this->db->query("SELECT * FROM student WHERE email = '$email'");
        $row   =  $query->getRow();

        if (!$row) {

            $query      = $this->db->query("SELECT * FROM lecturer WHERE email = '$email'");
            $row   =  $query->getRow();

            if(!$row){
                return [
                    'status' => 0,
                    'message' => 'Email or password is not registered',
                    'newtoken' => $this->csrf,
                    'redirect_url' => ''
                ];  
            }

        }

        if (!password_verify($password, $row->password)){
            return [
                'status' => 0,
                'message' => 'Invalid email or password',
                'newtoken' => $this->csrf,
                'redirect_url' => ''
            ];
        }

        if($row->category === 'Lecturer'){
            $query      = $this->db->query("SELECT * FROM lecturer WHERE email = '$email' && activation = 1");
            $row   =  $query->getRow();   
            if (!$row) {
                return [
                    'status' => 0,
                    'message' => 'Account is not yet activated, kindly check your activation link in your mail inbox/spam folder',
                    'newtoken' => $this->csrf,
                    'redirect_url' => ''
                ];
            }              
        }else{
            $query      = $this->db->query("SELECT * FROM student WHERE email = '$email' && activation = 1");
            $row   =  $query->getRow();   
            if (!$row) {
                return [
                    'status' => 0,
                    'message' => 'Account is not yet activated, kindly check your activation link in your mail inbox/spam folder',
                    'newtoken' => $this->csrf,
                    'redirect_url' => ''
                ];
            } 
        }

        // Set session
        session()->set([
            'account_id'   => $row->id,
            'uniquecode'   => $row->uniquecode,
            'category'    => $row->category,
            'accountInformation' => $row,
            'isLoggedIn' => true
        ]);        
        
        return [
            'status' => 1,
            'message' => 'Login successful',
            'newtoken' => $this->csrf,
            'redirect_url' => ($row->category === 'Lecturer') ? base_url('admin/dashboard') : base_url('studentdashboard') 
        ];
    }    
    
    
    
    public function processsignup($getpost)
    {
        $firstname  = $getpost['firstname'];
        $lastname   = $getpost['lastname'];
        $email      = $getpost['email'];
        $password   = $getpost['password'];
        $category   = $getpost['category'];

        if($category == 'Lecturer'){
            $query      = $this->db->query("SELECT * FROM lecturer WHERE email = '$email'");
            $num_rows   =  $query->getNumRows();
            if ($num_rows == 0) {
                $account_unique = $this->accountUniqueNumberGenerator($category);
                $data = [
                    'uniquecode'           =>  $account_unique, 
                    'firstname'        =>  $firstname,
                    'lastname'         =>  $lastname,
                    'email'            =>  $email,
                    'password'         =>  $password,
                    'category'         =>  $category
                ];
                
                if ($this->db->table('lecturer')->insert($data)) {
                    
                    $user_id                        = $this->db->insertID();
                    $user         		            = $this->getuserinfobyid($user_id, $category); 
                    $from_email                     = ADMIN_EMAIL;
                    $to_email                       = $user->email;
                    $site_title                     = APP_NAMESPACE;
                    $subject                        = "Welcome To " . $site_title . " ";
                    $hashid                         = $this->cencryption->cencrypt($user->id);
                    $hashid                         = urlencode($hashid);
                    $dispatch_time                  = time();
    
                    $activation                     = array();
                    $activation['account_id']       = $account_id = $user->id;
                    $activation['string']           = $secret = $this->generateactivationcode($account_id);
                    $activation['validity']         = $dispatch_time + (48 * 60 * 60); //48 hrs
                    $returnvalue                    = 0;
                    $returnvalue                    = $this->set_activation_period($activation);
                    #mail template                   
                    $url                            = base_url(). "home/activate/$hashid/$secret/$category";
                    $activation_link                = '<a href="' . $url .'" target="_blank">Activation link</a>';
                    $site_link                      = '<a href="'.base_url().'" target="_blank">' . APP_NAMESPACE . '</a>';
    
                    $activation_url                 = '<a href="'.$activation_link.'" target="_blank">Activate Account</a>';
    
                    $message_email_mobile           = "Hi " . $user->lastname . ", <br>";
                    $message_email_mobile           .= "Thank you for signing up with the " . $site_link . ",<br>";
                    $message_email_mobile           .= "Please click on the $activation_link to activate your account,<br>";
    
                    $message_email_mobile           .= "<span style='color:red'>Note that this link expires in 48 hrs</span><br>";
                    $message_email_mobile           .= "<i>Regards</i>...";
                    
                    $message_view                   = 'Thank you for signing up! Please check your mail to activate your account. ' . "\r\n" . 'Check spam folder for message if not received in your inbox';
        
                    $emaildata = array(
                        'smtphost'     => 'mail.tutordotconnect.com',
                        'username'     => 'elearning@tutordotconnect.com',
                        'password'     => 'Elearning@2025',
                        'from'         => 'elearning@tutordotconnect.com',
                        'organization' => 'E-LEARNING',
                        'to'           => $email ?? '',
                        'toname'       => $firstname . ' ' . $lastname  ?? '',
                        'cc' => '', // CC recipient email
                        'ccname' => '', // CC recipient name                  
                        'subject'      => 'Account Creation',
                        'body'         => $message_email_mobile ?? 'Plain text email content'
                    );  
    
                    $emailresult =  $this->customemailsenderextended->sendEmail($emaildata);       
    
                    return 
                        ['status' => 1, 'message' => $message_view, 'username' => 'matricno ', 'newtoken' => $this->csrf, 'emailresult' => $emailresult, 'url' => $activation_link
                    ]; 
    
                } else {
                    return [
                        'status' => 0,
                        'message' => 'Error creating account',
                        'newtoken' => $this->csrf
                    ];
                }
                
            } else {
                return [
                    'status' => -1,
                    'message' => 'Account already exist',
                    'newtoken' => $this->csrf
                ];
            }
        }else{
            $query      = $this->db->query("SELECT * FROM student WHERE email = '$email'");
            $num_rows   =  $query->getNumRows();
            if ($num_rows == 0) {
                $account_unique = $this->accountUniqueNumberGenerator($category);
                $data = [
                    'uniquecode'           =>  $account_unique, 
                    'firstname'        =>  $firstname,
                    'lastname'         =>  $lastname,
                    'email'            =>  $email,
                    'password'         =>  $password,
                    'category'         =>  $category
                ];
                
                if ($this->insert($data)) {
                    
                    $user_id                        = $this->db->insertID();
                    $user         		            = $this->getuserinfobyid($user_id, $category); 
                    $from_email                     = ADMIN_EMAIL;
                    $to_email                       = $user->email;
                    $site_title                     = APP_NAMESPACE;
                    $subject                        = "Welcome To " . $site_title . " ";
                    $hashid                         = $this->cencryption->cencrypt($user->id);
                    $hashid                         = urlencode($hashid);
                    $dispatch_time                  = time();
    
                    $activation                     = array();
                    $activation['account_id']       = $account_id = $user->id;
                    $activation['string']           = $secret = $this->generateactivationcode($account_id);
                    $activation['validity']         = $dispatch_time + (48 * 60 * 60); //48 hrs
                    $returnvalue                    = 0;
                    $returnvalue                    = $this->set_activation_period($activation);
                    #mail template                   
                    $url                            = base_url(). "home/activate/$hashid/$secret/$category";                 
                    $activation_link                = '<a href="' . $url .'" target="_blank">Activation link</a>';
                    $site_link                      = '<a href="'.base_url().'" target="_blank">' . APP_NAMESPACE . '</a>';
    
                    $activation_url                 = '<a href="'.$activation_link.'" target="_blank">Activate Account</a>';
    
                    $message_email_mobile           = "Hi " . $user->lastname . ", <br>";
                    $message_email_mobile           .= "Thank you for signing up with the " . $site_link . ",<br>";
                    $message_email_mobile           .= "Please click on the $activation_link to activate your account,<br>";
    
                    $message_email_mobile           .= "<span style='color:red'>Note that this link expires in 48 hrs</span><br>";
                    $message_email_mobile           .= "<i>Regards</i>...";
                    
                    $message_view                   = 'Thank you for signing up! Please check your mail to activate your account. ' . "\r\n" . 'Check spam folder for message if not received in your inbox';
        
                    $emaildata = array(
                        'smtphost'     => 'mail.tutordotconnect.com',
                        'username'     => 'elearning@tutordotconnect.com',
                        'password'     => 'Elearning@2025',
                        'from'         => 'elearning@tutordotconnect.com',
                        'organization' => 'E-LEARNING',
                        'to'           => $email ?? '',
                        'toname'       => $firstname . ' ' . $lastname  ?? '',
                        'cc' => '', // CC recipient email
                        'ccname' => '', // CC recipient name                  
                        'subject'      => 'Account Creation',
                        'body'         => $message_email_mobile ?? 'Plain text email content'
                    );  
    
                    $emailresult =  $this->customemailsenderextended->sendEmail($emaildata);       
    
                    return 
                        ['status' => 1, 'message' => $message_view, 'username' => 'matricno ', 'newtoken' => $this->csrf, 'emailresult' => $emailresult, 'url' => $activation_link
                    ]; 
    
                } else {
                    return [
                        'status' => 0,
                        'message' => 'Error creating account',
                        'newtoken' => $this->csrf
                    ];
                }
                
            } else {
                return [
                    'status' => -1,
                    'message' => 'Account already exist',
                    'newtoken' => $this->csrf
                ];
            }
        }

    }  

    // public static function mailSend($sendParams = null){
    //     $sendFrom = $sendParams['from'];
    //     $sendFromName = $sendParams['organization'];
    //     $sendTo = $sendParams['to'];
    //     $sendSubject = $sendParams['subject'];
    //     $sendMessage = $sendParams['body'];
    //     // $sendCC = $sendParams['cc'];
    //     // $sendBCC = $sendParams['bcc'];
    //     //$sendAttachment = $sendParams->sendattachment;
	// 	$email = \Config\Services::email();
	// 	$email->setFrom($sendFrom, $sendFromName);
	// 	(isset($sendTo)) ? $email->setTo($sendTo) : ""; // comma seperated values or arrays
	// 	(isset($sendSubject)) ? $email->setSubject($sendSubject) : '';
	// 	(isset($sendMessage)) ? $email->setMessage($sendMessage) : '';
		
	// 	// (isset($sendCC)) ? $email->setCC($sendCC) : ''; // comma seperated values or arrays
	// 	// (isset($sendBCC)) ? $email->setBCC($sendBCC) : ''; // comma seperated values or arrays
	// 	// (isset($sendAttachment)) ? $email->attach($sendAttachment) : ''; //you can use the App patch 	
        

    //     // Tell CodeIgniter it's an HTML email
    //     $email->setMailType('html');
			
	// 	if(!$email->send(false)){
	// 		//$email->printDebugger(['headers']);
    //         return 1;
	// 	}else{
	// 		return $email->printDebugger(['headers']);
	// 		//dd()
	// 	}
	// }    

    public function set_activation_period($user_info){
        $builder = $this->db->table('user_verification');    
        return $builder->replace($user_info);    
    }      

    function random_string($length=6){
        return substr(str_repeat(md5(rand()), ceil($length/32)), 0, $length);
    }      

    public function generateactivationcode($account_id) {
        try {
            $code               = $this->random_string();
            $this->db->db_debug = false;
            $code_info          = array('access_code' =>$code, 'account_id' =>$account_id);
            $builder            = $this->db->table('activationcodes');
            $result             = $builder->insert($code_info);            
            if($result > 0) {
                $id     = $this->db->insertID();
                $query  =  $this->db->query("SELECT access_code FROM activationcodes WHERE id='$id'");
                return $query->getRow()->access_code;
            }else{
                return $this->generateactivationcode($account_id);
            }
        } catch (Exception $e) {
            return $this->generateactivationcode($account_id);
        }
    }  
    
    public function activate($hashid = "", $string = "", $category = ""){
        if(empty($hashid) || empty($string) || empty($category)) {
            $response = ['status' => 0,'message' => 'Something went wrong! Please copy the activation link and paste in the browser and try again'];
            return $response;
        }else{
            $hashid  = urldecode($hashid);
            $user_id = $this->cencryption->cdecrypt($hashid);
        }

        $query =  $this->db->query("SELECT string, validity FROM user_verification WHERE account_id='$user_id' AND string='$string'");
        $data = $query->getRow();

        if(empty($data)) {
            if($category == 'Lecturer'){
                $query =  $this->db->query("SELECT * FROM lecturer WHERE id='$user_id'");
                $result = $query->getRow();  
                if($result->activation == 1){
                    return ['status' => 2,'message' => 'Account already activated, kindly login!'];
                }else{
                    return ['status' => 0,'message' => 'Activation link has expire/does not exist'];
                }
            }else{
                $query =  $this->db->query("SELECT * FROM student WHERE id='$user_id'");
                $result = $query->getRow();  
                if($result->activation == 1){
                    return ['status' => 2,'message' => 'Account already activated, kindly login!'];
                }else{
                    return ['status' => 0,'message' => 'Activation link has expire/does not exist'];
                }
            }
        }else {
            if($category == 'Lecturer'){
                if(time() < intval($data->validity)) {
                    if ($this->db->query("UPDATE lecturer SET activation = 1 WHERE id = '$user_id'")){
                        $this->update_activation_period($user_id);
                        $message  = 'Your account is successfully activated. You may login now!';
                        $response = ['status' => 1,'message' => $message];
                        return $response;
                    }else{
                        $message  = 'Oops! Something went wrong! Please try again later.';
                        $response = ['status' => 0,'message' => $message];
                        return $response;
                    }
                }else {
                    $response = ['status' => 0,'message' => 'Your token has expired.! Please click on Resend Activation link to re-send your activation link.'];
                    return $response;
                }                
            }else{
                if(time() < intval($data->validity)) {
                    if ($this->db->query("UPDATE student SET activation = 1 WHERE id = '$user_id'")){
                        $this->update_activation_period($user_id);
                        $message  = 'Your account is successfully activated. You may login now!';
                        $response = ['status' => 1,'message' => $message];
                        return $response;
                    }else{
                        $message  = 'Oops! Something went wrong! Please try again later.';
                        $response = ['status' => 0,'message' => $message];
                        return $response;
                    }
                }else {
                    $response = ['status' => 0,'message' => 'Your token has expired.! Please click on Resend Activation link to re-send your activation link.'];
                    return $response;
                }
            }            
        }
    }   

    // public function getuserinfobyuserid($userid=''){
    //     if (!empty($userid)){
    //         $query = $this->db->query("SELECT * FROM account WHERE id = $userid");
    //         return $query->getRow();        
    //     }
    // }    
    
    public function update_activation_period($user_id){
        return $this->db->query("UPDATE user_verification SET string = NULL, validity = 0 WHERE account_id = '$user_id'");
    }
    
    public function getuserinfobyid($user_id ='', $category = ''){
        if($category == 'Lecturer'){        
            $query = $this->db->query("SELECT * FROM lecturer WHERE id = '$user_id'");

        }else{
            $query = $this->db->query("SELECT * FROM student WHERE id = '$user_id'");          
        }
        $num_rows =  $query->getNumRows();
        if ($num_rows > 0){
            return $query->getRow();
        }else{
            return false;
        }        
    }    

    public function accountUniqueNumberGenerator($category){
        if($category == 'Lecturer'){
            $sqlstr	= "SELECT uniquecode FROM lecturer ORDER BY uniquecode DESC LIMIT 1";
            $query = $this->db->query($sqlstr);
            if ($query->getNumRows() > 0){
                $result = $query->getRow();
                $account_unique = $result->uniquecode;
                $result = explode("_", $account_unique);
                $recordno = $result[1];
                $accountunique = '';
                $accountuniquepretext = 'lecturer_';
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
                $accountuniquepretext = 'lecturer_';
                $accountunique = $accountuniquepretext."000001";
            }
        }else{
            $sqlstr	= "SELECT uniquecode FROM student ORDER BY uniquecode DESC LIMIT 1";
            $query = $this->db->query($sqlstr);
            if ($query->getNumRows() > 0){
                $result = $query->getRow();
                $account_unique = $result->uniquecode;
                $result = explode("_", $account_unique);
                $recordno = $result[1];
                $accountunique = '';
                $accountuniquepretext = 'student_';
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
                $accountuniquepretext = 'student_';
                $accountunique = $accountuniquepretext."000001";
            }
        }
        return $accountunique;
    } 	    

 

}
