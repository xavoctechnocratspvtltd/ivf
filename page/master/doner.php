<?php

namespace xavoc\ivf;

class page_master_doner extends \xepan\base\Page{
	public $title = "Doner Master";

	function init(){
		parent::init();

		$model = $this->add('xavoc\ivf\Model_Doner');
		$crud = $this->add('xepan\hr\CRUD');
		$crud->setModel($model,['first_name','last_name'],['name']);
		
		$crud->grid->removeAttachment();
		
	}
}