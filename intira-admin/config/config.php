<?php

    class Config{
    public $conn;

    public function getConnection($debe,$host) {
      $this->conn = null;

      try {
        $this->conn = new MongoDB\Driver\Manager ("mongodb://".$host.":27017/".$debe);
        }
        catch(Exception $e) {
            echo "Connection error".$this->error;
        }
            return $this->conn;
    }
}


 ?>
