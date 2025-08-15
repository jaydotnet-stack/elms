<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Libraries\Util;

use App\Models\AccountModel;

use App\Libraries\Cencryption;

class HomeController extends BaseController
{
    protected $db;
    public $data  		= array();
    public $csrf; 
    public $uri, $request, $requestMethod, $validation, $cencryption;    
    // $encrypter

    public function __construct() {
        $this->db = db_connect();           
        $this->csrf = csrf_hash();
		$this->request = \Config\Services::request();  
        $this->requestMethod = $this->request->getMethod(TRUE);        
        // $this->encrypter = \Config\Services::encrypter(); 
        $this->validation = \Config\Services::validation(); 
        $this->cencryption = new Cencryption();
		$this->uri = $this->request->uri;
        $page_uri = explode('/', $this->uri);
        $this->data['page'] = $page_uri[4];
        $this->accountmodel = new AccountModel();    
	} 

    public function processsignin(){  
		if($this->request->getMethod() === 'post' && $this->validate([
			'email'             => 'required|valid_email',
			'password'    => 'required'
		])){
            $email      = $this->refineInput($this->request->getPost('email'));
            $password   = $this->request->getPost('password');
            $result = $this->accountmodel->processsiginmodel($email, $password);
            echo json_encode($result);    

		}else{
			$failed =  $this->validation->getErrors();
            echo json_encode(
                ["status"=>-2, "message"=>'Please check and fill the form properly', 'newtoken' => $this->csrf]
            );
		}        
    }      

    public function processsignup()
    {	
		if($this->request->getMethod() === 'post' && $this->validate([
			'firstname'         => 'required',
			'lastname'         => 'required',
			'category'          => 'required',
			'email'             => 'required|valid_email',
			'password'    => 'required',
			'cpassword'   => 'required'
		])){

            $firstname  = $this->refineInput($this->request->getPost('firstname'));
            $lastname   = $this->refineInput($this->request->getPost('lastname'));
            $category   = $this->refineInput($this->request->getPost('category'));
            $email      = $this->refineInput($this->request->getPost('email'));
            $password   = $this->request->getPost('password');
            $password   = password_hash($password, PASSWORD_DEFAULT);
            
            $post = array(
                'firstname'     => $firstname, 
                'lastname'      => $lastname, 
                'category'      => $category, 
                'email'         => $email, 
                'password'      => $password 
            );

            $result = $this->accountmodel->processsignup($post); 
            echo json_encode($result);
		}else{
			$failed =  $this->validation->getErrors();
            echo json_encode(
                ["status"=>-2, "message"=>'Please check and fill the form properly', 'newtoken' => $this->csrf]
            );
		}		
	}   
    
    public function activate($hashid = "", $string = "", $category = ""){

        if(empty($hashid) || empty($string) || empty($category)) {
            $this->data['activationstatus'] = '1Something went wrong! Please copy the activation link and paste in the browser and try again';
            return view('pages/signin', $this->data);            
        }else{

            $hashid  = urldecode($hashid);
            $user_id = $this->cencryption->cdecrypt($hashid);

            $user        = $this->accountmodel->getuserinfobyid($user_id, $category);

            $fullname       = $user->firstname . ' ' . $user->lastname;

            $result          = $this->accountmodel->activate($hashid, $string, $category);
            $this->data['activationstatus'] = $result['message'];                
            return view('pages/signin', $this->data); 
            
        }
    }    

    public function error(){
        $this->data['pageTitle'] = 'ERROR';
        return view('partials/404', $data);        
    }  

    public function home()
    {
        $this->data['pageTitle'] = 'Home';
        return view('pages/home', $this->data);
    }   

    public function course()
    {
        $this->data['pageTitle'] = 'Course';
        return view('pages/course', $this->data);
    }   

    public function aboutus()
    {
        $this->data['pageTitle'] = 'About Us';
        return view('pages/aboutus', $this->data);
    }   

    public function contact()
    {
        $this->data['pageTitle'] = 'Contact';
        return view('pages/contact', $this->data);
    }   

    public function coursedetails()
    {
        $this->data['pageTitle'] = 'Course Details';
        return view('pages/coursedetails', $this->data);
    }   

    public function lecturersignup()
    {
        $this->data['pageTitle'] = 'Sign up';
        $this->data['accountCat'] = 'Lecturer';
        return view('pages/signup', $this->data);
    }  
    
    public function studentsignup()
    {
        $this->data['pageTitle'] = 'Sign up';
        $this->data['accountCat'] = 'Student';
        return view('pages/signup', $this->data);
    }    

    public function signout(){
        session()->set([
            'isLoggedIn' => false
        ]);    
        $this->data['pageTitle'] = 'Home';
        return view('pages/signin', $this->data);
    }    

    public function signin()
    {
        $this->data['pageTitle'] = 'Sign in';
        $this->data['accountCat'] = 'tutor'; 
        $this->data['activationstatus'] = '';
        return view('pages/signin', $this->data);
    }     
    
    public function studdashb()
    {
        if(session()->get('isLoggedIn') && session()->get('isLoggedIn') == true && session()->get('category') == 'Student'){
            $this->data['pageTitle'] = 'Student Dashboard';
            return view('pages/studentdashboard', $this->data);
        } else{
            $this->data['pageTitle'] = 'Sign in';
            $this->data['accountCat'] = 'Student'; 
            $this->data['activationstatus'] = '';
            return view('pages/signin', $this->data);            
        }        

    }   
    
 

    public function studqui()
    {

        if(session()->get('isLoggedIn') && session()->get('isLoggedIn') == true && session()->get('category') == 'Student'){

            $this->data['pageTitle'] = 'Student Quiz';
            return view('pages/studentquiz', $this->data);

        } else{
            $this->data['pageTitle'] = 'Sign in';
            $this->data['accountCat'] = 'Student'; 
            $this->data['activationstatus'] = '';
            return view('pages/signin', $this->data);            
        }  


    }   
    
    public function edprof()
    {
        if(session()->get('isLoggedIn') && session()->get('isLoggedIn') == true && session()->get('category') == 'Student'){
            $this->data['pageTitle'] = 'Edit Profile';
            return view('pages/editprofile', $this->data);
        } else{
            $this->data['pageTitle'] = 'Sign in';
            $this->data['accountCat'] = 'Student'; 
            $this->data['activationstatus'] = '';
            return view('pages/signin', $this->data);            
        }          
    }    

    //refine post 
    public function refineInput($data) {	
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }  
    
    

}

