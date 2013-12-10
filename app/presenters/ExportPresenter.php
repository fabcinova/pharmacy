<?php

use Nette\Application\UI\Form;

/**
 * Export presenter.
 */
class ExportPresenter extends BasePresenter
{       
    public function actionCreate()
    {

    }
    
    public function actionEdit($ID)
    {
        $this->id = $ID;
    }
    
      

    public function createComponentCreateForm()
    {    
        $array_pojistovna = array();
        foreach (Pojistovna::loadAll() as $value)
        {
            $array_pojistovna[$value->kod] = $value->nazev;
        };
        
        $form = new Form();
        
        
        $form->addSelect("pojistovna", "Poji¹»ovna", $array_pojistovna);
        $form->addText("od", "Od");
        $form->addText("do", "Do");
        $form->addSubmit("exportovat", "Exportovat");
        $form->onValidate[] = callback($this, 'validateForm');
        $form->onSuccess[] = callback($this, 'export');
        
        return $form;
    }
    
    public function validateForm(Form $form)
    {
        $values = $form->getValues();

        if (!Helper::validateDate($values->od))
        {
            $form->addError('Datum "OD" byl zadan spatne.');
        }
    
        if (!Helper::validateDate($values->do))
        {
            $form->addError('Datum "DO" byl zadan spatne.');
        }
        
        if (date_create($values->od) > date_create($values->do))
        {
            $form->addError('Datum "OD" musi byt mensi nez datum "DO".');
        }
        
        $errors = $form->getErrors();
        foreach ($errors as $error)
        {
            $this->flashMessage($error, "error");
        }
    }
    
    
    public function export(Form $form)
    {
        $values = $form->getValues();
        
        try{
            $query = "SELECT *
            FROM prispevky
            WHERE pojistovna=%s AND platnost_od>=%d AND platnost_do<=%";
            
            dibi::query($query, $values->pojistovna, $values->od, $values->do);
            
            foreach (dibi::query($query) as $row){
               $array[] = new Prispevek ($row->id);
            }
            dump($array);
                        
        }
        catch(Exception $ex)
        {   
            $this->flashMessage("Chyba: Vyhledávání v databázi selhalo.", "error");
        } 
        
        $this->flashMessage("Exportováno.");
        //$this->redirect("Export:default");
    }
    
   
}