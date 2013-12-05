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
        $pojistovny = Pojistovna::loadAll();

        $array_lek = array();
        foreach ($leky as $value)
        {
            $array_lek[$value->ID] = $value->nazev;
        };
        
        $array_pojistovna = array();
        foreach ($pojistovny as $value)
        {
            $array_pojistovna[$value->kod] = $value->nazev;
        };
        
        $form = new Form();
        
        $form->addSelect("lek", "Lék", $array_lek);
        $form->addSelect("pojistovna", "Pojišťovna", $array_pojistovna);
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
