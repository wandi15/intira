<?php
class Tbl_Nasabah {        
    private $conn;
    
    public function __construct($db) {
      $this->conn = $db;
    }
    
    public function CekNasabah($debe,$usernik) {
        $flaq = 'Tersedia';
        $filter = [
                    'user_nik' => $usernik,
                ];

        $query = new MongoDB\Driver\Query($filter);
        $res = $this->conn->executeQuery($debe.".tbl_nasabah",$query);
        
        return $res->toArray();
    }
    
}


?>
