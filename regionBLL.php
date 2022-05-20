<?php
require_once "regionObjet.php";
require_once "regionDAO.php";

//CRUD Create-Read-Update-Delete
class RegionBLL
{
    private $_udal = null;

    private $_errors = [];

    public function __construct()
    {
        $this->_udal = new RegionDAO();
    }
    
    public function Errors()
    {
        return $this->_errors;
    }

    public function Error($key)
    {
        if(array_key_exists($key, $this->_errors)){
            return $this->_errors[$key];
        }
        return "";
    }

    public function dalErrors()
    {
        return $this->_udal->Errors();
    }

    public function listRegionbyId($id)
    {
        //TODO
        $parray = [
            "i" => $id,
        ];
        $strQuery = "select * from Regions where Id=:i";
        return $this->queryRegions($strQuery, $parray);
    }

    public function listRegions()
    {
        //TODO
        $parray = [
            "i" => $id,
            "n" => $nom
        ];
        $strQuery = "select * from Regions";
        return $this->queryRegions($strQuery, $parray);
    }

    public function Create($name)
    {
        $this->_errors = array();
        if (empty(trim($name))) {
            $this->_errors["Nom"] = "Name is required";
        }
        // if(strlen( trim($name)<3 ...){
        //     //error
        // }
        
        if (count($this->_errors) > 0) {
            return -1;
        }

       //TODO
        $this->_db->query("insert into Regions (Nom) values (:n)");
        $this->_db->bind("n", $reg->Name());
        $ret = $this->_db->execute();
        if ($ret) {    
            return $this->_db->lastInsertId();
        }

    }

    public function Update($id, $name)
    {
        $this->_errors = array();
        if (empty(trim($id))) {
            $this->_errors["Id"] = "Id is required";
        }
        if (empty(trim($name))) {
            $this->_errors["Nom"] = "Name is required";
        }

        if (count($this->_errors) > 0) {
            return -1;
        }

       //TODO
       $this->_db->query("update Regions set Nom=:Nom WHERE Id=:id");
        $this->_db->bind("Nom", $reg->Name());
        $ret = $this->_db->execute();
        if ($ret){
            return $this->_db->lastInsertId();
        }
    }

    public function DeletebyId($id)
    {
        if(is_numeric($id)){
            return $this->_udal->DeletebyId($id);
        }
    }
}