<?php

/**
 * Description of Pojistovna
 *
 * @author dominika
 */
class Pojistovna {
    
    public $kod;
    public $nazev;
    public $adresa;
    
    public function __construct($kod)
    {
        $result = dibi::query("SELECT * FROM `pojistovny` WHERE kod=%i", $kod);
        if ($result->getRowCount() != 1)
        {
            throw new Exception("Objekt nenalezen.");
        }
        $row = $result->fetch();
        
        // prasarna, ktora naplni triedne premenne hodnotami z tabulky
        foreach ($row as $key => $value)
        {
            $this->$key=$value;
        }
    }
    
    public static function create($nazev, $adresa)
    {
        $query = "INSERT INTO `pojistovny` (`nazev`, `adresa`) 
            VALUES (%s, %i);";
        dibi::query($query, $nazev, $adresa);
        
        return dibi::getInsertId();
    }
    
    public function save()
    {
        $query = "UPDATE `pojistovny` SET nazev=%s, adresa=%i WHERE kod=%i;";
        dibi::query($query, $this->nazev, $this->adresa, $this->kod);
    }
    
    public static function loadAll()
    {
        $query = "SELECT kod FROM `pojistovny`";
        
        foreach (dibi::query($query) as $row)
        {
           $array[] = new self($row->kod);
        }
        return $array;
    }
    
    public static function delete($kod)
    {
        $query = "DELETE FROM `pojistovny` WHERE `kod` = %i;";
        dibi::query($query, $kod);
    }
}
