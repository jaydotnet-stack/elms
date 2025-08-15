<?php

namespace App\Models;

use CodeIgniter\Model;

class AssignTeacherToSubjectModel extends Model
{
    protected $db;
    var $csrf;
    protected $request;
    public function __construct()
    {
        parent::__construct();
        $this->request = \Config\Services::request();

        $this->csrf = csrf_hash();
        $this->db = db_connect();
    }    

    protected $DBGroup          = 'default';
    protected $table            = 'teacherassignedsubject';
    protected $primaryKey       = 'teacherassignedsubject_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'teacherassignedsubject_employee_no',
        'teacherassignedsubject_session',
        'teacherassignedsubject_class_level',
        'teacherassignedsubject_term',
        'teacherassignedsubject_subject',
        'teacherassignedsubject_assignee'
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


    public function processassignteachertosubjectmodel(){
        extract($_POST);

        $addusermodel = new AssignTeacherToSubjectModel();

        $userinformation = session()->get('userInformation');
        $userlog = 	$userinformation->staffaccount_employment_no;

        $session = $_POST['session'];
        $term = $_POST['term'];

        $teacher = $_POST['teacher'];
        $teacher = explode(",", $teacher);

        $classes = $_POST['classes'];
        $classes = explode(",", $classes);

        $subject = $_POST['subject'];
        $subject = explode(",", $subject);

       $status = 0;

        for($t = 0; $t <= count($teacher) - 1; $t++){
            $currentteacher = $teacher[$t];
            for($c = 0; $c <= count($classes) - 1; $c++){
                $currentclass = $classes[$c];
                for($s = 0; $s <= count($subject) - 1; $s++){
                    $currentsubject = $subject[$s];

                    $data = [
                        'teacherassignedsubject_employee_no'                =>  $currentteacher,
                        'teacherassignedsubject_session'        =>  $session,
                        'teacherassignedsubject_class_level'                  =>  $currentclass,
                        'teacherassignedsubject_term'              =>  $term,
                        'teacherassignedsubject_subject'              =>  $currentsubject,
                        'teacherassignedsubject_assignee'           =>  $userlog
                    ];                     

                    $query = $this->db->query("SELECT * FROM teacherassignedsubject WHERE 
                    
                    teacherassignedsubject_employee_no = '$currentteacher' && 

                    teacherassignedsubject_session = '$session' && teacherassignedsubject_class_level = '$currentclass' 
                    
                    && teacherassignedsubject_term = '$term' 

                    && teacherassignedsubject_subject = '$currentsubject' 
                    
                    -- && teacherassignedsubject_assignee = '$userlog'
                    
                    ");

                    $num_rows =  $query->getNumRows();
                    if ($num_rows == 0) {

                        if ($this->insert($data)) {
                            $status += 1;
                            // return [
                            //     'status' => 1,
                            //     'message' => 'Teacher assigned successfully',
                            //     'newtoken' => $this->csrf
                            // ];
                        } else {
                            // return [
                            //     'status' => 0,
                            //     'message' => 'Error assigning teacher',
                            //     'newtoken' => $this->csrf
                            // ];
                        }


                    }else{

                        return [
                            'status' => 1,
                            'message' => 'Teacher assigned successfully',
                            'newtoken' => $this->csrf
                        ];                        

                        // $data = [
                        //     'teacherassignedsubject_employee_no'                =>  $currentteacher,
                        //     'teacherassignedsubject_session'        =>  $session,
                        //     'teacherassignedsubject_class_level'                  =>  $currentclass,
                        //     'teacherassignedsubject_term'              =>  $term,
                        //     'teacherassignedsubject_subject'              =>  $currentsubject,
                        //     'teacherassignedsubject_assignee'           =>  $userlog
                        // ]; 


                        // if($this->db->table('fee')->where('fee_code', $feecode)->update($data)){
                        //     return [
                        //         'status' => 1, 
                        //         'message' => 'Teacher assigned updated successfully',
                        //         'newtoken' => $this->csrf
                        //     ];			
                        // }else{
                        //     return [
                        //         'status' => 0, 
                        //         'message' => 'Error updating assignment',
                        //         'newtoken' => $this->csrf
                        //     ];
                        // }

                    }

                }

            }

        }

        if($status > 0){
            return [
                'status' => 1,
                'message' => 'Teacher assigned successfully',
                'newtoken' => $this->csrf
            ];            
        }else{
            return [
                'status' => 0, 
                'message' => 'Unable to assign teacher',
                'newtoken' => $this->csrf
            ];            
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
