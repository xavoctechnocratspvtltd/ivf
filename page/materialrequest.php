<?php

namespace xavoc\ivf;

class page_materialrequest extends \xepan\base\Page{
	public $title = "Material Request";

	function init(){
		parent::init();

		$btnset = $this->add('ButtonSet');
		$btnset->add('Button')->set('Filters: ')->addClass('btn btn-default');
		$btnset->add('Button')->set('Show Storage Location Only')->addClass('btn btn-primary');
		$btnset->add('Button')->set('Show Main Store Only')->addClass('btn btn-default');
		$btnset->add('Button')->set('Show Store HO Only')->addClass('btn btn-danger');
		$btnset->add('Button')->set('Show Director Pruchase Only')->addClass('btn btn-warning');


		$supplier_id = $this->app->stickyGET('supplier_id');
		$purchaseorder = $this->add('xepan\commerce\Model_PurchaseOrder');
		$purchaseorder->add('xepan\commerce\Controller_SideBarStatusFilter');

		if($supplier_id)
			$purchaseorder->addCondition('contact_id',$supplier_id);

		$purchaseorder->add('misc/Field_Callback','net_amount_client_currency')->set(function($m){
			return $m['exchange_rate'] == '1'? "": ($m['net_amount'].' '. $m['currency']);
		});

		$purchaseorder->addExpression('contact_type',$purchaseorder->refSQL('contact_id')->fieldQuery('type'));

		$crud=$this->add('xepan\hr\CRUD',
						['action_page'=>'xepan_commerce_quickqsp&document_type=PurchaseOrder']
						,null,
						['view/order/purchase/grid']);


		$crud->setModel($purchaseorder)->setOrder('created_at','desc');
		$crud->grid->addPaginator(50);
		$frm=$crud->grid->addQuickSearch(['contact','document_no']);
		
		$crud->add('xepan\base\Controller_Avatar',['name_field'=>'contact']);
		$crud->add('xepan\base\Controller_MultiDelete');
		if(!$crud->isEditing()){
			$crud->grid->js('click')->_selector('.do-view-frame')->univ()->frameURL('Purchase Invoice Details',[$this->api->url('xepan_commerce_purchaseorderdetail'),'document_id'=>$this->js()->_selectorThis()->closest('[data-purchaseinvoice-id]')->data('id')]);
			$crud->grid->js('click')->_selector('.do-view-supplier-frame')->univ()->frameURL('Supplier Details',[$this->api->url('xepan_commerce_supplierdetail'),'contact_id'=>$this->js()->_selectorThis()->closest('[data-contact-id]')->data('contact-id')]);
		}	
		
	}
}