<?php

namespace App\Models;

use CodeIgniter\Model;

class SubjectModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'subject';
    protected $primaryKey       = 'subject_code';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['subject_code', 'subject_name'];

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




function subject()
{
    $SubjectModel = new SubjectModel();

    // Sanitize and refine inputs
    $subject_name = $this->refineInput($_POST['subject_name'] ?? '');
    $subject_code = $this->refineInput($_POST['subject_code'] ?? '');    
    $recordIDS = $this->refineInput($_POST['recordidS'] ?? '');

     // Limit the inputs to only 3 characters
     $subject_code = substr($subject_code, 0, 3);
     $subject_code = strtoupper($subject_code);

     // Validate the remark field for only alphabetic characters
     if (!preg_match('/^[A-Za-z]+$/', $subject_name)) {
        return [
            'status' => 0,
            'message' => 'Invalid input: Only alphabetic characters are allowed in the Subject Name field.'
        ];
    }

    // Prepare data for insertion or update
    $data = [
        'subject_name' =>  strtoupper($subject_name),
        'subject_code' => $subject_code,
    ];

    // If recordIDS is provided, we are updating an existing record
    if ($recordIDS) {
        // Get the existing record to check if this is the same record
        $builder = $this->db->table('subject');
        $builder->select('subject_id, subject_code, subject_name')
                ->where('subject_id', $recordIDS);
        $query = $builder->get();
        $existingRecord = $query->getRow();

        // If the record exists, we proceed with the update
        if ($existingRecord) {
            // Check if subject_code or subject_name is already used by another record
            $builder = $this->db->table('subject');
            $builder->select('subject_code')
                    ->where('subject_id !=', $recordIDS) // Exclude the record being updated
                    ->groupStart()
                        ->where('subject_code', $subject_code)
                        ->orWhere('subject_name', $subject_name)
                    ->groupEnd();
            $query = $builder->get();
            $duplicate = $query->getRow();

            if ($duplicate) {
                // A duplicate record exists for subject_code or subject_name, return a response
                $response = [
                    'status' => 2,
                    'subject_name' => $subject_name,
                    'subject_code' => $subject_code,
                    'message' => 'Subject Code or Name already exists'
                ];
            } else {
                // Proceed with updating the existing record
                $builder = $this->db->table('subject');
                $builder->where('subject_id', $recordIDS);
                $builder->update($data);
                $response = [
                    'status' => 1,
                    'subject_name' => $subject_name,
                    'subject_code' => $subject_code,
                    'message' => 'Subject successfully updated'
                ];
            }
        } else {
            // Record ID not found for update
            $response = [
                'status' => 0,
                'message' => 'Record not found for update'
            ];
        }
    } else {
        // No recordIDS provided, proceed with inserting a new record
        // Check if the subject_code or subject_name already exists in the database
        $builder = $this->db->table('subject');
        $builder->select('subject_code')
                ->groupStart()
                    ->where('subject_code', $subject_code)
                    ->orWhere('subject_name', $subject_name)
                ->groupEnd();
        
        $query = $builder->get();
        $row = $query->getRow();

        if ($row) {
            // A record already exists with the same subject_code or subject_name
            $response = [
                'status' => 2,
                'subject_name' => $subject_name,
                'subject_code' => $subject_code,
                'message' => 'Subject Code or Name already exists'
            ];
        } else {
            // Insert a new record
            $SubjectModel->insert($data);
            $response = [
                'status' => 1,
                'subject_name' => $subject_name,
                'subject_code' => $subject_code,
                'message' => 'Subject successfully added'
            ];
        }
    }

    return $response;
}




    public function refineInput($data) {    
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }  

    //Fetching all extracurricular records
    public function getsubjectDataTable()
    {
        $builder = $this->db->table('subject');
        $builder->select('*');
        $query = $builder->get();

        # Creating a json data from the result returned   organisationName 	positionHeld 	dateFrom1 	dateTo1 	brief
        # ---------------------------------------------
        $sn = 0;
        $sOutput = '{';
        $sOutput .= '"aaData": [ ';
        foreach ($query->getResult() as $row) {
            $sn++;
            $myref1 = $row->subject_id;
            $myref2 = $row->subject_name;
            $myref3 = $row->subject_code;                         
            
                           

            $myref = $myref1. "|" . $myref2. "|" . $myref3 ;


            $button1    =   "<button class='btn btn-info' id='" . $myref . "'onclick='showUsTheIDS(this.id)'>Edit</button>";
            $button2    =   "<button class='btn btn-danger' id='" . $row->subject_code . "'onclick='deleteS(this.id)'>Delete</button>";
            $buttons    =   "<center>" . $button1 . " " . $button2 . "</center>";
            $sOutput .= "[";
            $sOutput .= '"' . $sn . '",';
            $sOutput .= '"' . $row->subject_code . '",';
            $sOutput .= '"' . $row->subject_name . '",';
            $sOutput .= '"' . $buttons . '",';
            $sOutput = substr_replace($sOutput, "", -1);
            $sOutput .= "],";
        }
        $sOutput = substr_replace($sOutput, "", -1);
        $sOutput .= '] }';
        return $sOutput;
    }

    public function noofsubjectmodel(){
        $query = $this->db->query("SELECT * FROM subject");
        return $query->getNumRows();
    }      

    public function getsubjectsdatatablemodel(){
        $query = $this->db->query("SELECT * FROM subject ORDER BY subject_name ASC");
        $num_rows =  $query->getNumRows();
        if ($num_rows > 0) {
            # Creating a json data from the result returned
            # ---------------------------------------------
            $sn = 0;
            $sOutput = '{';
            $sOutput .= '"aaData": [ ';
            foreach ($query->getResult() as $row) {
                $sn++;


                $button ="<center><input type='checkbox' class='check' id='$row->subject_code' onclick='selectUnselectSubject(this.id)'></center>";                

                $sOutput .= "[";
                $sOutput .= '"' . $sn . '",';
                $sOutput .= '"' . $row->subject_name . '",';
                $sOutput .= '"' . $button . '",';
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

    public function showusthesubject()
    {
        $subject = strtoupper($_POST['subject']);
        $builder = $this->db->table('subject');
        $builder->select('*')->where('subject_code', $subject);
        $query = $builder->get();
        $subjectRecord = $query->getRow();   


        if($subjectRecord){
            $response = [
                'status' => 1,
                'subjectRecord' => $subjectRecord
            ]; 
        }else{
            $response = [
                'status' => 0,
                'subjectRecord' => 'no record'
            ];               
        }
        
   

        return $response;
    }


     //DELETING GRADE fROM TABLE
    public function deletesubject()
    {
        $request = \Config\Services::request();
        $subject = $request->getPost('subject');
        
        // Ensure $extracurricular is provIDSd
        if ($subject) {
            // Use Query Builder to delete the record
            $builder = $this->db->table('subject'); 
            $builder->where('subject_code', $subject);   
            $builder->delete();   
            // Check if the deletion was successful
            if ($this->db->affectedRows() > 0) {
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
                'message' => 'Subject not provided'
            ];
        }

        return json_encode($response);
    }
}
