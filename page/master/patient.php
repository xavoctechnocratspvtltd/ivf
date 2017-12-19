<?php

namespace xavoc\ivf;

class page_master_patient extends \xepan\base\Page{
	public $title = "Patient Master";

	function init(){
		parent::init();

		$model = $this->add('xavoc\ivf\Model_Patient');
		$crud = $this->add('xepan\hr\CRUD');
		$crud->setModel($model,['first_name','last_name'],['name']);
		
		$crud->grid->removeAttachment();
		
	}
}