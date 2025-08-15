<?php

namespace App\Models;

use CodeIgniter\Model;

class GradesettingsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'fipims_gradesettings';
    protected $primaryKey       = 'gradesettings_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['gradesettings_gradeletter', 'gradesettings_category', 'gradesettings_rangeone', 'gradesettings_rangetwo', 'gradesettings_remark'];

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

    function gradesettingsmode()
    {
        $GradesettingsModel = new GradesettingsModel();

        $gradesettings_gradeletter = strtoupper($this->refineInput($_POST['grade_letter']));
        $gradesettings_category = $this->refineInput($_POST['classcategory']);
        $gradesettings_rangeone = $this->refineInput($_POST['scoring_rangeone']);
        $gradesettings_rangetwo = $this->refineInput($_POST['scoring_rangetwo']);
        $gradesettings_remark = strtoupper($this->refineInput($_POST['grade_remark']));
        $recordidG = $this->refineInput($_POST['recordidG']);

        // Validate numeric inputs for rangeone and rangetwo
        if (!is_numeric($gradesettings_rangeone) || !is_numeric($gradesettings_rangetwo)) {
            return [
                'status' => 0,
                'message' => 'Error: Please enter valid numeric values for range one and/or range two.'
            ];
        }

        // Convert to float for consistency
        $gradesettings_rangeone = floatval($gradesettings_rangeone);
        $gradesettings_rangetwo = floatval($gradesettings_rangetwo);

        // Validate that range one is less than range two
        if ($gradesettings_rangeone >= $gradesettings_rangetwo) {
            return [
                'status' => 0,
                'message' => 'Error: Score range one must be less than score range two.'
            ];
            exit;
        }

        //prepare data for insertion
        $data = [
            'gradesettings_gradeletter' => $gradesettings_gradeletter,
            'gradesettings_category'    => $gradesettings_category,
            'gradesettings_rangeone'    => $gradesettings_rangeone,
            'gradesettings_rangetwo'    => $gradesettings_rangetwo,
            'gradesettings_remark'      => $gradesettings_remark,
        ];

        // Check if the grade_name or grade_description already exists
        $builder = $this->db->table('fipims_gradesettings')
            ->select('*')
            ->where('gradesettings_category', $gradesettings_category) // Ensure validation is per category
            ->groupStart()
                ->where('gradesettings_gradeletter', $gradesettings_gradeletter) // Prevent same grade letter in category
                ->orGroupStart()
                    ->where('gradesettings_rangeone', $gradesettings_rangeone)
                    ->where('gradesettings_rangetwo', $gradesettings_rangetwo)
                ->groupEnd()
                ->orWhere('gradesettings_remark', $gradesettings_remark)
            ->groupEnd();

        $query = $builder->get();
        $row = $query->getRow();

        if ($row) {

            //prepare data for insertion
            $data = [
                'gradesettings_gradeletter'    => $gradesettings_gradeletter,
                'gradesettings_rangeone'    => $gradesettings_rangeone,
                'gradesettings_rangetwo'    => $gradesettings_rangetwo,
                'gradesettings_remark'      => $gradesettings_remark
            ];            

            $builder = $this->db->table('fipims_gradesettings');
            $builder->where('gradesettings_id', $recordidG);
            $builder->update($data);


            // grade_name or grade_description already exists
            $response = [
                'status' => 2,
                'gradesettings_gradeletter' => $gradesettings_gradeletter,
                'gradesettings_rangeone' => $gradesettings_rangeone,
                'gradesettings_rangetwo' => $gradesettings_rangetwo,
                'gradesettings_remark' => $gradesettings_remark,
                'message' => 'Grade successfully Updated'
            ];
        } else {
            $builder = $this->db->table('fipims_gradesettings')->select('*')->where('gradesettings_id', $recordidG);
            $query  = $builder->get();
            $row    = $query->getRow();
            if (isset($row)) {
                $builder = $this->db->table('fipims_gradesettings');
                $builder->where('gradesettings_id', $recordidG);
                $builder->update($data);
                $response = [
                    'status' => 2,
                    'gradesettings_gradeletter' => $gradesettings_gradeletter,
                    'gradesettings_category' => $gradesettings_category,
                    'gradesettings_rangeone' => $gradesettings_rangeone,
                    'gradesettings_rangetwo' => $gradesettings_rangetwo,
                    'gradesettings_remark' => $gradesettings_remark,
                    'message' => 'Grade successfully Updated'
                ];
            } else {
                // Insert new grade
                $GradesettingsModel->insert($data);
                $response = [
                    'status' => 1,
                    'gradesettings_gradeletter' => $gradesettings_gradeletter,
                    'gradesettings_rangeone' => $gradesettings_rangeone,
                    'gradesettings_rangetwo' => $gradesettings_rangetwo,
                    'message' => 'Grade Successfully Added'
                ];
            }
        }

        return $response;
    }

    public function refineInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function getgradelettermodel()
    {
        $gradeletter = $_GET['gradeletter'];
        $classcategory = $_GET['classcategory'];
        $query =  $this->db->query("SELECT * FROM fipims_gradesettings WHERE gradesettings_category ='$classcategory' && gradesettings_gradeletter = '$gradeletter' ORDER BY gradesettings_gradeletter ASC");
        if($query->getNumRows() > 0){
            $result = $query->getResult();
        }else{
            $result = 0;
        }
        return $result;
    }

    public function fetchclasscategorymode()
    {
        $query =  $this->db->query("SELECT * FROM fipims_classcategory ORDER BY description ASC");
        return $query->getResult();
    }

    //Fetching all Grade Settings records
    public function getGradeDataTable()
    {
        $category = $_GET['cat']; // Get the category from the request

        // Return an empty JSON response if category is not set or invalid
        if (!$category && $category === '--') { // Check if category is set and valid
            return json_encode(['aaData' => []]);
        }

        // Proceed with fetching data only if category is valid
        $builder = $this->db->table('fipims_gradesettings');
        $builder->select('*');
        $builder->where('gradesettings_category', $category);
        $query = $builder->get();

        # Creating a json data from the result returned   organisationName 	positionHeld 	dateFrom1 	dateTo1	brief
        # ---------------------------------------------
        $sn = 0;
        $sOutput = '{';
        $sOutput .= '"aaData": [ ';
        foreach ($query->getResult() as $row) {
            $sn++;
            $myref1 = $row->gradesettings_id;
            $myref2 = $row->gradesettings_gradeletter;
            $myref3 = $row->gradesettings_category;
            $myref4 = $row->gradesettings_rangeone;
            $myref5 = $row->gradesettings_rangetwo;
            $myref6 = $row->gradesettings_remark;

            $myref = $myref1 . "|" . $myref2 . "|" . $myref3 . "|" . $myref4 . "|" . $myref5 . "|" . $myref6;


            $button1    =   "<button class='btn btn-success' id='" . $myref . "'onclick='showUsTheIDG(this.id)'>Edit</button>";
            $button2    =   "<button class='btn btn-danger' id='" . $row->gradesettings_gradeletter .   " | "   . $row->gradesettings_category . "'onclick='deleteG(this.id)'>Delete</button>";
            $buttons    =   "<center>" . $button1 . " " . $button2 . "</center>";
            $sOutput .= "[";
            $sOutput .= '"' . $sn . '",';
            $sOutput .= '"' . $row->gradesettings_gradeletter . '",';
            $sOutput .= '"' . $row->gradesettings_category . '",';
            $sOutput .= '"' . $row->gradesettings_remark . '",';
            $sOutput .= '"' . $buttons . '",';
            $sOutput = substr_replace($sOutput, "", -1);
            $sOutput .= "],";
        }
        $sOutput = substr_replace($sOutput, "", -1);
        $sOutput .= '] }';
        return $sOutput;
    }

    //DELETING GRADE fROM TABLE
    public function deletegrademode()
    {
        $request = \Config\Services::request();
        $classcategory = $request->getPost('classcategory');
        $grade_letter = $request->getPost('grade_letter');
        // Ensure $addsession is provided
        if ($classcategory && $grade_letter) {
            // Use Query Builder to delete the record where both conditions match
            $builder = $this->db->table('fipims_gradesettings');
            $builder->where('gradesettings_category', $classcategory)
                ->where('gradesettings_gradeletter', $grade_letter);
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
                'message' => 'Grade not provided'
            ];
        }

        return json_encode($response);
    }
}
