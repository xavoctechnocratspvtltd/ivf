<?php

namespace xavoc\ivf;

class Model_Vendor extends \xepan\commerce\Model_Supplier{
	
	public $status = ['Active','InActive'];
	public $actions = [
				'Active'=> ['view','edit','delete','deactivate'],
				'InActive'=> ['view','edit','delete','activate']
			];

	function init(){
		parent::init();

		
	}
}