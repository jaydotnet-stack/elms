<?php

namespace App\Models;

use CodeIgniter\Model;

class AddAwardModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'award';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'award_name',
        'award_type',
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

    public function addAward()
    {
        $awardname = ucwords($this->refineInput($_POST['awardname']));
        $awardtype = ucwords($this->refineInput($_POST['awardtype']));
        // Check for duplicate
        $builder = $this->db->table('award')
            ->where('LOWER(award_name)', strtolower(trim($awardname)));
        // ->where('(award_name)', trim($awardname));
        $num_rows = $builder->countAllResults();
        if ($num_rows > 0) {
            $query = $this->db->query("UPDATE award SET award_type = '$awardtype' WHERE award_name = '$awardname'");
            return [
                'status' => 1,
                'message' => 'Award updated successfully',
                'newtoken' => $this->csrf
            ];
        }
        // Insert new award
        $data = [
            'award_name' => $awardname,
            'award_type' => $awardtype,
        ];
        try {
            if ($this->insert($data)) {
                return [
                    'status' => 1,
                    'message' => 'Award created successfully',
                    'newtoken' => $this->csrf
                ];
            }
        } catch (\Exception $e) {
            return [
                'status' => 0,
                'message' => 'Error adding Award: ' . $e->getMessage(),
                'newtoken' => $this->csrf
            ];
        }
    }

    //refine post 
    public function refineInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function getawarddtmodel()
    {
        $query = $this->db->query("SELECT * FROM award ORDER BY award_name ASC");
        $num_rows =  $query->getNumRows();
        if ($num_rows > 0) {
            # Creating a json data from the result returned
            # ---------------------------------------------
            $sn = 0;
            $sOutput = '{';
            $sOutput .= '"aaData": [ ';
            foreach ($query->getResult() as $row) {
                $sn++;
                $button1    =   "<button type='button' class='btn btn-success' value='" . $row->award_name . "' onclick='editAward(this.value)'>Edit</button>";
                $button2    =   "<button type='button' class='btn btn-danger' value='" . $row->award_name . "' onclick='deleteAward(this.value)'>Delete</button>";
                $buttons = "<center>" . $button1 . ' ' . $button2 . "</center>";
                $sOutput .= "[";
                $sOutput .= '"' . $sn . '",';
                $sOutput .= '"' . $row->award_name . '",';
                $sOutput .= '"' . $row->award_type . '",';
                $sOutput .= '"' . $buttons . '",';
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

    public function editawardmodel()
    {
        $awardname = $_POST['awardname'];
        $query = $this->db->query("SELECT * FROM award WHERE award_name = '$awardname'");
        $num_rows =  $query->getNumRows();
        if ($num_rows > 0) {
            return ['status' => 1, 'message' => '', 'award' => $query->getResult(), 'newtoken' => $this->csrf];
        } else {
            return ['status' => 0, 'message' => '', 'award' => 0, 'newtoken' => $this->csrf];
        }
    }

    public function deleteawardmodel()
    {
        $awardname = $_POST['awardname'];
        $query = $this->db->query("DELETE FROM award WHERE award_name = '$awardname'");
        if ($query) {
            return ['status' => 1, 'message' => 'Award deleted successfully', 'award' => 0, 'newtoken' => $this->csrf];
        } else {
            return ['status' => 0, 'message' => 'Unable to delete Award', 'award' => 0, 'newtoken' => $this->csrf];
        }
    }

    public function getawardtypemodel()
    {
        $query = $this->db->query("SELECT * FROM awardsetup ORDER BY award_name ASC");
        $num_rows =  $query->getNumRows();
        if ($num_rows > 0) {
            return ['status' => 1, 'message' => '', 'awardsetup' => $query->getResult(), 'newtoken' => $this->csrf];
        } else {
            return ['status' => 0, 'message' => '', 'awardsetup' => 0, 'newtoken' => $this->csrf];
        }
    }
}
