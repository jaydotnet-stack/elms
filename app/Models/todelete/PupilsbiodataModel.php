<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Files\File;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class PupilsbiodataModel extends Model
{
    protected $db;
    var $csrf; 
    public function __construct() {
        $this->csrf = csrf_hash();
        $this->db = db_connect(); 
		$this->request = $request = \Config\Services::request();
	}     

    protected $DBGroup          = 'default';
    protected $table            = 'fipims_pupilsbiodata';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
                'regno',
                'surname',
                'othernames',
                'nin',
                'age',
                'birthdate',
                'hometown',
                'state',
                'lga',
                'nationality',
                'gender',
                'height',
                'weight',
                'entrysession',
                'currentsession',
                'entryclasslevel',
                'currentclasslevel',
                'fathersname',
                'fathersoccupation',
                'fathersreligion',
                'fathersphonenumber',
                'fathersaddress',
                'mothersname',
                'mothersoccupation',
                'mothersreligion',
                'mothersaddress',
                'mothersphonenumber',
                'guardiansname',
                'guardiansoccupation',
                'guardiansreligion',
                'guardiansaddress',
                'guardiansphonenumber',
                'guardianstypeoffamily',
                'guardianssizeoffamily',
                'guardiansposition',
                'numberofbrothers',
                'numberofsisters',
                'generalvitality',
                'vision',
                'hearing',
                'speach',
                'disability',
                'picture_update_tag',
                'created_by'  
    ];

// public function processpupils_biodata() 
// {
//     // Load the student biodata model
//     $pupilsbiodata_model = new PupilsbiodataModel();

//     // Get and sanitize inputs
//     $id                 = (int) $this->request->getPost('id');
//     $regno              = strtoupper(trim($this->request->getPost('regno')));
//     $surname            = strtoupper(trim($this->request->getPost('surname')));
//     $othernames         = strtoupper(trim($this->request->getPost('othernames')));
//     $nin                = trim($this->request->getPost('nin'));
//     $classcategory      = strtoupper(trim($this->request->getPost('classcategory')));
//     $age                = (int) $this->request->getPost('age'); // Ensure it's an integer
//     $dob                = trim($this->request->getPost('dob'));
//     $hometown           = strtoupper(trim($this->request->getPost('hometown')));
//     $states             = strtoupper(trim($this->request->getPost('states')));
//     $lga                = strtoupper(trim($this->request->getPost('lga')));
//     $nationality        = strtoupper(trim($this->request->getPost('nationality')));
//     $gender             = strtoupper(trim($this->request->getPost('gender')));
//     $fathersname        = strtoupper(trim($this->request->getPost('fathersname')));
//     $foccupation        = trim($this->request->getPost('foccupation'));
//     $freligion          = strtoupper(trim($this->request->getPost('freligion')));
//     $phoneno            = trim($this->request->getPost('phoneno'));
//     $faddress           = trim($this->request->getPost('faddress'));
//     $mothersname        = strtoupper(trim($this->request->getPost('mothersname')));
//     $moccupation        = trim($this->request->getPost('moccupation'));
//     $mreligion          = strtoupper(trim($this->request->getPost('mreligion')));
//     $maddress           = trim($this->request->getPost('maddress'));
//     $mphoneno           = trim($this->request->getPost('mphoneno'));
//     $generalvitality    = strtoupper(trim($this->request->getPost('generalvitality')));
//     $vision             = strtoupper(trim($this->request->getPost('vision')));
//     $hearing            = strtoupper(trim($this->request->getPost('hearing')));
//     $speech             = strtoupper(trim($this->request->getPost('speech'))); // Fixed spelling mistake
//     $disability         = strtoupper(trim($this->request->getPost('disability')));
//     $file               = $this->request->getFile('userfile');

//     // Check if a file is uploaded
//     $fileUploaded = $file && $file->isValid() && !$file->hasMoved();
//     $sanitizedRegno = str_replace('/', '', $regno); // Remove slashes for file naming

//     // Handle file upload
//     $uploadDirectory = 'img/images/';
//     $newImageName = $sanitizedRegno . ".jpg";

