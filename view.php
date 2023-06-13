<?php
include 'conn.php';
$data = array();
$sql = "SELECT *  FROM `discussion` ORDER BY id desc";
$result = $db->query($sql);
while($row = $result->fetch()){
        array_push($data, $row);
        array_push($data);
}

echo json_encode($data);
$db = null;
exit();



