<?php

namespace App\Models;

use CodeIgniter\Model;

class PsychomotorModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'psychomotor';
    protected $primaryKey       = 'psychomotor_code';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['psychomotor_code', 'psychomotor_description'];

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


    function psychomotor()
    {
        $PsychomotorModel = new PsychomotorModel();
    
        // Sanitize and refine inputs
        $psychomotor_code = $this->refineInput($_POST['psychomotor_code'] ?? ''); 
        $psychomotor_description = $this->refineInput($_POST['psychomotor_description'] ?? '');
           
        $recordIDP = $this->refineInput($_POST['recordidP'] ?? '');
    
        // Limit the inputs to only 3 characters
        $psychomotor_code = substr($psychomotor_code, 0, 3);
        $psychomotor_code = strtoupper($psychomotor_code);


        // Validate the remark field for only alphabetic characters
        if (!preg_match('/^[A-Za-z]+$/', $psychomotor_description)) {
            return [
                'status' => 0,
                'message' => 'Invalid input: Only alphabetic characters are allowed in the Description field.'
            ];
        }

        
        // Prepare data for insertion or update
        $data = [
            'psychomotor_code' => $psychomotor_code,
            'psychomotor_description' => $psychomotor_description,
        ];
    
    

    // If recordIDP is provided, we are updating an existing record
    if ($recordIDP) {
        // Get the existing record to check if this is the same record
        $builder = $this->db->table('psychomotor');
        $builder->select('psychomotor_id, psychomotor_code, psychomotor_description')
                ->where('psychomotor_id', $recordIDP);
        $query = $builder->get();
        $existingRecord = $query->getRow();

        // If the record exists, we proceed with the update
        if ($existingRecord) {
            // Check if psychomotor_code or psychomotor_description is already used by another record
            $builder = $this->db->table('psychomotor');
            $builder->select('psychomotor_code')
                    ->where('psychomotor_id !=', $recordIDP) // Exclude the record being updated
                    ->groupStart()
                        ->where('psychomotor_code', $psychomotor_code)
                        ->orWhere('psychomotor_description', $psychomotor_description)
                    ->groupEnd();
            $query = $builder->get();
            $duplicate = $query->getRow();

            if ($duplicate) {
                // A duplicate record exists for psychomotor_code or psychomotor_description, return a response
                $response = [
                    'status' => 2,
                    'psychomotor_description' => $psychomotor_description,
                    'psychomotor_code' => $psychomotor_code,
                    'message' => 'Psychomotor Code already exists'
                ];
            } else {
                // Proceed with updating the existing record
                $builder = $this->db->table('psychomotor');
                $builder->where('psychomotor_id', $recordIDP);
                $builder->update($data);
                $response = [
                    'status' => 1,
                    'psychomotor_description' => $psychomotor_description,
                    'psychomotor_code' => $psychomotor_code,
                    'message' => 'Psychomotor Skill successfully updated'
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
        // Check if the psychomotor_code or psychomotor_description already exists in the database
        $builder = $this->db->table('psychomotor');
        $builder->select('psychomotor_code')
                ->groupStart()
                    ->where('psychomotor_code', $psychomotor_code)
                    ->orWhere('psychomotor_description', $psychomotor_description)
                ->groupEnd();
        
        $query = $builder->get();
        $row = $query->getRow();

        if ($row) {
            // A record already exists with the same psychomotor_code or psychomotor_description
            $response = [
                'status' => 2,
                'psychomotor_description' => $psychomotor_description,
                'psychomotor_code' => $psychomotor_code,
                'message' => 'Psychomotor Skill already exists'
            ];
        } else {
            // Insert a new record
            $PsychomotorModel->insert($data);
            $response = [
                'status' => 1,
                'psychomotor_description' => $psychomotor_description,
                'psychomotor_code' => $psychomotor_code,
                'message' => 'Psychomotor Skill successfully added'
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
    public function getPsychomotorDataTable()
    {
        $builder = $this->db->table('psychomotor');
        $builder->select('*');
        $query = $builder->get();

        # Creating a json data from the result returned   organisationdescription 	positionHeld 	dateFrom1 	dateTo1 	brief
        # ---------------------------------------------
        $sn = 0;
        $sOutput = '{';
        $sOutput .= '"aaData": [ ';
        foreach ($query->getResult() as $row) {
            $sn++;
            $myref1 = $row->psychomotor_id;
            $myref2 = $row->psychomotor_description;
            $myref3 = $row->psychomotor_code;                         
            
            $myref = $myref1. "|" . $myref2. "|" . $myref3 ;

            $button1    =   "<button class='btn btn-info' id='" . $myref . "'onclick='showUsTheIDP(this.id)'>Edit</button>";

            $button2    =   "<button class='btn btn-danger' id='" . $row->psychomotor_code . "'onclick='deleteP(this.id)'>Delete</button>";

            $buttons    =   "<center>" . $button1 . " " . $button2 . "</center>";

            $sOutput .= "[";

                $sOutput .= '"' . $sn . '",';
                $sOutput .= '"' . $row->psychomotor_code . '",';
                $sOutput .= '"' . $row->psychomotor_description . '",';
                $sOutput .= '"' . $buttons . '",';
                $sOutput = substr_replace($sOutput, "", -1);

            $sOutput .= "],";
        }
        
        $sOutput = substr_replace($sOutput, "", -1);
        $sOutput .= '] }';
        return $sOutput;
    }

    //Onkeyup function
    public function showusthepsychomotor()
    {
        $psychomotor = strtoupper($_POST['psychomotor']);
        $builder = $this->db->table('psychomotor');
        $builder->select('*')->where('psychomotor_code', $psychomotor);
        $query = $builder->get();
        $psychomotorRecord = $query->getRow();   


        if($psychomotorRecord){
            $response = [
                'status' => 1,
                'psychomotorRecord' => $psychomotorRecord
            ]; 
        }else{
            $response = [
                'status' => 0,
                'psychomotorRecord' => 'no record'
            ];               
        }
        
   

        return $response;
    }

     //DELETING GRADE fROM TABLE
    public function deletepsychomotor()
    {
        $request = \Config\Services::request();
        $psychomotor = $request->getPost('psychomotor');
        
        // Ensure $extracurricular is provIDAd
        if ($psychomotor) {
            // Use Query Builder to delete the record
            $builder = $this->db->table('psychomotor'); 
            $builder->where('psychomotor_code', $psychomotor);   
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
                'message' => 'Psychomotor  not provided'
            ];
        }

        return json_encode($response);
    }


}
