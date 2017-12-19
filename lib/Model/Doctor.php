<?php

namespace xavoc\ivf;

class Model_Doctor extends \xepan\base\Model_Contact{
	
	public $status = ['Active','InActive'];
	public $actions = [
				'Active'=> ['view','edit','delete','deactivate'],
				'InActive'=> ['view','edit','delete','activate']
			];
	public $type = "Doctor";

	function init(){
		parent::init();


		$this->addCondition('type','Doctor');
		$this->getElement('status')->defaultValue('Active');
	}
}