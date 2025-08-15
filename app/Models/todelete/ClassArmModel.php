<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassArmModel extends Model
{
    protected $db;
    var $csrf; 
    public function __construct() {
        $this->csrf = csrf_hash();
        $this->db = db_connect(); 
        $this->request = $request = \Config\Services::request();     

	}     

    protected $DBGroup          = 'default';
    protected $table            = 'fipims_classarm';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'description',
        'created_at',
        'updated_at',
        'updated_by',
    ];


public function process_add_class_arm()
{
    $description = strtoupper($this->request->getPost('description'));
    $id = $this->request->getPost('id'); // Assuming `id` is passed for updates

    $data = [
        'description' => $description,
        'updated_by' => 'Anonymous',
    ];

    $table = $this->db->table('fipims_classarm');

    if ($id > 0) {
        // Fetch the current description from the database for the given ID
        $currentRecord = $table->where('id', $id)->get()->getRow();

        if ($currentRecord) {
            // Check if the submitted description matches the current one
            if ($currentRecord->description === $description) {
                return ['status' => 0, 'message' => 'No changes detected. Update not performed.', 'newtoken' => csrf_hash()];
            }

            // Check if the new description already exists for another record
            $descriptionExists = $table->where('description', $description)->where('id !=', $id)->countAllResults() > 0;

            if ($descriptionExists) {
                return ['status' => 0, 'message' => 'Class arm description already exists!', 'newtoken' => csrf_hash()];
            }

            // Perform the update
            if ($table->update($data, ['id' => $id])) {
                return ['status' => 1, 'message' => 'Class arm description updated successfully', 'newtoken' => csrf_hash()];
            }
        } else {
            return ['status' => 0, 'message' => 'Record not found.', 'newtoken' => csrf_hash()];
        }
    } else {
        // Insert operation
        $descriptionExists = $table->where('description', $description)->countAllResults() > 0;

        if ($descriptionExists) {
            return ['status' => 0, 'message' => 'Class arm description already exists!', 'newtoken' => csrf_hash()];
        }

        if ($table->insert($data)) {
            return ['status' => 1, 'message' => 'Class arm description created successfully', 'newtoken' => csrf_hash()];
        }
    }

    return ['status' => 0, 'message' => 'Error occurred', 'newtoken' => csrf_hash()];
}


    
    //Fetching all Class records
    public function classArmTable()
    {
        $builder = $this->db->table('fipims_classarm');
        $builder->select('*');
        $query     = $builder->get();
        $builder->orderBy('description', 'ASC'); // Order by 'regno' in ascending order
        $query = $builder->get();

        # Creating a json data from the result returned   organisationName 	positionHeld 	dateFrom1 	dateTo1 	brief
        # ---------------------------------------------
        $sn = 0;
        $sOutput = '{';
        $sOutput .= '"aaData": [ ';
        foreach ($query->getResult() as $row) {
            $sn++;

                $button1    =   "<button type='button' class='btn btn-success' id='" . $row->description . "' onclick='loadclassarm(this.id)'>Edit</button>";

                $button2    =   "<button type='button' class='btn btn-danger' id='" . $row->description . "' onclick='deleteClassArm(this.id)'>Delete</button>";

                $buttons    =   "<center>".$button1 . ' ' . $button2."</center>";

                $sOutput .= "[";
                $sOutput .= '"'. $sn . '",';               
                $sOutput .= '"'. $row->description . '",';             
                $sOutput .= '"'.$buttons.'",';
                $sOutput = substr_replace( $sOutput, "", -1 );
                $sOutput .= "],"; 
        }
        $sOutput = substr_replace($sOutput, "", -1);
        $sOutput .= '] }';
        return $sOutput;
    }

    public function getclassarmsmodel(){
        $query = $this->db->query("SELECT * FROM fipims_classarm ");
        $num_rows =  $query->getNumRows();        
        if ($num_rows > 0){
            return $query->getResult();
        }else{
            return 0;
        } 	
    }

    public function get_class_arm(){
        $description = $_POST['description'];
        $query = $this->db->query("SELECT * FROM fipims_classarm WHERE description = '$description'");
        $num_rows =  $query->getNumRows();        
        if ($num_rows > 0){
            return json_encode($query->getResult());
            
        }else{
            return 0;
        } 	
    }

   
    
    public function delete_class_arm($description)
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