//     if ($fileUploaded) {
//         $oldImagePath = $uploadDirectory . $newImageName;
//         if (file_exists($oldImagePath)) {
//             unlink($oldImagePath);
//         }
//         $file->move($uploadDirectory, $newImageName);
//     }

//     // Prepare data for insertion/update
//     $data = [
//         'regno'             => $regno,
//         'surname'           => $surname,
//         'othernames'        => $othernames,
//         'nin'               => $nin,
//         'classcategory'     => $classcategory,
//         'age'               => $age,
//         'birthdate'         => $dob,
//         'hometown'          => $hometown,
//         'state'             => $states,
//         'lga'               => $lga,
//         'nationality'       => $nationality,
//         'gender'            => $gender,
//         'fathersname'       => $fathersname,
//         'fathersoccupation' => $foccupation,
//         'fathersreligion'   => $freligion,
//         'fathersphonenumber'=> $phoneno,
//         'fathersaddress'    => $faddress,
//         'mothersname'       => $mothersname,
//         'mothersoccupation' => $moccupation,
//         'mothersreligion'   => $mreligion,
//         'mothersaddress'    => $maddress,
//         'mothersphonenumber'=> $mphoneno,
//         'generalvitality'   => $generalvitality,
//         'vision'            => $vision,
//         'hearing'           => $hearing,
//         'speech'            => $speech,
//         'disability'        => $disability,
//         'picture_update_tag'=> $fileUploaded ? 'T' : 'F',
//         'created_by'        => 'Anonymous'
//     ];

//     if ($id > 0) {
//         // Update existing record if ID is provided
//         $existingData = $pupilsbiodata_model->find($id);

//         if (!$existingData) {
//             return $this->response->setJSON([
//                 'status' => 0,
//                 'message' => 'Student record not found.'
//             ]);
//         }

//         if ($existingData == $data) {
//             return $this->response->setJSON([
//                 'status' => 0,
//                 'message' => 'No changes detected. Please modify the data before submitting.'
//             ]);
//         }

//         if ($pupilsbiodata_model->update($id, $data)) {
//             return $this->response->setJSON([
//                 'status' => 1,
//                 'message' => 'Student biodata updated successfully.'
//             ]);
//         } else {
//             return $this->response->setJSON([
//                 'status' => 0,
//                 'message' => 'Error updating student biodata.'
//             ]);
//         }
//     } else {
//         // Check if regno already exists
//         if ($pupilsbiodata_model->where('regno', $regno)->countAllResults() > 0) {
//             return $this->response->setJSON([
//                 'status' => 0,
//                 'message' => 'A record with the same registration number already exists.'
//             ]);
//         }

