<?php

namespace xavoc\ivf;

class page_master_treatment extends \xepan\base\Page{
	public $title = "Procedure Master";

	function init(){
		parent::init();

		$model = $this->add('xavoc\ivf\Model_Procedure');

		$crud = $this->add('xepan\hr\CRUD');
		$crud->setModel($model);


	}
}