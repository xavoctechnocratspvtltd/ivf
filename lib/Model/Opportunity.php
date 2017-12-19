<?php

namespace xavoc\ivf;

class Model_Opportunity extends \xepan\marketing\Model_Opportunity{
	public $status = [];

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

		foreach ($config_m as $model) {
			$this->status[$model['name']] = $model['name'];
		}

		$this->actions = [];
		foreach ($this->status as $status => $value) {
			$this->actions[$status] = ['view','edit','delete'];
		}

		$this->getElement('status')->setValueList($this->status);
		$this->getElement('previous_status')->destroy();
		$this->getElement('narration')->destroy();

		$this->addHook('beforeSave',$this);
	}

	function beforeSave(){
		if(!in_array($this['status'], $this->status))
			throw new \Exception("must not be empty ".$this['status']);
	}



}