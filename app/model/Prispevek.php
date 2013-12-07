<?php

/**
 * Description of Prispevek
 *
 * @author dominika
 */
class Prispevek extends Model{
    
    public $id;
    public $lek;
    public $pojistovna;
    public $vyse_prispevku;
    private $platnost_od;
    private $platnost_do;

    public function __construct($id)
    {
        $this->load("prispevky", $id);
    }
    
    /**
     * @return integer id of last inserted
     */
    public static function create($lek, $pojistovna, $vyse_prispevku, $platnost_od, $platnost_do)
    {
        $query = "INSERT INTO `prispevky` (`lek`, `pojistovna`, `vyse_prispevku`, `platnost_od`, `platnost_do`) 
            VALUES (%i, %i, %i, %d, %d);";
        dibi::query($query, $lek, $pojistovna, $vyse_prispevku, $platnost_od, $platnost_do);
        
        return dibi::getInsertId();
    }
    
    public function getLek()
    {
        return new Lek($this->lek);
    }
    
    public function getPojistovna()
    {
        return new Pojistovna($this->pojistovna);
    }

    public function getPlatnost_od()
    {
        return $this->platnost_od;
    }
    
    public function getPlatnost_do()
    {
        return $this->platnost_do;
    }
    
    public function setPlatnost_od($string)
    {
        $this->platnost_od = date_create($string);
        dump($this->platnost_od);
        dump($string);
//        die("umierame");
    }
    
    public function setPlatnost_do($string)
    {
        $this->platnost_do = date_create($string);
    }
    
    public function save()
    {
        $query = "UPDATE `prispevky` SET lek=%i, pojistovna=%i, vyse_prispevku=%i, platnost_od=%d, platnost_do=%d WHERE id=%i;";
        dibi::query($query, $this->lek, $this->pojistovna, $this->vyse_prispevku, $this->platnost_od, $this->platnost_do, $this->id);
    }
    
    public static function loadAll()
    {
        $query = "SELECT id FROM prispevky";
        
        foreach (dibi::query($query) as $row)
        {
           $array[] = new self($row->id);
        }
        return $array;
    }
    
    public static function delete($id)
    {
        $query = "DELETE FROM `prispevky` WHERE `ID` = %i;";
        dibi::query($query, $id);
    }
}
