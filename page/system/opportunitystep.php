<?php

namespace xavoc\ivf;

class page_system_opportunitystep extends \xepan\base\Page{
	public $title = "Opportunity Step Management";

	function init(){
		parent::init();
		
		$config_m = $this->add('xepan\base\Model_ConfigJsonModel',
		[
			'fields'=>[
						'name'=>'Line',
						'sequence'=>'Number',
						'is_assign_to_employee'=>'checkbox'
					],
				'config_key'=>'OPPORTUNITY_STEP',
				'application'=>'xavoc\ivf'
		]);
		$config_m->add('xepan\hr\Controller_ACL');
		$config_m->tryLoadAny();
		
		$crud = $this->add('xepan\hr\CRUD',['entity_name'=>'Opportunity Step']);
		$crud->setModel($config_m);
		$crud->grid->removeAttachment();
		$crud->grid->addQuickSearch(['name']);
		$crud->grid->removeColumn('id');
	}
}