<?php

namespace App\Models;

use CodeIgniter\Model;

class AffectiveModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'affective';
    protected $primaryKey       = 'affective_code';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['affective_code', 'affective_description'];

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



function affective()
{
    $AffectiveModel = new AffectiveModel();

    // Sanitize and refine inputs
    $affective_description = $this->refineInput($_POST['affective_description'] ?? '');
    $affective_code = $this->refineInput($_POST['affective_code'] ?? '');    
    $recordIDA = $this->refineInput($_POST['recordidA'] ?? '');

     // Limit the inputs to only 3 characters
     $affective_code = substr($affective_code, 0, 3);
     $affective_code = strtoupper($affective_code);


     // Validate the remark field for only alphabetic characters
     if (!preg_match('/^[A-Za-z]+$/', $affective_description)) {
        return [
            'status' => 0,
            'message' => 'Invalid input: Only alphabetic characters are allowed in the Description field.'
        ];
    }
    // Prepare data for insertion or update
    $data = [
        'affective_description' => strtoupper($affective_description),
        'affective_code' => $affective_code,
    ];

    // If recordIDA is provided, we are updating an existing record
    if ($recordIDA) {
        // Get the existing record to check if this is the same record
        $builder = $this->db->table('affective');
        $builder->select('affective_id, affective_code, affective_description')
                ->where('affective_id', $recordIDA);
        $query = $builder->get();
        $existingRecord = $query->getRow();

        // If the record exists, we proceed with the update
        if ($existingRecord) {
            // Check if affective_code or affective_description is already used by another record
            $builder = $this->db->table('affective');
            $builder->select('affective_code')
                    ->where('affective_id !=', $recordIDA) // Exclude the record being updated
                    ->groupStart()
                        ->where('affective_code', $affective_code)
                        ->orWhere('affective_description', $affective_description)
                    ->groupEnd();
            $query = $builder->get();
            $duplicate = $query->getRow();

            if ($duplicate) {
                // A duplicate record exists for affective_code or affective_description, return a response
                $response = [
                    'status' => 2,
                    'affective_description' => $affective_description,
                    'affective_code' => $affective_code,
                    'message' => 'Affective Code already exists'
                ];
            } else {
                // Proceed with updating the existing record
                $builder = $this->db->table('affective');
                $builder->where('affective_id', $recordIDA);
                $builder->update($data);
                $response = [
                    'status' => 1,
                    'affective_description' => $affective_description,
                    'affective_code' => $affective_code,
                    'message' => 'Affective Area successfully updated'
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
        // No recordIDA provided, proceed with inserting a new record
        // Check if the affective_code or affective_description already exists in the database
        $builder = $this->db->table('affective');
        $builder->select('affective_code')
                ->groupStart()
                    ->where('affective_code', $affective_code)
                    ->orWhere('affective_description', $affective_description)
                ->groupEnd();
        
        $query = $builder->get();
        $row = $query->getRow();

        if ($row) {
            // A record already exists with the same affective_code or affective_description
            $response = [
                'status' => 2,
                'affective_description' => $affective_description,
                'affective_code' => $affective_code,
                'message' => 'Affective Area already exists'
            ];
        } else {
            // Insert a new record
            $AffectiveModel->insert($data);
            $response = [
                'status' => 1,
                'affective_description' => $affective_description,
                'affective_code' => $affective_code,
                'message' => 'Affective Area successfully added'
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
    public function getAffectiveDataTable()
    {
        $builder = $this->db->table('affective');
        $builder->select('*');
        $query = $builder->get();

        # Creating a json data from the result returned   organisationdescription 	positionHeld 	dateFrom1 	dateTo1 	brief
        # ---------------------------------------------
        $sn = 0;
        $sOutput = '{';
        $sOutput .= '"aaData": [ ';
        foreach ($query->getResult() as $row) {
            $sn++;
            $myref1 = $row->affective_id;
            $myref2 = $row->affective_description;
            $myref3 = $row->affective_code;                         
            
                           

            $myref = $myref1. "|" . $myref2. "|" . $myref3 ;


            $button1    =   "<button class='btn btn-info' id='" . $myref . "'onclick='showUsTheIDA(this.id)'>Edit</button>";
            $button2    =   "<button class='btn btn-danger' id='" . $row->affective_code . "'onclick='deleteA(this.id)'>Delete</button>";
            $buttons    =   "<center>" . $button1 . " " . $button2 . "</center>";
            $sOutput .= "[";
            $sOutput .= '"' . $sn . '",';
            $sOutput .= '"' . $row->affective_code . '",';
            $sOutput .= '"' . $row->affective_description . '",';
            $sOutput .= '"' . $buttons . '",';
            $sOutput = substr_replace($sOutput, "", -1);
            $sOutput .= "],";
        }
        $sOutput = substr_replace($sOutput, "", -1);
        $sOutput .= '] }';
        return $sOutput;
    }

     //Fetching all extracurricular records
     public function showustheaffective()
     {
         $affective = strtoupper($_POST['affective']);
         $builder = $this->db->table('affective');
         $builder->select('*')->where('affective_code', $affective);
         $query = $builder->get();
         $affectiveRecord = $query->getRow();   
 
 
         if($affectiveRecord){
             $response = [
                 'status' => 1,
                 'affectiveRecord' => $affectiveRecord
             ]; 
         }else{
             $response = [
                 'status' => 0,
                 'affectiveRecord' => 'no record'
             ];               
         }
         
    
 
         return $response;
     }


     //DELETING GRADE fROM TABLE
    public function deleteaffective()
    {
        $request = \Config\Services::request();
        $affective = $request->getPost('affective');
        
        // Ensure $extracurricular is provIDAd
        if ($affective) {
            // Use Query Builder to delete the record
            $builder = $this->db->table('affective'); 
            $builder->where('affective_code', $affective);   
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
                'message' => 'Affective Code or Area not provided'
            ];
        }

        return json_encode($response);
    }
}
