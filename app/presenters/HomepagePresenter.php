<?php

use Nette\Forms\Form;

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

	public function renderDefault()
	{
		//$this->template->anyVariable = 'any value';
	}
        
        public function actionDefault()
        {
            $form = new Form;

            $form->addText('name', 'Jméno:');
            $form->addPassword('password', 'Heslo:');
            $form->addSubmit('send', 'Registrovat');

            echo $form; // vykreslí formulář
            
            dump(new Lek(1));
//            $id = Lek::create("Novy Lek Ktery Je Supr", "latka ktera ucinkuje", "1");
//            dump($id);
            dump(new Adresa(8));
            dump(new Pobocka(1));
            dump(new Dodavatel(3));
            dump(new Adresa(15));
        }
}
