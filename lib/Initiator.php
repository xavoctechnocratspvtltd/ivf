<?php

namespace xavoc\ivf;

class Initiator extends \Controller_Addon {
    
    public $addon_name = 'xavoc_ivf';

    function setup_admin(){
        $this->routePages('xavoc_ivf');
        $this->addLocation(array('template'=>'templates','js'=>'templates/js','css'=>'templates/css'))
        ->setBaseURL('../shared/apps/xavoc/ivf/');


        if(!$this->app->isAjaxOutput())
            $this->manageIVFMenu();

        return $this;
    }

    function setup_pre_frontend(){
        $this->routePages('xavoc_ivf');
        $this->addLocation(array('template'=>'templates','js'=>'templates/js','css'=>'templates/css'))
        ->setBaseURL('./shared/apps/xavoc/ivf/');

        return $this;
    }

    function setup_frontend(){
        $this->routePages('xavoc_ivf');
        $this->addLocation(array('template'=>'templates','js'=>'templates/js','css'=>'templates/css'))
        ->setBaseURL('./shared/apps/xavoc/ivf/');

        // {export_tools_here}

        return $this;
    }


    function manageIVFMenu(){

        $this->app->top_menu->getMenuName('HR',true)->destroy();
        $this->app->top_menu->getMenuName('CMS',true)->destroy();
        $this->app->top_menu->getMenuName('Production',true)->destroy();
        $this->app->top_menu->getMenuName('Reports',true)->destroy();
        $this->app->top_menu->getMenuName('Account',true)->destroy();
        $this->app->top_menu->getMenuName('Commerce',true)->destroy();
        $this->app->top_menu->getMenuName('Marketing',true)->destroy();
        $this->app->top_menu->getMenuName('Projects',true)->destroy();
        $this->app->top_menu->getMenuName('Support',true)->destroy();

        $m = $this->app->top_menu->addMenu('System');
            $m->addItem(['Opportunity Steps','icon'=>'fa fa-sliders'],$this->app->url('xavoc_ivf_system_opportunitystep',['status'=>'Active']));
        
        $m = $this->app->top_menu->addMenu('Masters');
            $m->addItem(['Items','icon'=>'fa fa-sliders'],$this->app->url('xepan_commerce_item',['status'=>'Active']));
            $m->addItem(['Treatments & Procedures','icon'=>'fa fa-sliders'],$this->app->url('xavoc_ivf_master_treatment',['status'=>'Active']));
            $m->addItem(['Doctors','icon'=>'fa fa-sliders'],$this->app->url('xavoc_ivf_master_doctor',['status'=>'Active']));
            $m->addItem(['Agents','icon'=>'fa fa-sliders'],$this->app->url('xavoc_ivf_master_agent',['status'=>'Active']));
            $m->addItem(['Patients','icon'=>'fa fa-sliders'],$this->app->url('xavoc_ivf_master_patient',['status'=>'Active']));
            $m->addItem(['Doners','icon'=>'fa fa-sliders'],$this->app->url('xavoc_ivf_master_doner',['status'=>'Active']));
            $m->addItem(['Vendors','icon'=>'fa fa-sliders'],$this->app->url('xavoc_ivf_master_vendor',['status'=>'Active']));

        $m = $this->app->top_menu->addMenu('HR');
            $m->addItem(['Department','icon'=>'fa fa-sliders'],$this->app->url('xepan_hr_department',['status'=>'Active']));
            $m->addItem(['Post','icon'=>'fa fa-cog'],$this->app->url('xepan_hr_post',['status'=>'Active']));
            $m->addItem(['Employees','icon'=>'fa fa-cog'],$this->app->url('xepan_hr_employee',['status'=>'Active']));
            $m->addItem(['User Login Account','icon'=>'fa fa-cog'],$this->app->url('xepan_hr_user',['status'=>'Active']));
            $m->addItem(['ACL','icon'=>'fa fa-cog'],$this->app->url('xepan_hr_aclmanagement'));
            $m->addItem(['Configuration','icon'=>'fa fa-cog'],$this->app->url('xepan_hr_workingweekday',['status'=>'Active']));

        $m = $this->app->top_menu->addMenu('Marketing');
            // $m->addItem(['Strategy Planning','icon'=>'fa fa-gavel'],'xepan_marketing_strategyplanning');
            $m->addItem(['Category Management','icon'=>'fa fa-sitemap'],'xepan_marketing_marketingcategory');
            $m->addItem(['Lead','icon'=>'fa fa-users'],$this->app->url('xepan_marketing_lead',['status'=>'Active']));
            $m->addItem(['Lead Assign','icon'=>'fa fa-users'],$this->app->url('xepan_marketing_employeeleadassign'));
            $m->addItem(['Opportunity','icon'=>'fa fa-user'],$this->api->url('xepan_marketing_opportunity',['watchable'=>true]));
            $m->addItem(['Newsletter','icon'=>'fa fa-envelope-o'],$this->app->url('xepan_marketing_newsletter',['status'=>'Draft,Submitted,Approved']));
            // $m->addItem(['Social Content','icon'=>'fa fa-globe'],$this->app->url('xepan_marketing_socialcontent',['status'=>'Draft,Submitted,Approved']));
            $m->addItem(['Tele Marketing','icon'=>'fa fa-phone'],'xepan_marketing_telemarketing');
            $m->addItem(['SMS','icon'=>'fa fa-envelope-square'],$this->app->url('xepan_marketing_sms',['status'=>'Draft,Submitted,Approved']));
            $m->addItem(['Campaign','icon'=>'fa fa-bullhorn'],$this->app->url('xepan_marketing_campaign',['status'=>'Draft,Submitted,Redesign,Approved,Onhold']));
            $m->addItem(['Schedule Timeline','icon'=>'fa fa-bullhorn'],$this->app->url('xepan_marketing_scheduletimeline'));
            $m->addItem(['Day by Day Analytics','icon'=>'fa fa bar-chart-o'],$this->app->url('xepan_marketing_daybydayanalytics'));
            // $m->addItem(['Reports','icon'=>'fa fa-cog'],'xepan_marketing_report');
            $m->addItem(['Configuration','icon'=>'fa fa-cog'],'xepan_marketing_socialconfiguration');
        
        $m = $this->app->top_menu->addMenu('Sales Process');
            $m->addItem(['Prospects Status','icon'=>'fa fa-sliders'],$this->app->url('xavoc_ivf_prospectstatus'));
            $m->addItem(['Leads','icon'=>'fa fa-sliders'],$this->app->url('xepan_hr_department',['status'=>'Active']));

        $m = $this->app->top_menu->addMenu('Process and Managemenet');
        $m = $this->app->top_menu->addMenu('Stock And Inventory');
        $m = $this->app->top_menu->addMenu('Analytics & Reports');

        // $hr_menu = $this->app->top_menu->getMenuName('HR',true);
        // $hr_menu->addItem(['Department','icon'=>'fa fa-sliders'],$this->app->url('xepan_hr_department',['status'=>'Active']))
        //             ;
        // $hr_menu->add('Order')
        //         ->move($this->app->top_menu->getMenuName('HR/Employee',true),'after',$this->app->top_menu->getMenuName('HR/User',true))
        //         ->now();
        
        // $this->app->top_menu->add('Order')
        //     ->move($this->app->top_menu->getMenuName('HR'),'last')
        //     ->now();
    }

    function exportEntities($app,&$array){
        $array['Treatment'] = ['caption'=>'Treatment','type'=>'DropDown','model'=>'xepan\commerce\Model_Treatment'];
    }        
}
