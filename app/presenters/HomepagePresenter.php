<?php

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
            dump(new Lek(1));
            $id = Lek::create("Novy Lek Ktery Je Supr", "latka ktera ucinkuje", "1");
            dump($id);
        }
}
