<?php
class Region
{
    private $_id = null;
    private $_name = null;

    // 1 seul constructeur en php
    public function __construct($id, $name)
    {
        $this->setId($id);
        $this->setName($name);
    }

    // Mutateur chargé de modifier l'attribut $_id.
    public function setId($id)
    {
        if (is_null($id)) {
            return;
        }
        if (!is_numeric($id)) // S'il ne s'agit pas d'un integer
        {
            return false;
        }
        $this->_id = (int)$id;
        return true;
    }

    public function Id()
    {
        return $this->_id;
    }

    // Mutateur chargé de modifier l'attribut $_name.
    public function setName($name)
    {
        if (is_null($name)) {
            return;
        }
        if (!is_string($name) || trim($name)=="") // S'il ne s'agit pas d'une string
        {
            return false;
        }
        $this->_name = trim($name);
        return true;
    }

    public function Name()
    {
        return $this->_name;
    }
}