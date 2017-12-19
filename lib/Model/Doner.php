<?php

namespace xavoc\ivf;

class Model_Doner extends \xepan\base\Model_Contact{
	
	public $status = ['Active','InActive'];
	public $actions = [
				'Active'=> ['view','edit','delete','deactivate'],
				'InActive'=> ['view','edit','delete','activate']
			];
	public $type = "Doner";

	function init(){
		parent::init();
		
		$this->addCondition('type','Doner');
		$this->getElement('status')->defaultValue('Active');
	}
}