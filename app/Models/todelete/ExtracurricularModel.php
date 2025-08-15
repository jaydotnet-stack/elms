<?php

namespace App\Models;

use CodeIgniter\Model;

class ExtracurricularModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'extracurricular';
    protected $primaryKey       = 'extracurricular_grade';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['extracurricular_grade', 'extracurricular_value', 'extracurricular_description'];

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

//    function extracurricular()
// {
//     $ExtracurricularModel = new ExtracurricularModel();

//     // Sanitize and refine inputs
//     $extracurricular_grade = $this->refineInput($_POST['extracurricular_grade'] ?? '');    
//     // $extracurricular_range1 = $this->refineInput($_POST['extracurricular_range1'] ?? '');
//     $extracurricular_value = $this->refineInput($_POST['extracurricular_value'] ?? '');
//     $extracurricular_description = $this->refineInput($_POST['extracurricular_description'] ?? '');
//     $recordidE = $this->refineInput($_POST['recordidE'] ?? '');

//     // Prepare data for insertion or update
//     $data = [
//         'extracurricular_grade' => $extracurricular_grade,
//         // 'extracurricular_range1' => $extracurricular_range1,
//         'extracurricular_value' => $extracurricular_value,
//         'extracurricular_description' => $extracurricular_description,
//     ];

//     // Check if the extracurricular entry already exists
//     $builder = $this->db->table('extracurricular');
//     $builder->select('extracurricular_grade')
//             ->groupStart()
//             ->where('extracurricular_value', $extracurricular_value)
//             ->orWhere('extracurricular_description', $extracurricular_description)
//             ->groupEnd();
    
//     $query = $builder->get();
//     $row = $query->getRow();

//     if ($row) {
//         // The record already exists, return a duplicate response
//         $response = [
//             'status' => 2,
//             'extracurricular_grade' => $extracurricular_grade,
//             // 'extracurricular_range1' => $extracurricular_range1,
//             'extracurricular_value' => $extracurricular_value,
//             'extracurricular_description' => $extracurricular_description,
//             'message' => 'Extracurricular already exists'
//         ];
//     } else {
//             $builder = $this->db->table('extracurricular')->select('extracurricular_grade')->where('extracurricular_id',$recordidE);
//             $query = $builder->get();
//             $row = $query->getRow();
//             if (isset($row)){
//                 // Update the existing record
//             $builder = $this->db->table('extracurricular');
//             $builder->where('extracurricular_id', $recordidE);
//             $builder->update($data);
//             $response = [
//                 'status' => 1,
//                 'extracurricular_grade' => $extracurricular_grade,
//                 // 'extracurricular_range1' => $extracurricular_range1,
//                 'extracurricular_value' => $extracurricular_value,
//                 'extracurricular_description' => $extracurricular_description,
//                 'message' => 'Extracurricular successfully updated'
//             ];
//         } else {
//             // Insert a new record
//             $ExtracurricularModel->insert($data);

//             $response = [
//                 'status' => 1,
//                 'extracurricular_grade' => $extracurricular_grade,
//                 // 'extracurricular_range1' => $extracurricular_range1,
//                 'extracurricular_value' => $extracurricular_value,
//                 'extracurricular_description' => $extracurricular_description,
//                 'message' => 'Extracurricular successfully added'
//                  ];
//             }   
//         }

//     return $response;
// }

