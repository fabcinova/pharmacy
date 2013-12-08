<?php

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends \Nette\Application\UI\Presenter
{
    const ROLE_ADMIN = "admin";
    const ROLE_LEKARNIK = "lekarnik";
    const ROLE_USER = "user";
    
    protected static $roles = array(
        self::ROLE_ADMIN, self::ROLE_LEKARNIK, self::ROLE_USER
    );
    
    
    public function __construct(\Nette\DI\Container $context = NULL) {
        //TODO Autentifikace
        parent::__construct($context);
        $this->template->user = $this->getUser();
        $this->template->nadpis = 'LÉKARNA U Barči a Domči';
    }
    
    public function rights($role)
    {
        $roles = $this->getUser()->getRoles();
        
        if (in_array(self::ROLE_ADMIN, $roles))
        {
            return TRUE;
        }
        
        if (in_array(self::ROLE_LEKARNIK, $roles) && ($role == self::ROLE_LEKARNIK))
        {
            return TRUE;
        }
        
        if (in_array(self::ROLE_USER, $roles) && ($role == self::ROLE_USER))
        {
            return TRUE;
        }
        
        return FALSE;
    }
}
