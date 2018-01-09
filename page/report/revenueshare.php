<?php

namespace xavoc\ivf;

class page_report_revenueshare extends \xepan\base\Page{
	public $title = "Revenue Share Report";

	function init(){
		parent::init();
		
				$this->add('View')->setElement('img')->setAttr('src','../shared/apps/xavoc/ivf/templates/img/report.png')->setStyle('width','100%');		
	}
}