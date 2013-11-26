<?php

/**
 * Description of model
 *
 * @author dominika
 */
class model extends Nette\Object{
    
    /**
     * @todo It would be great to compare table param to array of table names.
     * @param type $table
     * @param type $id
     */
    protected function load($table, $id)
    {
        $result = dibi::query("SELECT * FROM {$table} WHERE id=%i", $id);
        $row = $result->fetch();
        
        foreach ($row as $key => $value)
        {
            $this->$key=$value;
        }
    }
}

?>
