<?php
use Nette\Application\UI;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestPresenter
 *
 * @author dominika
 */
class TestPresenter extends UI\Presenter
{

    
    protected function createComponentSignInForm()
    {
        $form = new UI\Form;
        $form->addText('name', 'Jméno:');
        $form->addPassword('password', 'Heslo:');
        $form->addSubmit('login', 'Přihlásit se');
        $form->onSuccess[] = callback($this, 'signInFormSubmitted');
        return $form;
    }

    // volá se po úspěšném odeslání formuláře
    public function signInFormSubmitted(UI\Form $form)
    {
        $values = $form->getValues();

        $this->flashMessage('Byl jsi úspěšně přihlášen.');
        //$this->redirect('Homepage:');
    }
}