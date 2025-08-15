<?php 

namespace App\Libraries;




Class Util{

	protected $request;
	protected $requestMethod;
	protected $session;

		//use ResponseTrait;
	public function __construct(){
		// $this->session = $session = session();
		// helper(['form', 'string', 'array']);
		$this->request = $request = \Config\Services::request();
		$uri = $request->uri;
		$this->requestMethod = $request->getMethod(TRUE);
    }




	public static function logit($info){
		// $info = [
		// 	'id'         => $user->id,
		// 	'ip_address' => $this->request->getIPAddress(),
		// ];
		
		log_message('info', 'User {id} logged into the system from {ip_address}', $info);
	}

	public static function logmail($info){		
		log_message('info', 'Mail sent from: "{sendfrom} {sendfromname}" to: "{sendto}" with subject: "{sendsubject}" and message: "{sendmessage}" BCC: "{sendbcc}" CC: "{sendcc}" Sender Ip Address: "{ip_address}"', $info);
	}

	public static function mailSend($sendParams = null){

        $sendFrom = $sendParams['from'];
        $sendFromName = $sendParams['organization'];
        $sendTo = $sendParams['to'];
        $toName = $sendParams['toname'];
        $sendSubject = $sendParams['subject'];
        $sendMessage = $sendParams['body'];
        $sendCC = $sendParams['cc'];
        $CCName = $sendParams['ccname'];
        // $sendBCC = $sendParams['bcc'];
		$email = \Config\Services::email();
		$email->setFrom($sendFrom, $sendFromName);

		// (isset($sendTo)) ? $email->setTo("{toName} <{$sendTo}>") : "abimbolaoladunni8429@gmail.com"; // comma seperated values or arrays
		(isset($sendTo)) ? $email->setTo($sendTo) : "abimbolaoladunni8429@gmail.com"; // comma 
		(isset($sendSubject)) ? $email->setSubject($sendSubject) : 'Sample';
		(isset($sendMessage)) ? $email->setMessage($sendMessage) : 'Welcome to FLO';
		
		(isset($sendCC)) ? $email->setCC($sendCC) : ''; // comma seperated values or arrays
		(isset($sendBCC)) ? $email->setBCC($sendBCC) : ''; // comma seperated values or arrays
		(isset($sendAttachment)) ? $email->attach($sendAttachment) : ''; //you can use the App patch 		
			
		if($email->send()){
			//Util::mailSend($sendParams);
			return 'Email sent';
            // dd();
		}else{
			return $email->printDebugger(['headers']);
			//dd()
		}
	}







}