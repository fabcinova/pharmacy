<?php

/**
 * Description of Sklad
 *
 * @author dominika
 */
class Sklad extends Model {
    
    public $pobocka;
    public $lek;
    public $cena;
    public $mnozstvi;

    public function __construct($id)
    {
        $this->load("nakupy", $id);
    }
    
    public static function create($datum, $pobocka, $lek)
    {
        $query = "INSERT INTO `nakupy` (`datum`, `pobocka`, `lek`) 
            VALUES (%d, %i, %i);";
        dibi::query($query, $datum, $pobocka, $lek);
        
        return dibi::getInsertId();
    }
    
}
