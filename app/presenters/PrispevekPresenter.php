<?php
use Nette\Application\UI\Form;

/**
 * Description of PrispevekPresenter
 *
 * @author dominika
 */
class PrispevekPresenter extends BasePresenter {
    
    public function actionDefault()
    {
        $this->template->prispevky = Prispevek::loadAll();
    }
    
    public function actionCreate()
    {

    }
    
    public function createComponentCreateForm()
    {        
        $leky = Lek::loadAll(); // vracia pole instancii objektu lek
        $count_leky = count($leky);

        $array = array();
        
        for($index = 1; $index <= $count_leky; $index++)
        {
            $leky[$index]->ID => $leky[$index]->nazev; //kktina, ktora nefachci
        }
        
        $form = new Form();
        
        $form->addSelect("lek", "Lék",
                array(
                    $leky[$index]->ID => $leky[$index]->nazev
                ));
        $form->addSelect("pojistovna", "Pojišťovna",
            array(
                '201' => 'ČPZP',
                '203' => 'VOZP',
            ));
        $form['pojistovna']->setDefaultValue('203');
        $form->addText("vyse_prispevku", "Výše příspěvku");
        $form->addText("platnost_od", "Platnost od");
        $form->addText("platnost_do", "Platnost do");
        $form->addSubmit("odeslat", "Uložit");
        $form->onSuccess[] = callback($this, "create");
        
        return $form;
    }
    
    public function create(Form $form)
    {
        $values = $form->getValues();
        try
        {
            Prispevek::create($values->lek, $values->pojistovna, $values->vyse_prispevku, $values->platnost_od, $values->platnost_do);
        }
        catch(Exception $ex)
        {
            $this->flashMessage("Chyba: Příspěvek nebyl vložen!", "error");
        }
        $this->flashMessage("Uloženo.", "info");
        $this->redirect("Prispevek:default");
    }
}
