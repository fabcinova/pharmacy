<?php

/**
 * Description of PobockaPresenter
 *
 * @author dominika
 */
class PobockaPresenter extends BasePresenter{
    
    public function actionDefault()
    {
        $this->template->adresy = Pobocka::loadAllAdresses();
    }
}

?>
