<?php
use Nette\Application\UI\Form;

/**
 * Description of NakupPresenter
 *
 * @author dominika
 */
class NakupPresenter extends BasePresenter {

    protected $id;

    public function actionDefault()
    {
        $this->template->nakupy = Nakup::loadAll();
    }
    
    public function actionCreate()
    {

    }
    
    public function actionEdit($id)
    {
        $this->id = $id;
    }
    
    public function actionDelete($id)
    {
        try
        {
            Nakup::delete($id);
        }
        catch(Exception $ex)
        {
            $this->flashMessage("Chyba: Nákup nebyl smazán!", "error");
        }
        $this->flashMessage("Odstraněno.", "info");
        $this->redirect("Nakup:default");
    }
    
    public function createComponentCreateForm()
    {        
        $array_lek = array();
        foreach (Lek::loadAll() as $value)
        {
            $array_lek[$value->ID] = $value->nazev;
        };
        
        $array_pobocka = array();
        foreach (Pobocka::loadAll() as $pobocka)
        {
            $adr = $pobocka->getAdresa();
            $array_pobocka[$pobocka->id] = $adr->ulice . " " . $adr->cislo_popisne . ", " . $adr->mesto;
        };
        
        $form = new Form();
        
        $form->addText("datum", "Datum")
             ->setDefaultValue(date("j.n.Y"));
        $form->addSelect("pobocka", "Pobočka", $array_pobocka);
        $form->addSelect("lek", "Lék", $array_lek);
        $form->addSubmit("odeslat", "Uložit");
        $form->onValidate[] = callback($this, 'validateForm');
        $form->onSuccess[] = callback($this, "create");
        
        return $form;
    }
    
    public function validateForm(Form $form)
    {
        $values = $form->getValues();

        if (!Helper::validateDate($values->datum))
        {
            $form->addError('Datum nebyl zadán správně.');
        }
        
        $errors = $form->getErrors();
        foreach ($errors as $error)
        {
            $this->flashMessage($error, "error");
        }
    }
    
    public function create(Form $form)
    {
        $values = $form->getValues();
        
        try
        {
            if (Lek::getMnozstvi($values->lek, $values->pobocka) > 0)
            {
                    $pob = new Pobocka ($values->pobocka);
                    $pob->removeOneFromNakup($values->lek);
                    Nakup::create($values->datum, $values->pobocka, $values->lek);
                
                $this->flashMessage("Uloženo.", "info");
            }
            else
            {
                $this->flashMessage("Nedostatek zboží.", "error");
            }
        }
        catch(\Exception $ex)
        {
            $this->flashMessage("Chyba: Nákup nebyl vložen!", "error");
        }
        //$this->redirect("Nakup:default");
    }
}
