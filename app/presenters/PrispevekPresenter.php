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
}
