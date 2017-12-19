<?php

namespace xavoc\ivf;

class page_master_agent extends \xepan\base\Page{
	public $title = "Agent Master";

	function init(){
		parent::init();

		$model = $this->add('xavoc\ivf\Model_Agent');
		$crud = $this->add('xepan\hr\CRUD');
		$crud->setModel($model,['first_name','last_name'],['name']);
		
		$crud->grid->removeAttachment();
		
	}
}