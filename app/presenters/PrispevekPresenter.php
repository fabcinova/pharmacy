<?php
use Nette\Application\UI\Form;

/**
 * Description of PrispevekPresenter
 *
 * @author dominika
 */
class PrispevekPresenter extends BasePresenter {
    
    protected $id;
    
    public function actionDefault()
    {
        $this->template->prispevky = Prispevek::loadAll();
//        dump($this->template);
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
            Prispevek::delete($id);
        }
        catch(Exception $ex)
        {
            $this->flashMessage("Chyba: Prispevek nebyl smazán!", "error");
        }
        $this->flashMessage("Odstraněno.", "info");
        $this->redirect("Prispevek:default");
    }
    
    public function createComponentCreateForm()
    {        
        $array_lek = array();
        foreach (Lek::loadAll() as $value)
        {
            $array_lek[$value->ID] = $value->nazev;
        };
        
        $array_pojistovna = array();
        foreach (Pojistovna::loadAll() as $value)
        {
            $array_pojistovna[$value->kod] = $value->nazev;
        };
        
        $form = new Form();
        
        $form->addSelect("lek", "Lék", $array_lek);
        $form->addSelect("pojistovna", "Pojišťovna", $array_pojistovna);
        $form->addText("vyse_prispevku", "Výše příspěvku v Kč")
             ->addRule(Form::INTEGER, 'Výše příspěvku musí být číslo');
        $form->addText("platnost_od", "Platnost od");
        $form->addText("platnost_do", "Platnost do");
        $form->addSubmit("odeslat", "Uložit");
        $form->onValidate[] = callback($this, 'validateForm');
        $form->onSuccess[] = callback($this, "create");
        
        return $form;
    }
    
    public function createComponentEditForm()
    {        
        $form = $this->createComponentCreateForm();
        $prispevek = new Prispevek($this->id);
        
        // reset callback
        $form->onSuccess = array();
        $form->onSuccess[] = callback($this, "edit");
        
        // naplnime hodnotami
        $form->addHidden("id")->setValue($prispevek->id);
        $form->getComponent("lek")->setValue($prispevek->lek);
        $form->getComponent("pojistovna")->setValue($prispevek->pojistovna);
        $form->getComponent("vyse_prispevku")->setValue($prispevek->vyse_prispevku);
        $form->getComponent("platnost_od")->setValue($prispevek->platnost_od->format("d.m.Y"));
        $form->getComponent("platnost_do")->setValue($prispevek->platnost_do->format("d.m.Y"));
    
        return $form;
    }
    
    public function validateForm(Form $form)
    {
        $values = $form->getValues();

        if (!Helper::validateDate($values->platnost_od))
        {
            $form->addError('Datum "OD" byl zadan spatne.');
        }
    
        if (!Helper::validateDate($values->platnost_do))
        {
            $form->addError('Datum "DO" byl zadan spatne.');
        }
        
        if (date_create($values->platnost_od) > date_create($values->platnost_do))
        {
            $form->addError('Datum "OD" musi byt mensi nez datum "DO".');
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
            Prispevek::create($values->lek, $values->pojistovna, $values->vyse_prispevku, $values->platnost_od, $values->platnost_do);
            $this->flashMessage("Uloženo.", "info");
//            $this->redirect("Prispevek:default");
        }
        catch(Exception $ex)
        {
            throw $ex;
            $this->flashMessage("Chyba: Příspěvek nebyl vložen!", "error");
        }
        
//        $this->flashMessage("Uloženo.", "info");
        $this->redirect("Prispevek:default");
    }
    
    public function edit(Form $form)
    {
        $values = $form->getValues();
        dump($values);
        try
        {
            $prispevek = new Prispevek($values->id);
        }
        catch (Exception $ex)
        {
            $this->flashMessage("Prispevek neexistuje", "error");
            $this->redirect("Prispevek:default");
        }
        
        try
        {
            foreach ($prispevek as $key => $value)
            {
                if ($key != "id")
                {
                    dump($key);
                    dump($values->$key);
                    $prispevek->$key = $values->$key;
                }
            }
            
            $prispevek->save();
        }
        catch (Exception $ex)
        {
            $this->flashMessage("Neaktualizovano!", "error");
            $this->redirect("Prispevek:edit", array("id" => $this->id));
        }
        $this->flashMessage("Aktualizovano.");
        $this->redirect("Prispevek:default");
    }
}
