<?php

namespace App\Models;

use CodeIgniter\Model;

class GradeModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'grade';
    protected $primaryKey       = 'grade_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['grade_name','grade_description'];

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

    function addgrademode()
    {
        $GradeModel = new GradeModel();

        $grade_name = $this->refineInput($_POST['grade_name'] ?? '');
        $grade_description = $this->refineInput($_POST['grade_description'] ?? '');

        //prepare data for insertion
        $data = [
            'grade_name' => $grade_name,
            'grade_description' => $grade_description,
        ];

        // Check if the grade_name or grade_description already exists
        $builder = $this->db->table('grade')
            ->select('*')
            ->groupStart()  // Start condition group
            ->where('grade_name', $grade_name)
            ->orWhere('grade_description', $grade_description)
            ->groupEnd();   // End condition group
        $query = $builder->get();
        $row = $query->getRow();

        if ($row) {
             // grade_name or grade_description already exists
            $response = [
                'status' => 2,
                'grade_name' => $grade_name,
                'grade_description' => $grade_description,
                'message' => 'Grade already exists'
            ];
        } else {
            // Insert new grade
            $GradeModel->insert($data);
            $response = [
                'status' => 1,
                'grade_name' => $grade_name,
                'grade_description' => $grade_description,
                'message' => 'Grade successfully added'
            ];
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
}
