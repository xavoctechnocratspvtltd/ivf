<?php

namespace xavoc\ivf;

class page_master_treatment extends \xepan\base\Page{
	public $title = "Treatment Master";

	function init(){
		parent::init();

		$treat = $this->add('xavoc\ivf\Model_Treatment');

		$crud = $this->add('xepan\hr\CRUD');
		$crud->setModel($treat);

		$crud->grid->removeColumn('created_by');
		$crud->grid->removeColumn('updated_by');
		$crud->grid->removeColumn('attachments_count');
		$crud->grid->removeAttachment();
		
	}
}