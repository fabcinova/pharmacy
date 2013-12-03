<?php

/**
 * Description of Dodavatel
 *
 * @author dominika
 */
class Dodavatel extends Model{
    
    protected $id;
    protected $nazev;
    protected $adresa;

    public function __construct($id)
    {
        $this->load("dodavatele", $id);
    }
    
    
    public static function create($nazev, $adresa)
    {
        $query = "INSERT INTO `dodavatele` (`nazev`, `adresa`) 
            VALUES (%s, %i);";
        dibi::query($query, $nazev, $adresa);
        
        return dibi::getInsertId();
    }
    
    public static function delete($id)
    {
        $query = "DELETE FROM `dodavatele` WHERE `ID` = %i;";
        dibi::query($query, $id);
    }
}
