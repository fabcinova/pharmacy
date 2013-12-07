<?php

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends \Nette\Application\UI\Presenter
{
    public function __construct(\Nette\DI\Container $context = NULL) {
        //TODO Autentifikace
        parent::__construct($context);
    }
    
    public function renderDefault()
    {
            $this->template->nadpis = 'LÉKARNA U Barči a Domči';
    }
}
