<?php

namespace xavoc\ivf;

class Model_PurchaseLevelAssign extends \xepan\base\Model_Table{
	public $table = "ivf_purchase_level_assign";
	public $status = ['Active','InActive'];
	public $actions = [
				'Active'=> ['view','edit','delete','deactivate'],
				'InActive'=> ['view','edit','delete','activate']
			];

	function init(){
		parent::init();

		$this->hasOne('xepan\commerce\Model_Item','item_id');

		$this->addField('is_purchase_from_storage_location')->type('boolean');
		$this->addField('is_purchase_from_center_level_main_store')->type('boolean')->defaultValue(false);
		$this->addField('is_purchase_from_center_store')->type('boolean')->defaultValue(true);
		$this->addField('is_purchase_from_director_only')->type('boolean')->defaultValue(true);
		
		$this->add('dynamic_model/Controller_AutoCreator');
	}
}