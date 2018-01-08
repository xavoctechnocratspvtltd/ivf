<?php

namespace xavoc\ivf;

class Model_Patient extends \xepan\commerce\Model_Customer{
	
	public $status = ['Active','InActive'];
	public $actions = [
				'Active'=> ['view','treatment','edit','delete','deactivate'],
				'InActive'=> ['view','treatment','edit','delete','activate']
			];

	function init(){
		parent::init();
				

	}

	function page_treatment($page){

		$form = $page->add('Form');
		$form->add('xepan\base\Controller_FLC')
			->showLables(true)
			->layout([
					'treatment'=>'Apply Treatment to Patient ('.$this['name'].')|~c1~6',
				]);

		$treatment = $form->addField('xepan\base\DropDown','treatment');
		$treatment->setModel('xavoc\ivf\Model_Treatment');
		$treatment->setEmptyText('Please Select Treatment');

		$form->addSubmit("Apply Treatment Now")->addClass('btn btn-primary');

		if($form->isSubmitted()){
			$form->js()->univ()->successMessage('Treatment is applied on patient ('.$this['name'].')')->execute();
		}

	}
}