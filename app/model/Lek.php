<?php

/**
 * Description of Lek
 *
 * @author dominika
 */
class Lek extends Model{

    protected $ID;
    protected $nazev;
    protected $ucinna_latka;
    protected $predpis;

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
    
    public static function delete($id)
    {
        $query = "DELETE FROM `leky` WHERE `ID` = %i;";
        dibi::query($query, $id);
    }
}
