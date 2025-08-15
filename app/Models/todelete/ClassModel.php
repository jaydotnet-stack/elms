<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassModel extends Model
{
    protected $db;
    var $csrf; 
    public function __construct() {
        $this->csrf = csrf_hash();
        $this->db = db_connect(); 
        $this->request = $request = \Config\Services::request();    

	}     

    protected $DBGroup          = 'default';
    protected $table            = 'fipims_classlevel';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'classcategory',
        'description',
        'created_at',
        'updated_at',
        'updated_by',
    ];

    public function getclassbycategorynamemodel(/*$getclasscategory*/){
        $classcategory =  $_POST['classcategory'];
        $query = $this->db->query("SELECT * FROM fipims_classlevel WHERE classcategory = '$classcategory' ORDER BY description ASC");
        $num_rows =  $query->getNumRows();        
        if ($num_rows > 0){
            return [
                'status' => 1, 
                'classes' => $query->getResult(), 
                'newtoken' => $this->csrf
            ];
        }else{
            return ['status' => 0, 'classes' => 0, 'newtoken' => $this->csrf];
        } 	
    }    

    public function getclassesmodel(){
        $query = $this->db->query("SELECT * FROM fipims_classlevel ORDER BY description ASC");
        $num_rows =  $query->getNumRows();        
        if ($num_rows > 0){
            return [
                'status' => 1, 
                'classes' => $query->getResult(), 
                'newtoken' => $this->csrf
            ];
        }else{
            return ['status' => 0, 'classes' => 0, 'newtoken' => $this->csrf];
        } 	
    }     

    // public function addclassclassmodel()
    // {
    //     $this->class_model;  
    //     $classcode        =  strtoupper($this->request->getPost('classcode'));
    //     $classname        =  strtoupper($this->request->getPost('classname'));
    //     $classescategory  =  strtoupper($this->request->getPost('classescategory'));

    //     $data = [
    //         'classes_code'      =>  $classcode,
    //         'classes_name'      =>  $classname,
    //         'classes_category'  =>  $classescategory,
    //         'updated_by'        =>  'Anonymous',
    //     ];

    //     // Check if classcode already exists
    //     $classcodeExists = $this->db->table('classes')
    //         ->where('classes_code', $classcode)
    //         ->countAllResults() > 0;

    //     // Check if classname already exists
    //     $classnameExists = $this->db->table('classes')
    //         ->where('classes_name', $classname)
    //         ->countAllResults() > 0;

    //     if ($classcodeExists && $classnameExists) {
    //         // If both are exists
    //         if ($this->db->table('classes')->update($data, ['classes_code' => $classcode])) {
    //             return ['status' => 1, 'message' => 'Class updated successfully!', 'newtoken' => csrf_hash()];
    //         }
    //     }elseif (!$classcodeExists && !$classnameExists) {
    //         // If both are unique, insert the new class
    //         if ($this->db->table('classes')->insert($data)) {
    //             return ['status' => 1, 'message' => 'Class created successfully!', 'newtoken' => csrf_hash()];
    //         }
    //     } elseif ($classcodeExists && !$classnameExists) {
    //         // If classcode exists but classname is unique, update the class
    //         if ($this->db->table('classes')->update($data, ['classes_code' => $classcode])) {
    //             return ['status' => 1, 'message' => 'Class updated successfully!', 'newtoken' => csrf_hash()];
    //         }
    //     } elseif ($classnameExists) {
    //         // If classname already exists
    //         return ['status' => 0, 'message' => 'Class Name already exists. Please use a different name!.', 'newtoken' => csrf_hash()];
    //     }

    //     return ['status' => 0, 'message' => 'Error occurred!', 'newtoken' => csrf_hash()];
    // }

    public function process_add_class()
    {
        // Set timezone to Lagos, Nigeria
        date_default_timezone_set('Africa/Lagos');

        $id = $this->request->getPost('id'); // ID for update, assume it's passed in the request
        $classcategory = strtoupper($this->request->getPost('classcategory')); // Renamed to match data structure
        $description = strtoupper($this->request->getPost('description'));
        $currentDateTime = date('Y-m-d g:i A'); // Current date and time in 12-hour format

        $data = [
            'classcategory'  =>  $classcategory,
            'description'    =>  $description,
            'created_at'     =>  $currentDateTime,
            'updated_by'     =>  'Anonymous',
        ];

        $table = $this->db->table('fipims_classlevel');

        if ($id > 0) {
            // Fetch the current record
            $currentRecord = $table->where('id', $id)->get()->getRow();

            if ($currentRecord) {
                // Check if submitted values are the same as the current record
                if (
                    $currentRecord->classcategory === $classcategory &&
                    $currentRecord->description === $description
                ) {
                    return [
                        'status' => 0,
                        'message' => 'No changes detected. Update not performed.',
                        'newtoken' => $this->csrf,
                    ];
                }

                // Check for duplicates for other records
                $duplicateCheck = $table
                    ->where('id !=', $id)
                    ->groupStart()
                    // ->where('classcategory', $classcategory)
                    ->orWhere('description', $description)
                    ->groupEnd()
                    ->countAllResults();

                if ($duplicateCheck > 0) {
                    return [
                        'status' => 0,
                        'message' => 'Class description already exists.',
                        'newtoken' => $this->csrf,
                    ];
                }

                // Update the record
                if ($table->update($data, ['id' => $id])) {
                    return [
                        'status' => 1,
                        'message' => 'Updated successfully.',
                        'newtoken' => $this->csrf,
                    ];
                }
            } else {
                return [
                    'status' => 0,
                    'message' => 'Record not found.',
                    'newtoken' => $this->csrf,
                ];
            }
        } else {
            // Insert operation
            $duplicateCheck = $table
                ->groupStart()
                // ->where('classcategory', $classcategory)
                ->orWhere('description', $description)
                ->groupEnd()
                ->countAllResults();

            if ($duplicateCheck > 0) {
                return [
                    'status' => 0,
                    'message' => 'Duplicate entry detected. Class description already exists.',
                    'newtoken' => $this->csrf,
                ];
            }

            if ($table->insert($data)) {
                return [
                    'status' => 1,
                    'message' => 'Class Category created successfully.',
                    'newtoken' => $this->csrf,
                ];
            }
        }

        return [
            'status' => 0,
            'message' => 'Error occurred.',
            'newtoken' => $this->csrf,
        ];
    }
    //Fetching all Class records
    public function class_table(){
        $category = $_GET['cat']; // Get the category from the request
        $builder = $this->db->table('fipims_classlevel');
        $builder->select('*');
        $builder->orderBy('description', 'ASC'); // Order by 'description' in ascending order
        
        if ($category && $category !== '--') { // Check if category is set and valid
            $builder->where('classcategory', $category);
        }
        
        $query = $builder->get();

        $sn = 0;
        $sOutput = '{';
        $sOutput .= '"aaData": [ ';
        foreach ($query->getResult() as $row) {
            $sn++;

            $button1 = "<button type='button' class='btn btn-success' id='" . $row->description . "' onclick='loadclass(this.id)'>Edit</button>";
            $button2 = "<button type='button' class='btn btn-danger' id='" . $row->description . "' onclick='deleteClass(this.id)'>Delete</button>";
            $buttons = "<center>" . $button1 . ' ' . $button2 . "</center>";

            $sOutput .= "[";
            $sOutput .= '"' . $sn . '",';  
            // $sOutput .= '"' . $row->classcategory . '",';             
            $sOutput .= '"' . $row->description . '",';            
            $sOutput .= '"' . $buttons . '",';
            $sOutput = substr_replace($sOutput, "", -1);
            $sOutput .= "],"; 
        }
        $sOutput = substr_replace($sOutput, "", -1);
        $sOutput .= '] }';
        return $sOutput;
    }

    public function getclassleveldatatablemodel(){
        $query = $this->db->query("SELECT * FROM fipims_classlevel ORDER BY description ASC");
        $num_rows =  $query->getNumRows();
        if ($num_rows > 0) {
            # Creating a json data from the result returned
            # ---------------------------------------------
            $sn = 0;
            $sOutput = '{';
            $sOutput .= '"aaData": [ ';
            foreach ($query->getResult() as $row) {
                $sn++;

                $button ="<center><input type='checkbox' class='check' id='$row->description' onclick='selectUnselectClass(this.id)'></center>";

                $sOutput .= "[";
                $sOutput .= '"' . $sn . '",';
                $sOutput .= '"' . $row->description . '",';
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

    public function get_class(){
        $description = $_POST['description'];
        $query = $this->db->query("SELECT * FROM fipims_classlevel WHERE description = '$description'");
        $num_rows =  $query->getNumRows();        
        if ($num_rows > 0){
            return json_encode($query->getResult());
            
        }else{
            return 0;
        } 	
    }

     public function select_classlevel(){
        $query =  $this->db->query("SELECT * FROM fipims_classlevel ORDER BY description ASC");
        return $query->getResult(); 
    }


    public function delete_class($description)
    {
        // Securely delete the record
        $this->where('description', $description);
        $success = $this->delete();

        if ($success) {
            return json_encode([
                'status' => 1,
                // 'message' => 'Record successfully deleted.'
                'message' => '[' . $description . ']' . " ".'record successfully deleted.'
            ]);
        } else {
            return 0;
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
