<?php

namespace xavoc\ivf;

class page_warehouse extends \xepan\base\Page{
	public $title = "Warehouse Management";

	function init(){
		parent::init();

		$model = $this->add('xavoc\ivf\Model_Warehouse');
		$crud = $this->add('xepan\base\CRUD');
		$crud->setModel($model,['first_name','address','city','state_id','country_id','is_storage_location','is_center_level_main_store','is_center_store_ho','is_store_for_director_only']);
		
	}
}