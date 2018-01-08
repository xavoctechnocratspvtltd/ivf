<?php

namespace xavoc\ivf;

class page_patientprocedure extends \xepan\base\Page{
	public $title = "Patient Current Treatment & Procedure";

	function init(){
		parent::init();

		$btn_set = $this->add('ButtonSet');
		$btn_set->add('Button')->set('Filter by Treatment')->addClass('btn btn-info');
		$btn_set->add('Button')->set('Filter by Date')->addClass('btn btn-danger');
		$btn_set->add('Button')->set('Filter by Doctor')->addClass('btn btn-warning');
		$btn_set->add('Button')->set('Filter by Patient')->addClass('btn btn-default');

		$col = $this->add('Columns');
		$col1 = $col->addColumn('4');
		$col2 = $col->addColumn('8');

		$patient_model = $this->add('xavoc\ivf\Model_Patient');
		$grid = $col1->add('Grid');
		$grid->setModel($patient_model,['name']);

		$view = $col2->add('View')->addClass('main-box')
			->setHtml('<div class="row">
					<div class="col-md-6">
						<h3>Details</h3> 
						<p>Patient Name: Neha Mathur</p>
						<p>Husband Name: Piyush Mathur</p>
						<p>Phone No: 8787676545,909090977</p>
						<p>Email Id: xyz@gmail.com</p>
					</div>
					<div class="col-md-6">
						<h3>Dates</h3>
						<p>Date of Consultation: <b>13-Dec-2017 02:24 PM</b></p>
						<p>Date of Registration: <b>03-Jan-2018 01:24 PM</b></p>
						<p>Date of Checkup: <b>05-Jan-2018 11:24 AM</b></p>
					</div>
				</div>');

		$col2->add('View_Info')
			->addClass('alert alert-info')
			->setHtml(
				'<div class="row">
					<div class="col-md-6">
						Patient Current Treatment
					</div>
					<div class="col-md-6">
						Total Amount Due: <strong>10,540.20 INR</strong>
						<button class="paynow btn btn-primary">Pay Now</button>
					</div>
				</div>'
			);

		$vp = $this->add('VirtualPage');
		$vp->set(function($page){
			$tab = $page->add('Tabs');
			$cash = $tab->addTab('Cash Received');
			$dd = $tab->addTab('DD Received');
			$cheque = $tab->addTab('Cheque Received');
			
			$cash_form = $cash->add('Form');
			$cash_form->addField('amount')->validate('required');
			$cash_form->addField('text','narration');
			$cash_form->addSubmit('Cash Payment Received')->addClass('btn btn-primary');

			if($cash_form->isSubmitted()){
				$cash_form->js()->univ()->successMessage("cash payment received")->execute();
			}

			$dd_form = $dd->add('Form');
			$dd_form->addField('amount')->validate('required');
			$dd_form->addField('dd_number')->validate('required');
			$dd_form->addField('DatePicker','dd_date')->validate('required');
			$dd_form->addField('bank_detail');
			$dd_form->addField('text','narration');
			$dd_form->addSubmit('DD Payment Received')->addClass('btn btn-primary');

			if($dd_form->isSubmitted()){
				$dd_form->js()->univ()->successMessage("payment received via DD")->execute();
			}

			$cheque_form = $cheque->add('Form');
			$cheque_form->addField('amount')->validate('required');
			$cheque_form->addField('cheque_number')->validate('required');
			$cheque_form->addField('DatePicker','cheque_date')->validate('required');
			$cheque_form->addField('bank_detail');
			$cheque_form->addField('text','narration');
			$cheque_form->addSubmit('Cheque Payment Received')->addClass('btn btn-primary');

			if($cheque_form->isSubmitted()){
				$cheque_form->js()->univ()->successMessage("payment received via DD")->execute();
			}
		});

		$col2->js('click')->_selector('.paynow')->univ()->frameURL($this->app->url($vp->getURL()));

		$tab = $col2->add('Tabs');
		$t1 = $tab->addTab('Treatment 1');
		$t2 = $tab->addTab('Treatment 2');
		$t3 = $tab->addTab('Treatment 3');

		$t1->add('View')
			->setHtml(
				'<div class="row">
					<div class="col-md-6  alert alert-success">
						Doctor: dr. Anand Mehra
					</div>
					<div class="col-md-6  alert alert-danger">
						Treatment 1 Amount Due: <strong>5,540.20 INR</strong>
					</div>
				</div>'
				);
		$g1 = $t1->add('Grid');
		$g1->setModel('xavoc\ivf\Model_Procedure',['name','amount','date']);
		$g1->template->tryDel('Pannel');
		

		$t2->add('View')
			->setHtml(
				'<div class="row">
					<div class="col-md-6  alert alert-success">
						Doctor: dr. Aakash Sharma
					</div>
					<div class="col-md-6  alert alert-danger">
						Treatment 1 Amount Due: <strong>3,540.20 INR</strong>
					</div>
				</div>'
				);
		$g2 = $t2->add('Grid');
		$g2->setModel('xavoc\ivf\Model_Procedure',['name','amount','date'])->setOrder('id','desc');
		$g2->template->tryDel('Pannel');

		$t3->add('View')
			->setHtml(
				'<div class="row">
					<div class="col-md-6  alert alert-success">
						Doctor: dr. Aakash Sharma
					</div>
					<div class="col-md-6  alert alert-danger">
						Treatment 1 Amount Due: <strong>3,540.20 INR</strong>
					</div>
				</div>'
				);
		$g3 = $t3->add('Grid');
		$g3->setModel('xavoc\ivf\Model_Procedure',['name','amount','date'])->setLimit('3')->setOrder('id','desc');
		$g3->template->tryDel('Pannel');
	}
}