//         // Insert new record
//         if ($pupilsbiodata_model->insert($data)) {
//             return $this->response->setJSON([
//                 'status' => 1,
//                 'message' => 'Student biodata created successfully.'
//             ]);
//         } else {
//             return $this->response->setJSON([
//                 'status' => 0,
//                 'message' => 'Error adding student biodata.'
//             ]);
//         }
//     }
// }



 

    public function processpupils_biodata() 
    {
         // Prepare the student biodata model
        $pupilsbiodata_model = new PupilsbiodataModel;
    
        $regno              =   strtoupper($this->request->getPost('regno'));
        $surname            =   strtoupper($this->request->getPost('surname'));
        $othernames         =   strtoupper($this->request->getPost('othernames'));
        $nin                =   $this->request->getPost('nin');
        $age                =   strtoupper($this->request->getPost('age'));
        $hometown           =   strtoupper($this->request->getPost('hometown'));
        $states             =   strtoupper($this->request->getPost('states'));
        $dob                =   $this->request->getPost('dob');
        $lga                =   strtoupper($this->request->getPost('lga'));
        $nationality        =   strtoupper($this->request->getPost('nationality'));
        $gender             =   strtoupper($this->request->getPost('gender'));
        $height             =   $this->request->getPost('height');
        $weight             =   $this->request->getPost('weight');
        $entrysession       =   strtoupper($this->request->getPost('entrysession'));
        $currentsession     =   strtoupper($this->request->getPost('currentsession'));
        $entryclasslevel    =   strtoupper($this->request->getPost('entryclasslevel'));
        $currentclasslevel  =   strtoupper($this->request->getPost('currentclasslevel'));
        $fathersname        =   strtoupper($this->request->getPost('fathersname'));
        $foccupation        =   $this->request->getPost('foccupation');
        $freligion          =   strtoupper($this->request->getPost('freligion'));
        $phoneno            =   $this->request->getPost('phoneno');
        $faddress           =   $this->request->getPost('faddress');
        $mothersname        =   strtoupper($this->request->getPost('mothersname'));
        $moccupation        =   $this->request->getPost('moccupation');
        $mreligion          =   strtoupper($this->request->getPost('mreligion'));
        $maddress           =   $this->request->getPost('maddress');
        $mphoneno           =   $this->request->getPost('mphoneno');
        $guardiansname      =   strtoupper($this->request->getPost('guardiansname'));
        $goccupation        =   $this->request->getPost('goccupation');
        $greligion          =   strtoupper($this->request->getPost('greligion'));
        $gaddress           =   $this->request->getPost('gaddress');
        $gphoneno           =   $this->request->getPost('gphoneno');
        $typeoffamily       =   $this->request->getPost('typeoffamily');
        $sizeoffamily       =   $this->request->getPost('sizeoffamily');
        $position           =   $this->request->getPost('position');
        $noofbrothers       =   $this->request->getPost('noofbrothers');
        $noofsisters        =   $this->request->getPost('noofsisters');
        $generalvitality    =   strtoupper($this->request->getPost('generalvitality'));
        $vision             =   strtoupper($this->request->getPost('vision'));
        $hearing            =   strtoupper($this->request->getPost('hearing'));
        $speach             =   strtoupper($this->request->getPost('speach'));
        $disability         =   strtoupper($this->request->getPost('disability'));
        $CountArray         =   count(explode(".",$_FILES["userfile"]["name"]));
        $file               =   $this->request->getFile('userfile');
        
        // Check the count of file names if the file is uploaded
        $CountArray     = $file->isValid() ? count(explode(".", $file->getName())) : 0;

        // Sanitize the registration number for file naming
        $sanitizedRegno = str_replace('/', '', $regno); // Replace '/' with '_'
        
        // Prepare the file data if file is uploaded
        if ($CountArray >= 2) {
            $randomName          = $file->getRandomName();
            $data['fileName']    = $file->getName();
            $data['randomName']  = $randomName;
            $data['fileType']    = $file->getClientMimeType();
            $data['fileSize']    = $file->getSize();
            
            if ($file->isValid() && !$file->hasMoved()) {
                // Define the upload directory and the new image name
                $uploadDirectory = 'img/images/';
                $newImageName = $sanitizedRegno . ".jpg";

                // Check if an old image exists and delete it
                $oldImagePath = $uploadDirectory . $newImageName;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }

                // Move the new file to the desired folder with the updated name
                $file->move($uploadDirectory, $newImageName, true);
            }

            $regno = $this->refineInput($regno);
            $query = $this->db->query("SELECT * FROM fipims_pupilsbiodata WHERE regno = '$regno'");
            $num_rows = $query->getNumRows();

            // Check if student biodata exists
            if ($num_rows == 0) {
                // Prepare the data (with or without file)
                $data = [
                    'regno'                        =>   $regno,
                    'surname'                      =>   $surname,
                    'othernames'                   =>   $othernames,
                    'nin'                          =>   $nin,
                    'age'                          =>   $age,
                    'birthdate'                    =>   $dob,
                    'hometown'                     =>   $hometown,
                    'state'                        =>   $states,
                    'lga'                          =>   $lga,
                    'nationality'                  =>   $nationality,
                    'gender'                       =>   $gender,
                    'height'                       =>   $height,
                    'weight'                       =>   $weight,
                    'entrysession'                 =>   $entrysession,
                    'currentsession'               =>   $currentsession,
                    'entryclasslevel'              =>   $entryclasslevel,
                    'currentclasslevel'            =>   $currentclasslevel,
                    'fathersname'                  =>   $fathersname,
                    'fathersoccupation'            =>   $foccupation,
                    'fathersreligion'              =>   $freligion,
                    'fathersphonenumber'           =>   $phoneno,
                    'fathersaddress'               =>   $faddress,
                    'mothersname'                  =>   $mothersname,
                    'mothersoccupation'            =>   $moccupation,
                    'mothersreligion'              =>   $mreligion,
                    'mothersaddress'               =>   $maddress,
                    'mothersphonenumber'           =>   $mphoneno,
                    'guardiansname'                =>   $guardiansname,
                    'guardiansoccupation'          =>   $goccupation,
                    'guardiansreligion'            =>   $greligion,
                    'guardiansaddress'             =>   $gaddress,
                    'guardiansphonenumber'         =>   $gphoneno,
                    'guardianstypeoffamily'        =>   $typeoffamily,
                    'guardianssizeoffamily'        =>   $sizeoffamily,
                    'guardiansposition'            =>   $position,
                    'numberofbrothers'             =>   $noofbrothers,
                    'numberofsisters'              =>   $noofsisters,
                    'generalvitality'              =>   $generalvitality,
                    'vision'                       =>   $vision,
                    'hearing'                      =>   $hearing,
                    'speach'                       =>   $speach,
                    'disability'                   =>   $disability,
                    // 'picture_update_tag'           =>  'T',
                    'picture_update_tag' => isset($file) && $file->isValid() ? 'T' : 'F',
                    'created_by'                   =>   'Anonymous'
                ];

                // Insert the biodata into the database
                if ($pupilsbiodata_model->insert($data)) {
                    return [
                        'status' => 1,
                        'message' => $surname ." ". 'Student biodata created successfully',
                        'newtoken' => $this->csrf
                    ];
                } else {
                    return [
                        'status' => 0,
                        'message' => 'Error adding student biodata',
                        'newtoken' => $this->csrf
                    ];
                }
            } else {
                // Update the data (with or without file)
                $data = [
                    'regno'                        =>   $regno,
                    'surname'                      =>   $surname,
                    'othernames'                   =>   $othernames,
                    'nin'                          =>   $nin,
                    'age'                          =>   $age,
                    'birthdate'                    =>   $dob,
                    'hometown'                     =>   $hometown,
                    'state'                        =>   $states,
                    'lga'                          =>   $lga,
                    'nationality'                  =>   $nationality,
                    'gender'                       =>   $gender,
                    'height'                       =>   $height,
                    'weight'                       =>   $weight,
                    'entrysession'                 =>   $entrysession,
                    'currentsession'               =>   $currentsession,
                    'entryclasslevel'              =>   $entryclasslevel,
                    'currentclasslevel'            =>   $currentclasslevel,
                    'fathersname'                  =>   $fathersname,
                    'fathersoccupation'            =>   $foccupation,
                    'fathersreligion'              =>   $freligion,
                    'fathersphonenumber'           =>   $phoneno,
                    'fathersaddress'               =>   $faddress,
                    'mothersname'                  =>   $mothersname,
                    'mothersoccupation'            =>   $moccupation,
                    'mothersreligion'              =>   $mreligion,
                    'mothersaddress'               =>   $maddress,
                    'mothersphonenumber'           =>   $mphoneno,
                    'guardiansname'                =>   $guardiansname,
                    'guardiansoccupation'          =>   $goccupation,
                    'guardiansreligion'            =>   $greligion,
                    'guardiansaddress'             =>   $gaddress,
                    'guardiansphonenumber'         =>   $gphoneno,
                    'guardianstypeoffamily'        =>   $typeoffamily,
                    'guardianssizeoffamily'        =>   $sizeoffamily,
                    'guardiansposition'            =>   $position,
                    'numberofbrothers'             =>   $noofbrothers,
                    'numberofsisters'              =>   $noofsisters,
                    'generalvitality'              =>   $generalvitality,
                    'vision'                       =>   $vision,
                    'hearing'                      =>   $hearing,
                    'speach'                       =>   $speach,
                    'disability'                   =>   $disability,
                    // 'picture_update_tag'           =>  'T',
                    'picture_update_tag' => isset($file) && $file->isValid() ? 'T' : 'F',
                    'created_by'                   =>   'Anonymous'
                ];

                if ($this->db->table('fipims_pupilsbiodata')->where('regno', $regno)->update($data)) {
                    return [
                        'status'    => 1,
                        'message'   => 'Student biodata updated successfully',
                        'newtoken'  => $this->csrf
                    ];
                } else {
                    return [
                        'status'   => 0,
                        'message'  => 'Error updating student biodata',
                        'newtoken' => $this->csrf
                    ];
                }
            }

        }else{
            // Prepare the student biodata model
            $pupilsbiodata_model;
            $regno = $this->refineInput($regno);
            $query = $this->db->query("SELECT * FROM fipims_pupilsbiodata WHERE regno = '$regno'");
            $num_rows = $query->getNumRows();

            // Check if student biodata exists
            if ($num_rows == 0) {
                // Prepare the data (with or without file)
               // Prepare the data (with or without file)
                $data = [
                    'regno'                        =>   $regno,
                    'surname'                      =>   $surname,
                    'othernames'                   =>   $othernames,
                    'nin'                          =>   $nin,
                    'age'                          =>   $age,
                    'birthdate'                    =>   $dob,
                    'hometown'                     =>   $hometown,
                    'state'                        =>   $states,
                    'lga'                          =>   $lga,
                    'nationality'                  =>   $nationality,
                    'gender'                       =>   $gender,
                    'height'                       =>   $height,
                    'weight'                       =>   $weight,
                    'entrysession'                 =>   $entrysession,
                    'currentsession'               =>   $currentsession,
                    'entryclasslevel'              =>   $entryclasslevel,
                    'currentclasslevel'            =>   $currentclasslevel,
                    'fathersname'                  =>   $fathersname,
                    'fathersoccupation'            =>   $foccupation,
                    'fathersreligion'              =>   $freligion,
                    'fathersphonenumber'           =>   $phoneno,
                    'fathersaddress'               =>   $faddress,
                    'mothersname'                  =>   $mothersname,
                    'mothersoccupation'            =>   $moccupation,
                    'mothersreligion'              =>   $mreligion,
                    'mothersaddress'               =>   $maddress,
                    'mothersphonenumber'           =>   $mphoneno,
                    'guardiansname'                =>   $guardiansname,
                    'guardiansoccupation'          =>   $goccupation,
                    'guardiansreligion'            =>   $greligion,
                    'guardiansaddress'             =>   $gaddress,
                    'guardiansphonenumber'         =>   $gphoneno,
                    'guardianstypeoffamily'        =>   $typeoffamily,
                    'guardianssizeoffamily'        =>   $sizeoffamily,
                    'guardiansposition'            =>   $position,
                    'numberofbrothers'             =>   $noofbrothers,
                    'numberofsisters'              =>   $noofsisters,
                    'generalvitality'              =>   $generalvitality,
                    'vision'                       =>   $vision,
                    'hearing'                      =>   $hearing,
                    'speach'                       =>   $speach,
                    'disability'                   =>   $disability,
                    // 'picture_update_tag' => isset($file) && $file->isValid() ? 'T' : 'F',
                    'created_by'                   =>   'Anonymous'
                ];
                // Insert the biodata into the database without an image
                if ($pupilsbiodata_model->insert($data)) {
                    return [
                        'status' => 1,
                        'message' => 'Student biodata created successfully',
                        'newtoken' => $this->csrf
                    ];
                } else {
                    return [
                        'status' => 0,
                        'message' => 'Error adding student biodata',
                        'newtoken' => $this->csrf
                    ];
                }
            } else {
                // Prepare the data for Update (with or without image)
                $data = [
                    'regno'                        =>   $regno,
                    'surname'                      =>   $surname,
                    'othernames'                   =>   $othernames,
                    'nin'                          =>   $nin,
                    'age'                          =>   $age,
                    'birthdate'                    =>   $dob,
                    'hometown'                     =>   $hometown,
                    'state'                        =>   $states,
                    'lga'                          =>   $lga,
                    'nationality'                  =>   $nationality,
                    'gender'                       =>   $gender,
                    'height'                       =>   $height,
                    'weight'                       =>   $weight,
                    'entrysession'                 =>   $entrysession,
                    'currentsession'               =>   $currentsession,
                    'entryclasslevel'              =>   $entryclasslevel,
                    'currentclasslevel'            =>   $currentclasslevel,
                    'fathersname'                  =>   $fathersname,
                    'fathersoccupation'            =>   $foccupation,
                    'fathersreligion'              =>   $freligion,
                    'fathersphonenumber'           =>   $phoneno,
                    'fathersaddress'               =>   $faddress,
                    'mothersname'                  =>   $mothersname,
                    'mothersoccupation'            =>   $moccupation,
                    'mothersreligion'              =>   $mreligion,
                    'mothersaddress'               =>   $maddress,
                    'mothersphonenumber'           =>   $mphoneno,
                    'guardiansname'                =>   $guardiansname,
                    'guardiansoccupation'          =>   $goccupation,
                    'guardiansreligion'            =>   $greligion,
                    'guardiansaddress'             =>   $gaddress,
                    'guardiansphonenumber'         =>   $gphoneno,
                    'guardianstypeoffamily'        =>   $typeoffamily,
                    'guardianssizeoffamily'        =>   $sizeoffamily,
                    'guardiansposition'            =>   $position,
                    'numberofbrothers'             =>   $noofbrothers,
                    'numberofsisters'              =>   $noofsisters,
                    'generalvitality'              =>   $generalvitality,
                    'vision'                       =>   $vision,
                    'hearing'                      =>   $hearing,
                    'speach'                       =>   $speach,
                    'disability'                   =>   $disability,
                    // 'picture_update_tag' => isset($file) && $file->isValid() ? 'T' : 'F',
                    'created_by'                   =>   'Anonymous'
                ];

                if ($this->db->table('fipims_pupilsbiodata')->where('regno', $regno)->update($data)) {
                    return [
                        'status'    => 1,
                        'message'   => 'Student biodata updated successfully',
                        'newtoken'  => $this->csrf
                    ];
                } else {
                    return [
                        'status'   => 0,
                        'message'  => 'Error updating student biodata',
                        'newtoken' => $this->csrf
                    ];
                }
            }        
        }

    } 

    public function pupilsbiodata_table(){
       $builder = $this->db->table('fipims_pupilsbiodata');
       $builder->select('*');
       $builder->orderBy('regno', 'ASC'); // Order by 'regno' in ascending order
       $query = $builder->get();

        # Creating a json data from the result returned   organisationName 	positionHeld 	dateFrom1 	dateTo1 	brief
        # ---------------------------------------------
        $sn = 0;
        $sOutput = '{';
        $sOutput .= '"aaData": [ ';
        foreach ($query->getResult() as $row) {
            $sn++;
                $button1    =   "<button type='button' class='btn btn-success' id='" . $row->regno . "' onclick='loadpupilsdetail(this.id)'>View</button>";

                $button2    =   "<button type='button' class='btn btn-primary' id='" . $row->regno . "' onclick='loadpupilsbiodata(this.id)'>Edit</button>";

                $button3    =   "<button type='button' class='btn btn-danger' id='" . $row->regno . "' onclick='deletepupilbiodata(this.id)'>Delete</button>";

                $buttons    =   "<center>".$button1. ' ' . $button2. ' ' . $button3."</center>";

                $sOutput .= "[";
                $sOutput .= '"'. $sn . '",';               
                $sOutput .= '"'. $row->regno . '",';
                $sOutput .= '"'. $row->surname . '",'; 
                $sOutput .= '"'. $row->othernames . '",';               
                $sOutput .= '"'.$buttons.'",';
                $sOutput = substr_replace( $sOutput, "", -1 );
                $sOutput .= "],";            
            }
            $sOutput = substr_replace( $sOutput, "", -1 );
            $sOutput .= '] }';	
        return $sOutput;        
    }

    
    public function getpupils_biodata(){
        $regno = $_POST['regno'];
        $query = $this->db->query("SELECT * FROM fipims_pupilsbiodata WHERE regno = '$regno'");
        $num_rows =  $query->getNumRows();        
        if ($num_rows = 1){
            return json_encode($query->getResult());
        }else{
            return null;
        } 	
    }

    # Load Pupils Bio data Details
	# ----------------------------
    public function pupilsbiodata_details()
    {
        $regno = $this->request->getPost('regno');
        $csrf = $this->request->getPost('csrf_test_name');

        // Query the database
        $builder = $this->db->table('fipims_pupilsbiodata');
        $builder->select('*');
        $builder->where('regno', $regno);
        $query = $builder->get();
        $num_rows = $query->getNumRows();

        if ($num_rows = 1) {
            // Dynamically generate the image path
            $imageFolder = FCPATH . 'img/images/';
            $defaultImage = base_url('img/passport_holder/Placeholder-passport2.png'); // Default image
            $extensions = ['jpg', 'jpeg', 'png', 'gif']; // Possible file extensions
            $imagePath = $defaultImage;

            foreach ($extensions as $ext) {
                $filePath = $imageFolder . $regno . '.' . $ext;
                if (file_exists($filePath)) {
                    $imagePath = base_url('img/images/' . $regno . '.' . $ext);
                    break;
                }
            }
            $row = $query->getRow();
            return json_encode([
                'id'                    =>  $row->id,
                'regno'                 =>  $row->regno,
                'surname'               =>  $row->surname,
                'othernames'            =>  $row->othernames,
                'nin'                   =>  $row->nin,
                'age'                   =>  $row->age,
                'birthdate'             =>  $row->birthdate,
                'hometown'              =>  $row->hometown,
                'state'                 =>  $row->state,
                'lga'                   =>  $row->lga,
                'nationality'           =>  $row->nationality,
                'gender'                =>  $row->gender,
                'height'                =>  $row->height,
                'weight'                =>  $row->weight,
                'entrysession'          =>  $row->entrysession,
                'currentsession'        =>  $row->currentsession,
                'entryclasslevel'       =>  $row->entryclasslevel,
                'currentclasslevel'     =>  $row->currentclasslevel,
                'fathersname'           =>  $row->fathersname,
                'fathersoccupation'     =>  $row->fathersoccupation,
                'fathersreligion'       =>  $row->fathersreligion,
                'fathersphonenumber'    =>  $row->fathersphonenumber,
                'fathersaddress'        =>  $row->fathersaddress,
                'mothersname'           =>  $row->mothersname,
                'mothersoccupation'     =>  $row->mothersoccupation,
                'mothersreligion'       =>  $row->mothersreligion,
                'mothersphonenumber'    =>  $row->mothersphonenumber,
                'mothersaddress'        =>  $row->mothersaddress,
                'guardiansname'         =>  $row->guardiansname,
                'guardiansoccupation'   =>  $row->guardiansoccupation,
                'guardiansreligion'     =>  $row->guardiansreligion,
                'guardiansphonenumber'  =>  $row->guardiansphonenumber,
                'guardiansaddress'      =>  $row->guardiansaddress,
                'guardianstypeoffamily' =>  $row->guardianstypeoffamily,
                'guardianssizeoffamily' =>  $row->guardianssizeoffamily,
                'guardiansposition'     =>  $row->guardiansposition,
                'numberofbrothers'      =>  $row->numberofbrothers,
                'numberofsisters'       =>  $row->numberofsisters,
                'generalvitality'       =>  $row->generalvitality,
                'vision'                =>  $row->vision,
                'hearing'               =>  $row->hearing,
                'speach'                =>  $row->speach,
                'disability'            =>  $row->disability,
                $imagePath 
            ]);
        } else {
            return 0;
        }
    }

    public function deletepupils_biodata($regno)
    {
        // Securely delete the record
        $this->where('regno', $regno);
        $success = $this->delete();
        if ($success) {
            return json_encode([
                'status' => 1,
                // 'message' => 'Record successfully deleted.'
                'message' => '[' . $regno . ']' . " ".'record successfully deleted.'
            ]);
        } else {
            return 0;
        }
    }

    public function noofpupilsmodel(){
        $query = $this->db->query("SELECT * FROM fipims_pupilsbiodata");
        return $query->getNumRows();
    }    

    
    //refine post 
    public function refineInput($data) {	
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }     
}
