<?php

namespace xavoc\ivf;

class page_master_doctor extends \xepan\base\Page{
	public $title = "Doctor Master";

	function init(){
		parent::init();

		$model = $this->add('xavoc\ivf\Model_Doctor');
		$crud = $this->add('xepan\hr\CRUD');
		$crud->setModel($model,['first_name','last_name'],['name']);
		
		if($form =$crud->form){
			$form->addField('checkbox','is_hourly_basis');
			$form->addField('checkbox','is_performance_basis');
			$form->addField('checkbox','is_procedure_basis');
		}

		$crud->grid->removeAttachment();
		
	}
}