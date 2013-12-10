<?php

/**
 * Description of Nakup
 *
 * @author dominika
 */
class Nakup extends Model {
    
    public $id;
    public $datum;
    public $pobocka;
    public $lek;

    public function __construct($id)
    {
        $this->load("nakupy", $id);
    }
    
    public static function create($datum, $pobocka, $lek)
    {
        $query = "INSERT INTO `nakupy` (`datum`, `pobocka`, `lek`) 
            VALUES (%d, %i, %i);";
        dibi::query($query, $datum, $pobocka, $lek);
        
        if( dibi::affectedRows() != 1)
        {
            throw new Exception("Nepodarilo sa vlozit nakup.");
        }
        
        return dibi::getInsertId();
    }
    
    public function save()
    {
        $query = "UPDATE `nakupy` SET datum=%d, pobocka=%i, lek=%i WHERE id=%i;";
        dibi::query($query, $this->datum, $this->pobocka, $this->lek, $this->id);
    }
    
    public static function loadAll()
    {
        $query = "SELECT id FROM nakupy";
        
        foreach (dibi::query($query) as $row)
        {
           $array[] = new self($row->id);
        }
        return $array;
    }
    
    public function getLek()
    {
        return new Lek($this->lek);
    }
    
    public function getPobocka()
    {
        $pobocka = new Pobocka($this->pobocka);
        return new Adresa($pobocka->adresa);
    }
    
    public static function delete($id)
    {
        $query = "DELETE FROM `nakupy` WHERE `id` = %i;";
        dibi::query($query, $id);
    }
}
