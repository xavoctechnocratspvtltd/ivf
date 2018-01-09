<?php

namespace xavoc\ivf;

class page_report_dailycashflow extends \xepan\base\Page{
	public $title = "daily cash flow Report";

	function init(){
		parent::init();
		
		$data = [
			'1'=>['patient'=>'Ramesh Singh','treatment'=>'Treatment 1','treatment_date'=>'20-Jan-2018','request_date'=>'5-Jan-2018','status'=>'paid','amount'=>'4500.90'],
			'2'=>['patient'=>'Monika Singh','treatment'=>'Treatment 1','treatment_date'=>'20-Jan-2018','request_date'=>'5-Jan-2018','status'=>'due','amount'=>'90500.90'],
			'3'=>['patient'=>'Rahul Singh','treatment'=>'Treatment 1','treatment_date'=>'20-Jan-2018','request_date'=>'5-Jan-2018','status'=>'paid','amount'=>'44500.90'],
			'4'=>['patient'=>'Om Prakash Mali','treatment'=>'Treatment 1','treatment_date'=>'20-Jan-2018','request_date'=>'5-Jan-2018','status'=>'due','amount'=>'2500.90'],
			'5'=>['patient'=>'Sonu Sharma','treatment'=>'Treatment 1','treatment_date'=>'20-Jan-2018','request_date'=>'5-Jan-2018','status'=>'paid','amount'=>'5980.9']
		];

		$col = $this->add('Columns');
		$col1 = $col->addColumn('6');
		$col2 = $col->addColumn('6');

		$col1->add('View')->setElement('h2')->set('Daily Cash Flow');
		$grid = $col1->add('Grid');
		$grid->setSource($data);
		$grid->addColumn('patient');
		$grid->addColumn('treatment');
		$grid->addColumn('request_date');
		$grid->addColumn('amount');						
		$grid->addColumn('status');						

		$col2->add('View')->setElement('h2')->set('Daily Cash Flow Report');
		$col2->add('View')->setElement('img')->setAttr('src','../shared/apps/xavoc/ivf/templates/img/payment_grow.png')->setStyle('width','100%');

	}
}