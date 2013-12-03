<?php

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

	public function renderDefault()
	{
		$this->template->nadpis = 'LÉKARNA U Barči a Domči';
	}
        
        public function actionDefault()
        {
        }
}
