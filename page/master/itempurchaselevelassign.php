<?php

namespace xavoc\ivf;

class page_master_itempurchaselevelassign extends \xepan\base\Page{
	public $title = "Item Purchase Level Assign";

	function init(){
		parent::init();

		$model = $this->add('xavoc\ivf\Model_PurchaseLevelAssign');
		$crud = $this->add('CRUD');
		$crud->setModel($model);
			
	}
}