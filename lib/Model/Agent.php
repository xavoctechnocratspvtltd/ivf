<?php

namespace xavoc\ivf;

class Model_Agent extends \xepan\base\Model_Contact{
	
	public $status = ['Active','InActive'];
	public $actions = [
				'Active'=> ['view','edit','delete','deactivate'],
				'InActive'=> ['view','edit','delete','activate']
			];
	public $type = "Agent";

	function init(){
		parent::init();


		$this->addCondition('type','Agent');
		$this->getElement('status')->defaultValue('Active');
	}
}