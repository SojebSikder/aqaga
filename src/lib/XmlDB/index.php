<?php 
//namespace DB;
//use DB;
include "XmlAdapter.php";
include "Dbase.php";

    $mysql = new XmlAdapter();
    $db = new Dbase($mysql);

    $query = "data";
    $data = $db->select($query);

    $createXml = $db->insert("INSERT INTO testing AddChild product");
?>

<?php echo $data->product->name; ?>
<hr>