function extracurricular()
{
    $ExtracurricularModel = new ExtracurricularModel();

    // Sanitize and refine inputs
    $extracurricular_grade = strtoupper($this->refineInput($_POST['extracurricular_grade'] ?? ''));    
    // $extracurricular_range1 = $this->refineInput($_POST['extracurricular_range1'] ?? '');
    $extracurricular_value = $this->refineInput($_POST['extracurricular_value'] ?? '');
    $extracurricular_description = strtoupper($this->refineInput($_POST['extracurricular_description'] ?? ''));
    $recordidE = $this->refineInput($_POST['recordidE'] ?? '');


         // Validate the remark field for only numerical values
    if (!preg_match('/^\d+$/', $extracurricular_value)) {
        return [
        'status' => 0,
        'message' => 'Invalid input: Only numerical values are allowed in the Value field.'
         ];
    }


    // // Validate the remark field for only alphabetic characters
    // if (!preg_match('/^[A-Za-z]+$/', $extracurricular_description)) {
    //     return [
    //         'status' => 0,
    //         'message' => 'Invalid input: Only alphabetic characters are allowed in the Description field.'
    //     ];
    // }

    // Prepare data for insertion or update
    $data = [
        'extracurricular_grade' => $extracurricular_grade,
        // 'extracurricular_range1' => $extracurricular_range1,
        'extracurricular_value' => $extracurricular_value,
        'extracurricular_description' => $extracurricular_description,
    ];

    // Check if the extracurricular_grade already exists
    $builder = $this->db->table('extracurricular');
    $builder->select('extracurricular_grade')
            ->where('extracurricular_grade', $extracurricular_grade);
    
    $query = $builder->get();
    $existingGrade = $query->getRow();

    if ($existingGrade) {
        // If the grade exists and we are not editing that record, return an error message
        if (!$recordidE || ($recordidE && $existingGrade->extracurricular_grade != $extracurricular_grade)) {
            $response = [
                'status' => 2,
                'extracurricular_grade' => $extracurricular_grade,
                'extracurricular_value' => $extracurricular_value,
                'extracurricular_description' => $extracurricular_description,
                'message' => 'Extracurricular grade already exists'
            ];
            return $response;
        }
    }

    // If there is a recordidE, we are updating an existing record
    if ($recordidE) {
        // Get the existing record to check if this is the same record
        $builder = $this->db->table('extracurricular');
        $builder->select('extracurricular_id, extracurricular_grade, extracurricular_value, extracurricular_description')
                ->where('extracurricular_id', $recordidE);
        $query = $builder->get();
        $existingRecord = $query->getRow();

        // If the record exists, we proceed with the update
        if ($existingRecord) {
            // Ensure we are not creating a duplicate with the same extracurricular_value or extracurricular_description
            $builder = $this->db->table('extracurricular');
            $builder->select('extracurricular_grade')
                    ->where('extracurricular_id !=', $recordidE) // Exclude the record being updated
                    ->groupStart()
                        ->where('extracurricular_value', $extracurricular_value)
                        ->orWhere('extracurricular_description', $extracurricular_description)
                    ->groupEnd();
            
            $query = $builder->get();
            $duplicate = $query->getRow();

            if ($duplicate) {
                // A duplicate record exists for value or description, return a response
                $response = [
                    'status' => 2,
                    'extracurricular_grade' => $extracurricular_grade,
                    'extracurricular_value' => $extracurricular_value,
                    'extracurricular_description' => $extracurricular_description,
                    'message' => 'Extracurricular value or description already exists'
                ];
            } else {
                // Update the existing record
                $builder = $this->db->table('extracurricular');
                $builder->where('extracurricular_id', $recordidE);
                $builder->update($data);
                $response = [
                    'status' => 1,
                    'extracurricular_grade' => $extracurricular_grade,
                    'extracurricular_value' => $extracurricular_value,
                    'extracurricular_description' => $extracurricular_description,
                    'message' => 'Extracurricular successfully updated'
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
        // No record ID provided, proceed with inserting a new record
        // Check if the extracurricular_value or extracurricular_description already exists in the database
        $builder = $this->db->table('extracurricular');
        $builder->select('extracurricular_grade')
                ->groupStart()
                    ->where('extracurricular_value', $extracurricular_value)
                    ->orWhere('extracurricular_description', $extracurricular_description)
                ->groupEnd();

        $query = $builder->get();
        $row = $query->getRow();

        if ($row) {
            // A record already exists with the same extracurricular_value or extracurricular_description
            $response = [
                'status' => 2,
                'extracurricular_grade' => $extracurricular_grade,
                'extracurricular_value' => $extracurricular_value,
                'extracurricular_description' => $extracurricular_description,
                'message' => 'Extracurricular value or description already exists'
            ];
        } else {
            // Insert a new record
            $ExtracurricularModel->insert($data);
            $response = [
                'status' => 1,
                'extracurricular_grade' => $extracurricular_grade,
                'extracurricular_value' => $extracurricular_value,
                'extracurricular_description' => $extracurricular_description,
                'message' => 'Extracurricular successfully added'
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
    public function getextracurricularDataTable()
    {
        $builder = $this->db->table('extracurricular');
        $builder->select('*');
        $query = $builder->get();

        # Creating a json data from the result returned   organisationName 	positionHeld 	dateFrom1 	dateTo1 	brief
        # ---------------------------------------------
        $sn = 0;
        $sOutput = '{';
        $sOutput .= '"aaData": [ ';
        foreach ($query->getResult() as $row) {
            $sn++;
            $myref1 = $row->extracurricular_id;
            $myref2 = $row->extracurricular_grade;                         
            // $myref3 = $row->extracurricular_range1; 
            $myref3 = $row->extracurricular_value;
            $myref4 = $row->extracurricular_description;               

            $myref = $myref1. "|" . $myref2. "|" . $myref3. "|" . $myref4;


            $button1    =   "<button class='btn btn-info' id='" . $myref . "'onclick='showUsTheIDE(this.id)'>Edit</button>";
            $button2    =   "<button class='btn btn-danger' id='" . $row->extracurricular_grade . "'onclick='deleteE(this.id)'>Delete</button>";
            $buttons    =   "<center>" . $button1 . " " . $button2 . "</center>";
            $sOutput .= "[";
            $sOutput .= '"' . $sn . '",';
            $sOutput .= '"' . $row->extracurricular_grade . '",';
            // $sOutput .= '"' . $row->extracurricular_range1 . '",';
            $sOutput .= '"' . $row->extracurricular_value . '",';
            $sOutput .= '"' . $row->extracurricular_description . '",';
            $sOutput .= '"' . $buttons . '",';
            $sOutput = substr_replace($sOutput, "", -1);
            $sOutput .= "],";
        }
        $sOutput = substr_replace($sOutput, "", -1);
        $sOutput .= '] }';
        return $sOutput;
    }


    public function showustheextracurricular()
    {
        $extracurricular = strtoupper($_POST['extracurricular']);
        $builder = $this->db->table('extracurricular');
        $builder->select('*')->where('extracurricular_grade', $extracurricular);
        $query = $builder->get();
        $extracurricularRecord = $query->getRow();   


        if($extracurricularRecord){
            $response = [
                'status' => 1,
                'extracurricularRecord' => $extracurricularRecord
            ]; 
        }else{
            $response = [
                'status' => 0,
                'extracurricularRecord' => 'no record'
            ];               
        }
        
   

        return $response;
    }


     //DELETING GRADE fROM TABLE
    public function deleteextracurricular()
    {
        $request = \Config\Services::request();
        $extracurricular = $request->getPost('extracurricular');
        
        // Ensure $extracurricular is provided
        if ($extracurricular) {
            // Use Query Builder to delete the record
            $builder = $this->db->table('extracurricular'); 
            $builder->where('extracurricular_grade', $extracurricular);   
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
                'message' => 'extracurricular not provided'
            ];
        }

        return json_encode($response);
    }
}
