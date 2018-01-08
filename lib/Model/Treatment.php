<?php

namespace xavoc\ivf;

class Model_Treatment extends \xepan\base\Model_Document{

	public $title = "name";
	public $status = ['Active','InActive'];
	public $actions = [
				'Active'=> ['view','procedure','edit','delete','deactivate'],
				'InActive'=> ['view','edit','delete','activate']
			];

	function init(){
		parent::init();

		$this->join = $join = $this->join('ivf_treatment.document_id');

		$join->addField('name')->sortable(true);

		$this->addCondition('type','Treatment');
		$this->getElement('status')->defaultValue('Active');

		$this->hasMany('xavoc\ivf\Procedure','treatment_id');

		$this->addExpression('total_procedure')->set(function($m,$q){
			$pro = $this->add('xavoc\ivf\Model_Procedure',['table_alias'=>'ttlpro']);
			return 	$pro->addCondition('treatment_id',$q->getField('id'))
				->count();
		})->type('Number');
	}

	function page_procedure($page){
		
		$model = $page->add('xavoc\ivf\Model_Procedure');
		$model->addCondition('treatment_id',$this->id);

		$crud = $page->add('xepan\hr\CRUD');
		$crud->setModel($model);

		$crud->grid->removeColumn('created_by');
		$crud->grid->removeColumn('updated_by');
		$crud->grid->removeColumn('attachments_count');
		$crud->grid->removeAttachment();
		
	}
}