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
        $this->app->top_menu->getMenuName('Epans',true)->destroy();

        $m = $this->app->top_menu->addMenu('System');
            $m->addItem(['Opportunity Steps','icon'=>'fa fa-sliders'],$this->app->url('xepan_commerce_item',['status'=>'Active']));

        $m = $this->app->top_menu->addMenu('Masters');
            $m->addItem(['Items','icon'=>'fa fa-sliders'],$this->app->url('xepan_commerce_item',['status'=>'Active']));
            $m->addItem(['Treatments & Procedures','icon'=>'fa fa-sliders'],$this->app->url('xepan_hr_department',['status'=>'Active']));
            $m->addItem(['Doctors','icon'=>'fa fa-sliders'],$this->app->url('xepan_hr_department',['status'=>'Active']));
            $m->addItem(['Agents','icon'=>'fa fa-sliders'],$this->app->url('xepan_hr_department',['status'=>'Active']));
            $m->addItem(['Patients','icon'=>'fa fa-sliders'],$this->app->url('xepan_hr_department',['status'=>'Active']));
            $m->addItem(['Doners','icon'=>'fa fa-sliders'],$this->app->url('xepan_hr_department',['status'=>'Active']));
            $m->addItem(['Vendors','icon'=>'fa fa-sliders'],$this->app->url('xepan_hr_department',['status'=>'Active']));

        $m = $this->app->top_menu->addMenu('HR');
            $m->addItem(['Department','icon'=>'fa fa-sliders'],$this->app->url('xepan_hr_department',['status'=>'Active']));
            $m->addItem(['Post','icon'=>'fa fa-sliders'],$this->app->url('xepan_hr_department',['status'=>'Active']));
            $m->addItem(['Employees','icon'=>'fa fa-sliders'],$this->app->url('xepan_hr_department',['status'=>'Active']));

        $m = $this->app->top_menu->addMenu('Marketing');
            $m->addItem(['Leads','icon'=>'fa fa-sliders'],$this->app->url('xepan_hr_department',['status'=>'Active']));
            $m->addItem(['Newsletter','icon'=>'fa fa-sliders'],$this->app->url('xepan_hr_department',['status'=>'Active']));
            $m->addItem(['Tele Calling','icon'=>'fa fa-sliders'],$this->app->url('xepan_hr_department',['status'=>'Active']));
            $m->addItem(['NEwsLetter Scheduling','icon'=>'fa fa-sliders'],$this->app->url('xepan_hr_department',['status'=>'Active']));
        
        $m = $this->app->top_menu->addMenu('Sales Process');
            $m->addItem(['Prospects Status','icon'=>'fa fa-sliders'],$this->app->url('xepan_hr_department',['status'=>'Active']));
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

}
