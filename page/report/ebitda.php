<?php

namespace xavoc\ivf;

class page_report_ebitda extends \xepan\base\Page{
	public $title = "EBITDA Report";

	function init(){
		parent::init();
		
		$col = $this->add('Columns');
		$col1 = $col->addColumn('6');
		$col2 = $col->addColumn('6');

		$col1->add('View')->setElement('h2')->set('EBITDA Chart');
		$col1->add('View')->setElement('img')->setAttr('src','../shared/apps/xavoc/ivf/templates/img/ebitda-charts.png')->setStyle('width','100%');
		$col2->add('View')->setElement('img')->setAttr('src','../shared/apps/xavoc/ivf/templates/img/payment_grow.png')->setStyle('width','100%');
		
	}
}