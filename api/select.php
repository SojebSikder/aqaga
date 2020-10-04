<?php
require "../config/conn.php";
require "../src/lib/Database.php";
require "../src/helpers/Format.php";

$db = new Database();

$output = array();
$query = $db->select("SELECT * FROM users ORDER BY id DESC");

if($query){
    while($row = $query->fetch_assoc()){
        $output[] = $row;
    }
    echo json_encode($output);
}
?>