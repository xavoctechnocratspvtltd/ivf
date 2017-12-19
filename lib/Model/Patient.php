<?php

namespace xavoc\ivf;

class Model_Patient extends \xepan\commerce\Model_Customer{
	
	public $status = ['Active','InActive'];
	public $actions = [
				'Active'=> ['view','edit','delete','deactivate'],
				'InActive'=> ['view','edit','delete','activate']
			];

	function init(){
		parent::init();

		
	}
}