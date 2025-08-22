<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Libraries\Cencryption;


class AdminController extends BaseController
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
	}    

    public function lecturedashb()
    {

        if(session()->get('isLoggedIn') && session()->get('isLoggedIn') == true && session()->get('category') == 'Lecturer'){
            $this->data['pageTitle'] = 'Lecturer Dashboard';
            return view('pages/admin/dashboard', $this->data);
        } else{
            $this->data['pageTitle'] = 'Sign in';
            $this->data['accountCat'] = 'Lecturer'; 
            $this->data['activationstatus'] = '';
            return view('pages/signin', $this->data);            
        }        

    }  

    public function prof()
    {

        if(session()->get('isLoggedIn') && session()->get('isLoggedIn') == true && session()->get('category') == 'Lecturer'){
            $this->data['pageTitle'] = '';
            return view('pages/admin/profile', $this->data);   

        } else{
            $this->data['pageTitle'] = 'Sign in';
            $this->data['accountCat'] = 'Lecturer'; 
            $this->data['activationstatus'] = '';
            return view('pages/signin', $this->data);            
        }

		public function quest()
    {
        $this->data['pageTitle'] = 'admin/question';
            $this->data['accountCat'] = 'Lecturer'; 
            $this->data['activationstatus'] = '';
            return view('pages/admin/question', $this->data);

        
    }

    }  


   
}
