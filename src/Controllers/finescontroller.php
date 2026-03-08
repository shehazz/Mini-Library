<?php
require_once '../Models/finesmodel.php';

$nic_input = "";
$result = null;

if (isset($_POST['search'])) {
    $nic_input = $_POST['nic'];
    $fineModel = new FineModel();
    $result = $fineModel->getFinesByNIC($nic_input);
}
?>