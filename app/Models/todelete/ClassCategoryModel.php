<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassCategoryModel extends Model
{
    protected $db;
    var $csrf; 
    public function __construct() {
        $this->csrf = csrf_hash();
        $this->db = db_connect(); 
        $this->request = $request = \Config\Services::request();    
	}     

    protected $DBGroup          = 'default';
    protected $table            = 'fipims_classcategory';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'categorycode',
        'description',
        'created_at',
        'updated_at',
        'updated_by',
    ];

    public function getclasscategorymodel(){
        $query = $this->db->query("SELECT * FROM classescategory ORDER BY classescategory_name ASC");
        $num_rows =  $query->getNumRows();        
        if ($num_rows > 0){
            return [
                'status' => 1, 
                'classescategory' => $query->getResult(), 
                'newtoken' => $this->csrf
            ];
        }else{
            return ['status' => 0, 'classescategory' => 0, 'newtoken' => $this->csrf];
        } 	
    }  
    
    public function select_classcats(){
        $query =  $this->db->query("SELECT * FROM fipims_classcategory ORDER BY description ASC");

        return $query->getResult(); 
    }    
    
    public function getclassnamemodel(){
        $query =  $this->db->query("SELECT * FROM fipims_classlevel ORDER BY description ASC");
        if($query->getNumRows() > 0){
            return $query->getResult(); 
        }else{
            return 0; 
        }
    }    

    public function process_add_classcategory()
    {
        // Set timezone to Lagos, Nigeria
        date_default_timezone_set('Africa/Lagos');

        $id = $this->request->getPost('id'); // ID for update, assume it's passed in the request
        $categorycode = strtoupper($this->request->getPost('categorycode')); // Renamed to match data structure
        $description = strtoupper($this->request->getPost('description'));
        $currentDateTime = date('Y-m-d g:i A'); // Current date and time in 12-hour format

        $data = [
            'categorycode' => $categorycode,
            'description' => $description,
            'updated_by' => 'Anonymous',
            'created_at' => $currentDateTime,
        ];

        $table = $this->db->table('fipims_classcategory');

        if ($id > 0) {
            // Fetch the current record
            $currentRecord = $table->where('id', $id)->get()->getRow();

            if ($currentRecord) {
                // Check if submitted values are the same as the current record
                if (
                    $currentRecord->categorycode === $categorycode &&
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
                    ->where('categorycode', $categorycode)
                    ->orWhere('description', $description)
                    ->groupEnd()
                    ->countAllResults();

                if ($duplicateCheck > 0) {
                    return [
                        'status' => 0,
                        'message' => 'Duplicate entry detected. Category Code or Description already exists.',
                        'newtoken' => $this->csrf,
                    ];
                }

                // Update the record
                if ($table->update($data, ['id' => $id])) {
                    return [
                        'status' => 1,
                        'message' => 'Class Category updated successfully.',
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
                ->where('categorycode', $categorycode)
                ->orWhere('description', $description)
                ->groupEnd()
                ->countAllResults();

            if ($duplicateCheck > 0) {
                return [
                    'status' => 0,
                    'message' => 'Duplicate entry detected. Category Code or Description already exists.',
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

    


    //Fetching all Class Category records
    public function class_category_table()
    {
        $builder = $this->db->table('fipims_classcategory');
        $builder->select('*');
        $query   = $builder->get();
        $builder->orderBy('description', 'ASC'); // Order by 'regno' in ascending order
        $query = $builder->get();

        # Creating a json data from the result returned   organisationName 	positionHeld 	dateFrom1 	dateTo1 	brief
        # ---------------------------------------------
        $sn = 0;
        $sOutput = '{';
        $sOutput .= '"aaData": [ ';
        foreach ($query->getResult() as $row) {
            $sn++;

                $button1    =   "<button type='button' class='btn btn-success' id='" . $row->categorycode . "' onclick='loadclasscategory(this.id)'>Edit</button>";

                $button2    =   "<button type='button' class='btn btn-danger' id='" . $row->description . "'onclick='deleteClassCategory(this.id)'>Delete</button>";
                $buttons    =   "<center>" . $button1 . ' ' . $button2 . "</center>";
                $sOutput .= "[";
                $sOutput .= '"' . $sn . '",';
                $sOutput .= '"' . $row->categorycode . '",';
                $sOutput .= '"' . $row->description . '",';
                $sOutput .= '"' . $buttons . '",';
                $sOutput = substr_replace($sOutput, "", -1);
                $sOutput .= "],";
        }
        $sOutput = substr_replace($sOutput, "", -1);
        $sOutput .= '] }';
        return $sOutput;
    }


    public function get_classcategory(){
        $categorycode = $_POST['categorycode'];
        $query = $this->db->query("SELECT * FROM fipims_classcategory WHERE categorycode = '$categorycode'");
        $num_rows =  $query->getNumRows();        
        if ($num_rows > 0){
            return json_encode($query->getResult());
            
        }else{
            return 0;
        } 	
    }

    public function delete_class_category($description)
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
