<?php

namespace xavoc\ivf;

class page_master_vendor extends \xepan\base\Page{
	public $title = "Vendor Master";

	function init(){
		parent::init();

		$model = $this->add('xavoc\ivf\Model_Vendor');
		$crud = $this->add('xepan\hr\CRUD');
		$crud->setModel($model,['first_name','last_name','organization','address','city','state_id','country_id','pin_code','image_id']);
			
		$crud->grid->removeAttachment();
		
	}
}