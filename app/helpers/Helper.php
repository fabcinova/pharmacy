<?php

/**
 * Description of Helper
 *
 * @author dominika
 */
class Helper {
    
    /**
     * Validates if is string usable for DateTime object construct.
     * @param string $string
     * @return boolean
     */
    public static function validateDate($string)
    {
//        $date = new DateTime($string);
        $date = date_create($string);
//        dump($date->format("Y"));
        
        if ($string && $date->format("Y") > 1970)
        {
            return true;
        }
        
        return false;
    }
}
