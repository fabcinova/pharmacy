<?php

/**
 * Description of Pobocka
 *
 * @author dominika
 */
class Pobocka extends Model{
    
    protected $id;
    protected $adresa;

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
    
    public static function delete($id)
    {
        $query = "DELETE FROM `pobocky` WHERE `ID` = %i;";
        dibi::query($query, $id);
    }
}
