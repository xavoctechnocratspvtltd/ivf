<?php

namespace xavoc\ivf;

class Model_Warehouse extends \xepan\commerce\Model_Store_Warehouse{

	public $status = ['Active','InActive'];
	public $actions = [
				'Active'=> ['view','edit','delete','deactivate'],
				'InActive'=> ['view','edit','delete','activate']
			];
			
	function init(){
		parent::init();

		$join = $this->join('ivf_warehouse.contact_id');

		$join->addField('is_storage_location')->type('boolean')->defaultValue(false);
		$join->addField('is_center_level_main_store')->type('boolean')->defaultValue(false);
		$join->addField('is_center_store_ho')->type('boolean')->defaultValue(false);
		$join->addField('is_store_for_director_only')->type('boolean')->defaultValue(false);

		$this->getElement('created_by_id')->defaultValue($this->app->employee->id);
	}
}