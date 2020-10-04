<?php
//namespace DB;
include "../../../config/conn.php";
include "AdapterInterface.php";
include "../FileManagement.php";

Class XmlAdapter implements AdapterInterface{
 public $host   = DB_HOST;
 public $user   = DB_USER;
 public $pass   = DB_PASS;
 public $dbname = DB_NAME;
 
 
 public $link;
 public $error;

 public $xmlStorageUrl = '../../../app/storage/xmlDB/';
 
 public function __construct(){
  //$this->connectDB();
 }
 
  private function connectDB(){
    $this->link = simplexml_load_file($this->xmlStorageUrl);
    if(!$this->link){
      $this->error ="Connection fail";
      return false;
    }
  }
  
  // Select or Read data
  public function select($query){
    $result = simplexml_load_file($this->xmlStorageUrl.$query.".xml");
    if($result){
      return $result;
    }else{
      return false;
    }
  }
  
  // Insert data
  public function insert($query){
    $text ="testing";
    //$createXml = $db->insert("INSERT INTO testing AddChild product");

    $lowercase = strtolower($query);

    $pasr = explode("into", $lowercase);
    $child = explode("addchild", $lowercase);

    $insert_row = FileManagement::saveContent($this->xmlStorageUrl.$pasr[1].".xml", $text);
    if($insert_row){
      $createDB = simplexml_load_file($this->xmlStorageUrl.$pasr[1].".xml");
      $db = $createDB->addChild($child[1]);
      FileManagement::saveContent($this->xmlStorageUrl.$pasr[1].".xml", $db->asXML());
      return $insert_row;
    }else{
      return false;
    }
  }
    
  // Update data
  public function update($query){
    $update_row = $this->link->query($query) or die($this->link->error.__LINE__);
    if($update_row){
      return $update_row;
    } else {
      return false;
      }
  }
    
  // Delete data
  public function delete($query){
    $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
    if($delete_row){
      return $delete_row;
    } else {
      return false;
      }
  }
 
}