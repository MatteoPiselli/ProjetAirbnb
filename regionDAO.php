<?php

class RegionDAO
{
    private $_db = null;
    private $_errors = null;

    private $_regions = null; //liste des régions

    // 1 seul constructeur en php
    public function __construct()
    {
        //require_once "php/classes/regions.php";
        //ici plus besoin avec la méthodes autologin sinon le remettre
        $this->_db = new Db();
    }

    public function isErrors()
    {
        if ($this->Errors() != null || $this->Errors() !== "") {
            return true;
        }
        return false;
    }

    public function Errors()
    {
        return $this->_errors;
    }

    private function setErrors($value)
    {
        $this->_errors = $value;
    }

    public function listRegionbyId($id)
    {
        $parray = [
            "i" => $id,
        ];
        $strQuery = "select Id, Nom from Regions where Id=:i";
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

    private function queryRegions($strQuery, $arrValue = null)
    {
        $this->setErrors(null);
        $this->_regions = []; //ou array();
        $this->_db->query($strQuery);
        if ($arrValue != null) {
            if (is_array($arrValue)) {
                foreach ($arrValue as $key => $value) {
//var_dump($key,"=>",$value);
                    $this->_db->bind($key, $value);
                }
            }
        }
        $this->_db->execute();
        $this->setErrors($this->_db->Error());

        $rows = $this->_db->resultset();
//var_dump($strQuery, $rows);
//var_dump("rows->", $rows);
        foreach ($rows as $result) {
            $region = new Region($result["Id"], $result["Nom"]);
            $this->_regions[] = $region;
        }
        return $this->_regions;
    }

    public function Create(Region $reg)
    {
        $this->setErrors(null);
        $this->_db->query("insert into Regions (Nom) values (:n)");
        $this->_db->bind("n", $reg->Name());
        $ret = $this->_db->execute();
        if ($ret) {    
            return $this->_db->lastInsertId();
        }

        $this->setErrors($this->_db->Error());
        return -1;
    }

    public function Update(Region $reg)
    {
        $this->setErrors(null);
        //TODO
        $this->_db->query("update Regions set Nom=:Nom WHERE Id=:id");
        $this->_db->bind("Nom", $reg->Name());
        $ret = $this->_db->execute();
        if ($ret){
            return $this->_db->lastInsertId();
        }

        $this->setErrors($this->_db->Error());
        return -1;
    }

    public function DeletebyId(int $id)
    {
        //TODO
       
    }

    private function Delete($query, $param)
    {
        $this->setErrors(null);
        $db->query($query);
        $db->bind("d", $param);
        $ret = $db->execute();
        $this->setErrors($db->Error());    
        return $ret;
    }
}