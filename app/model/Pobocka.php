<?php

/**
 * Description of Pobocka
 *
 * @author dominika
 */
class Pobocka extends Model{
    
    public $id;
    public $adresa;

    public function __construct($id)
    {
        $this->load("pobocky", $id);
    }

    public static function create($adresa)
    {
        $query = "INSERT INTO `pobocky` (`adresa`) 
            VALUES (%i);";
        dibi::query($query, $adresa);
        
        return dibi::getInsertId();
    }
    
    public static function loadAll()
    {
        $query = "SELECT id FROM pobocky";
        
        foreach (dibi::query($query) as $row)
        {
           $array[] = new self($row->id);
        }
        return $array;
    }
    
    public static function loadAllAdresses()
    {
        $query = "SELECT * FROM `adresy` WHERE id IN (SELECT adresa FROM `pobocky`);";

        foreach (dibi::query($query) as $row)
        {
           $array[] = new Adresa($row->id);
        }
       
        return $array;
    }
    
    public static function delete($id)
    {
        $query = "DELETE FROM `pobocky` WHERE `ID` = %i;";
        dibi::query($query, $id);
    }
}
