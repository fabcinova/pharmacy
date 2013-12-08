<?php

/**
 * Description of Model
 *
 * @author dominika
 */
class Model extends Nette\Object{
    
    /**
     * @todo It would be great to compare table param to array of table names.
     * @param type $table
     * @param type $id
     */
    protected function load($table, $id)
    {
        $result = dibi::query("SELECT * FROM {$table} WHERE id=%i", $id);
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
}
