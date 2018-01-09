<?php

namespace xavoc\ivf;

class page_oncalldoctor extends \xepan\base\Page{
	public $title = "On Call Doctor Management";

	function init(){
		parent::init();
		
		$form = $this->add('Form');
		$form->add('xepan\base\Controller_FLC')
			->showLables(true)
			->makePanelsCoppalsible(true)
			->layout([
				'doctor'=>'Create on call Doctor~c1~12',
				'patient'=>'c2~4',
				'treatment'=>'c3~4',
				'procedure'=>'c4~4',
				'on_date'=>'c5~4',
				'FormButtons~&nbsp;'=>'c6~4'
			]);

		$d = $form->addField('DropDown','doctor');
		$d->setModel('xavoc\ivf\Model_Doctor');
		$d->setEmptyText('Plese Select Doctor');

		$p = $form->addField('DropDown','patient');
		$p->setModel('xavoc\ivf\Model_Patient');
		$p->setEmptyText('Plese Select Patient');

		$t = $form->addField('DropDown','treatment');
		$t->setModel('xavoc\ivf\Model_Treatment');
		$t->setEmptyText('Plese Select Treatment');

		$p = $form->addField('DropDown','procedure');
		$p->setModel('xavoc\ivf\Model_Procedure');
		$p->setEmptyText('Plese Select procedure');

		$form->addField('DatePicker','on_date');
		$form->addSubmit('Send Request to doctor')->addClass('btn btn-primary');
		
		if($form->isSubmitted()){
			$form->js()->univ()->successMessage('request email send to doctor')->execute();
			
		}


		$data = [
				'1'=>['doctor'=>'Dr. Rk Sharma','for_patient'=>'Ramesh Singh','treatment'=>'Treatment 1','treatment_date'=>'20-Jan-2018','request_date'=>'5-Jan-2018','status'=>'Scheduled'],
				'2'=>['doctor'=>'Dr. PK Gupta','for_patient'=>'Ramesh Singh','treatment'=>'Treatment 1','treatment_date'=>'20-Jan-2018','request_date'=>'5-Jan-2018','status'=>'Waiting for approval'],
				'3'=>['doctor'=>'Dr. Pritam Singh','for_patient'=>'Ramesh Singh','treatment'=>'Treatment 1','treatment_date'=>'20-Jan-2018','request_date'=>'5-Jan-2018','status'=>'Scheduled'],
				'4'=>['doctor'=>'Dr. Piyush Sharma','for_patient'=>'Ramesh Singh','treatment'=>'Treatment 1','treatment_date'=>'20-Jan-2018','request_date'=>'5-Jan-2018','status'=>'Complete'],
				'5'=>['doctor'=>'Dr. Monika Gupta','for_patient'=>'Ramesh Singh','treatment'=>'Treatment 1','treatment_date'=>'20-Jan-2018','request_date'=>'5-Jan-2018','status'=>'Scheduled'],

			];

		$grid = $this->add('Grid');
		$grid->setSource($data);
		$grid->addColumn('doctor');
		$grid->addColumn('for_patient');
		$grid->addColumn('treatment');
		$grid->addColumn('request_date');
		$grid->addColumn('status');
	}	
}