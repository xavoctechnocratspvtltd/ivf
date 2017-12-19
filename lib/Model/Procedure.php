<?php

namespace xavoc\ivf;

class Model_Procedure extends \xepan\base\Model_Document{

	public $status = ['Active','InActive'];
	public $actions = [
				'Active'=> ['view','edit','delete','deactivate'],
				'InActive'=> ['view','edit','delete','activate']
			];

	function init(){
		parent::init();

		$this->join = $join =$this->join('ivf_procedure.document_id');

		$join->hasOne('xavoc\ivf\Treatment','treatment_id');
		$join->addField('name')->sortable(true);

		$this->addCondition('type','Procedure');

		$this->getElement('status')->defaultValue('Active');
	}
}