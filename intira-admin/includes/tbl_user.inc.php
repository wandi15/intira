<?php
class Tbl_User {        
    private $conn;
    
    public function __construct($db) {
      $this->conn = $db;
    }

    public function Login($debe) {
      $xuserid = null;
      $xpassid = null;

      $xuserid = $this->user_nik;
      $xpassid = $this->user_pass;

      $cari = $this->PeriksaLogin($debe,$xuserid,$xpassid);
      if ($cari) {
          session_start();
          $_SESSION['user_nik'] = $cari->user_nik;        
          return $cari->user_nik;
      } else {
      return false;
      }
    }

    protected function PeriksaLogin($debe,$xuserid,$xpassid) {
      
      $filter = ['user_nik' => (string) $xuserid];
      $query = new MongoDB\Driver\Query($filter);
      $res1 = $this->conn->executeQuery($debe.".tbl_user",$query);
      $data = current($res1->toArray());
      //Cari No Telpon terdaftar
      if (!empty($data)) {        
          if(password_verify($xpassid,$data->user_pass)) {
            //jika password sesuai kirim data
            return $data;
          }
          else {
            //jika password tidak sesuai
            return false;
          }
      } else {
        return false;
      }
    }
    
    public function InsertUser($debe,$usernik,$usernama,$userpass) {
        $flaq   = 'T';
        $status = 'Tersedia';
        $new_password = password_hash($userpass,PASSWORD_DEFAULT);


        $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->insert([
                          '_id' => new MongoDB\BSON\ObjectID,
                          'user_nik' => (string) $usernik,
                          'user_pass' => (string) $new_password,
                          'user_nama' => (string) $usernama,
                          'user_status' => (string) $status,
                          'user_flaq' => (string) $flaq
             ]);
     
       
         $cursor = $this->conn->executeBulkWrite($debe.".tbl_user",$bulk);
         
         return true;
  
    }
    
    public function CekUser($debe,$usernik) {
        $flaq = 'Tersedia';
        $filter = [
                    'user_nik' => $usernik,
                ];

        $query = new MongoDB\Driver\Query($filter);
        $res = $this->conn->executeQuery($debe.".tbl_user",$query);
        
        return $res->toArray();
    }
    
}


?>