<?php

/**
 * Description of Lek
 *
 * @author dominika
 */
class Lek extends Model{

    public $ID;
    public $nazev;
    public $ucinna_latka;
    public $predpis;

    public function __construct($id)
    {
        $this->load("leky", $id);
    }
    
    /**
     * 
     * @param string $nazev
     * @param string $latka
     * @param bool $predpis
     * @return integer id of last inserted
     */
    public static function create($nazev, $latka, $predpis)
    {
        $query = "INSERT INTO `leky` (`nazev`, `ucinna_latka`, `predpis`) 
            VALUES (%s, %s, %i);";
        dibi::query($query, $nazev, $latka, $predpis);
        
        return dibi::getInsertId();
    }
    
    public function save()
    {
        $query = "UPDATE `leky` SET nazev=%s, ucinna_latka=%s, predpis=%i WHERE id=%i;";
        dibi::query($query, $this->nazev, $this->ucinna_latka, $this->predpis, $this->ID);
    }
    
    public static function loadAll()
    {
        $query = "SELECT id FROM leky";
        
        foreach (dibi::query($query) as $row)
        {
           $array[] = new self($row->id);
        }
        return $array;
    }
    
    public static function delete($id)
    {
        $query = "DELETE FROM `leky` WHERE `ID` = %i;";
        dibi::query($query, $id);
    }
}
