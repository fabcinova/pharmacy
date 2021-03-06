<?php

/**
 * Description of Adresa
 *
 * @author dominika
 */
class Adresa extends Model{
    
    public $id;
    public $ulice;
    public $cislo_popisne;
    public $psc;
    public $mesto;

    public function __construct($id)
    {
        $this->load("adresy", $id);
    }
    
    
    public static function create($ulice, $cislo_popisne, $psc, $mesto)
    {
        $query = "INSERT INTO `adresy` (`ulice`, `cislo_popisne`, `psc`, `mesto`) 
            VALUES (%s, %i, %i, %s);";
        dibi::query($query, $ulice, $cislo_popisne, $psc, $mesto);
        
        return dibi::getInsertId();
    }
    
    public static function delete($id)
    {
        $query = "DELETE FROM `adresy` WHERE `ID` = %i;";
        dibi::query($query, $id);
    }
}
