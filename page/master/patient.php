<?php

namespace xavoc\ivf;

class page_master_patient extends \xepan\base\Page{
	public $title = "Patient Master";

	function init(){
		parent::init();

		$model = $this->add('xavoc\ivf\Model_Patient');
		$model->getElement('created_at')->caption('Registration Date');
		$model->getElement('billing_address')->caption('Address');

		$crud = $this->add('xepan\hr\CRUD');
		$crud->setModel($model,['first_name','last_name','created_at','billing_address'],['name','created_at','billing_address']);
		
		$crud->grid->removeAttachment();
		
	}
}