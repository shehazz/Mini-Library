<?php
require_once '../../Config/DBConnection.php';

class FineModel {
    private $db;

    public function __construct() {
        $database = new DBConnection();
        $this->db = $database->getConnection();
    }

    public function getFinesByNIC($nic) {
        $nic = $this->db->real_escape_string($nic);
        $sql = "SELECT b.*, f.dailyrate 
                FROM borrowdetails b 
                CROSS JOIN fines f 
                WHERE b.nic = '$nic' AND b.paymentstatus = 'Unpaid'";
        
        return $this->db->query($sql);
    }
}
?>