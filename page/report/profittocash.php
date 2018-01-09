<?php

namespace xavoc\ivf;

class page_report_profittocash extends \xepan\base\Page{
	public $title = "Profit To cash Report";

	function init(){
		parent::init();
		
		
				$this->add('View')->setElement('img')->setAttr('src','../shared/apps/xavoc/ivf/templates/img/report.png')->setStyle('width','100%');			
	}
}