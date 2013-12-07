<?php
use Nette\Application\UI\Form;

/**
 * Description of LekPresenter
 *
 * @author dominika
 */
class LekPresenter extends BasePresenter {
    
    protected $id;

    public function actionDefault()
    {
        $this->template->leky = Lek::loadAll();
    }
    
    public function actionCreate()
    {

    }
    
    public function actionEdit($ID)
    {
        $this->id = $ID;
    }
    
    public function actionDelete($ID)
    {
        try
        {
            Lek::delete($ID);
        }
        catch(Exception $ex)
        {
            $this->flashMessage("Chyba: Lék nebyl smazán!", "error");
        }
        $this->flashMessage("Odstraněno.", "info");
        $this->redirect("Lek:default");
    }
    

    public function createComponentCreateForm()
    {
        $form = new Form();
        
        $form->addText("nazev", "Název");
        $form->addText("ucinna_latka", "Účinná látka");
        $form->addCheckbox("predpis", "Na předpis?");
        $form->addSubmit("odeslat", "Uložit");
        $form->onSuccess[] = callback($this, "create");
        
        return $form;
    }
    
    public function createComponentEditForm()
    {
        $lek = new Lek($this->id);
        
        $form = $this->createComponentCreateForm();
        // reset callback
        $form->onSuccess = array();
        $form->onSuccess[] = callback($this, "edit");
        
        // naplnime hodnotami
        $form->addHidden("id")->setValue($lek->ID);
        $form->getComponent("nazev")->setValue($lek->nazev);
        $form->getComponent("ucinna_latka")->setValue($lek->ucinna_latka);
        $form->getComponent("predpis")->setValue($lek->predpis);
        
        return $form;
    }
    
    public function create(Form $form)
    {
        $values = $form->getValues();
        try
        {
            Lek::create($values->nazev, $values->ucinna_latka, $values->predpis);
        }
        catch(Exception $ex)
        {
            $this->flashMessage("Chyba: Lék nebyl vložen!", "error");
        }
        $this->flashMessage("Uloženo.", "info");
        $this->redirect("Lek:default");
    }
    
    public function edit(Form $form)
    {
        $values = $form->getValues();
        try 
        {
            $lek = new Lek($values->id);
        }
        catch (Exception $ex)
        {
            $this->flashMessage("Lek neexistuje!", "error");
            $this->redirect("Lek:default");
        }
        //TODO skontrolovat opravnenia uzivatelov
        
        $lek->nazev = $values->nazev;
        $lek->ucinna_latka = $values->ucinna_latka;
        $lek->predpis = $values->predpis;
        
        try
        {
            $lek->save();
        }
        catch (Exception $ex)
        {
            $this->flashMessage("Neaktualizovano.", "error");
            $this->redirect("Lek:edit", array("ID" => $this->id));
        }
        $this->flashMessage("Aktualizovano.", "info");
        $this->redirect("Lek:default");
    }
}
