<?php

namespace xavoc\ivf;

class page_prospectstatus extends \xepan\base\Page{
	public $title = "Prospect Management";

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
		
		$cols = $this->add('Columns');

		foreach ($config_m as $model) {

			$col = $cols->addColumn('4');
			$col->add('View')->addClass('alert alert-info')->set($model['name']." Opportunity");
			
			$model = $col->add('xavoc\ivf\Model_Opportunity');
			$model->addCondition('status',$model['name']);

			$crud = $col->add('xepan\hr\CRUD');
			if($crud->isEditing()){
				$form = $crud->form;
				$form->add('xepan\base\Controller_FLC')
					->addContentSpot()
					->makePanelsCoppalsible(true)
					->layout([
						'lead~Opportunity From Lead'=>'Opportunity Detail~c1~12',
						'title'=>'c2~12',
						'description'=>'c3~12',
						'assign_to_id~Assign to'=>'c4~4',
						'fund'=>'c5~4',
						'discount_percentage'=>'c6~4',
						'closing_date'=>'c7~4',
						'probability_percentage'=>'c8~4',
						'FormButtons~&nbsp;'=>'c9~12'
					]);
			}
			$crud->setModel($model);
			$crud->grid->addQuickSearch(['name']);
		}


	}
}