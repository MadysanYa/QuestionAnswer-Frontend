<?php

namespace App\Admin\Controllers;

use App\Models\PropertyResearch;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Branch;
use App\Models\contracts;
use Encore\Admin\Layout\Content;

use Illuminate\Support\Facades\Request;

class PropertyResearchConteroller extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */

    //  Title to view
    protected $title = 'Property Research Management';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    public function index(Content $content){
        $content->header($this->title);
        $content->body($this->dashboard());
        $content->body($this->grid());
        return $content;
}

    protected function dashboard(){


		$title1 = "Done";
		// $value1 = $Done;
		$title2 = "Pending";
		// $value2 = $Pending;
		$title3 = "Progressing";
		// $value3 = $Progressing;
		$title4 = "ETC";
		// $value4 = $ETC;

            $html = <<<HTML
            <h1>Dashboard Show Testing</h1>
            
            <div class="row">
                <div class="col-lg-3" style="padding: 0 10px 15px 15px; height: 100px;text-align: center;">
                        <div style="background-color:#abffbd;height: 100%;width: 100%; font-size: 24px;font-weight: bold;padding: 10px; border-radius: 10px; box-shadow: rgba(50,50,93,0.25) 0px 6px 12px -2px, rgba(0,0,0, 0.3) 0px 3px 7px -3px;">
                        {{title1}}
                            <!-- <label style="font-size: 40px; font-weight: bold;margin-left: 20px;">{{value1}}</label> -->
                        </div>
                </div>
                <div class="col-lg-3" style="padding: 0 15px 15px 15px; height: 100px;text-align: center;">
                        <div style="background-color:#ffc0ab;height: 100%;width: 100%; font-size: 24px;font-weight: bold;padding: 10px; border-radius: 10px; box-shadow: rgba(50,50,93,0.25) 0px 6px 12px -2px, rgba(0,0,0, 0.3) 0px 3px 7px -3px;">
                        {{title2}}
                            <!-- <label style="font-size: 40px; font-weight: bold;margin-left: 20px;">{{value2}}</label> -->
                        </div>
                </div>
                <div class="col-lg-3" style="padding: 0 15px 15px 15px; height: 100px;text-align: center;">
                        <div style="background-color:#f1fa75;height: 100%;width: 100%; font-size: 24px;font-weight: bold;padding: 10px; border-radius: 10px; box-shadow: rgba(50,50,93,0.25) 0px 6px 12px -2px, rgba(0,0,0, 0.3) 0px 3px 7px -3px;">
                        {{title3}}
                            <!-- <label style="font-size: 40px; font-weight: bold;margin-left: 20px;">{{value3}}</label> -->
                        </div>
                </div>
                <div class="col-lg-3" style="padding: 0 15px 15px 15px; height: 100px;text-align: center;">
                        <div style="background-color:red;height: 100%;width: 100%; font-size: 24px;font-weight: bold;padding: 10px; border-radius: 10px; box-shadow: rgba(50,50,93,0.25) 0px 6px 12px -2px, rgba(0,0,0, 0.3) 0px 3px 7px -3px;">
                        {{title4}}
                            <!-- <label style="font-size: 40px; font-weight: bold;margin-left: 20px;">{{value4}}</label> -->
                        </div>
                </div>
                
            
            </div>
        HTML;

        $html = str_replace('{{title1}}',$title1,$html);
		// $html = str_replace('{{value1}}',$value1,$html);
		$html = str_replace('{{title2}}',$title2,$html);
		// $html = str_replace('{{value2}}',$value2,$html);
		$html = str_replace('{{title3}}',$title3,$html);
		// $html = str_replace('{{value3}}',$value3,$html);
		$html = str_replace('{{title4}}',$title4,$html);
		// $html = str_replace('{{value4}}',$value4,$html);

        return $html;
     }
    
    protected function grid()
    {
        $grid = new Grid(new PropertyResearch);
		$grid->model()->orderBy('id','desc');
		$grid->column('id', __('No.'))->desc()->sortable();
        $grid->column('reference', __('Reference'));
        $grid->column('owner', __('Owner'));
        $grid->column('type', __('Type'));
        $grid->column('property_address', __('Property Address'));
        $grid->column('geo_code', __('Geo Code'));
		
		
		// No need to change (hided)
        $grid->disableExport();
        $grid->disableFilter();

        $grid->quickSearch('id','department', 'responsible_person');
		
	

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show( PropertyResearch::findOrFail($id));
        $show->field('reference', __('Reference'));
        $show->field('owner', __('Owner '));
        $show->field('type',__('Type'));
        $show->field('property_address ',__('Property Address '));
        // $show->field('geo_code',__('Geo Code'));
        // $show->field('region',__('Region'));
        // $show->field('branch',__('Branch'));
        // $show->field('requested_date',__('Requested Date'));
        // $show->field('cif_no',__('CIF No.'));
        // $show->field('loan_officer',__('Loan Officer'));
        // $show->field('telephone',__('Telephone'));
        // $show->field('information_type',__('Information Type'));
        // $show->field('location_type',__('Location Type'));
        // $show->field('type_ofaccess_road',__('Type of Access Road'));
        // $show->field('access_name',__('Access Road Name'));
        // $show->field('property_type',__('Property Type'));
        // $show->field('building_status',__('Building Status'));
        // $show->field('borey',__('Borey')); 
        // $show->field('no_floor',__('No. of floor'));
        // $show->field('land_titletype',__('Land Titil'));
        // $show->field('land_titleno',__('Lang Title No'));
        // $show->field('land_size',__('Land Size'));
        // $show->field('building_size',__('Building Size'));
        // $show->field('customer_name',__('Customer Name'));
        // $show->field('client_contact',__('Cliend Contact'));
        // $show->field('province',__('Province'));
        // $show->field('district',__('District/Khan'));
        // $show->field('commune',__('Commune/Sangkat'));
        // $show->field('village',__('Village'));
        // $show->field('altitude',__('Altitude'));
        // $show->field('latitude',__('Latitude'));
        // $show->field('photo',__('Photo'));
        // $show->field('remark',__('Remark'));
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PropertyResearch());

        $form->column(1/2, function ($form){
            $form->select('information_type', __('Information Type'))->option(['pp' => 'Phnom Penh', 'sr' => 'Siem Reap']);
            $form->text('property_reference', __('Property Reference'));
            $form->text('access_road_name', __('Access Road Name'));
            $form->text('no_of_floor', __('No of Floor'));
            $form->text('land_size', __('Land Size'));
            $form->text('build_value_per_sqm', __('Build Value per Sqm'));
            $form->select('district', __('District/Khan'))->option(['psc' => 'Pursen Chey', 'ss' => 'Sen Sok']);
            $form->text('contact_no', __('Contact No.'));
            $form->text('remark', __('Remark'));
        });

        $form->column(1/2, function ($form){
            $form->select('location_type', __('Location Type'))->option(['rsda' => 'Residential Area', 'cmc' => 'Commercial Area']);
            $form->select('property_type', __('Property Type'))->option(['fh' => 'Flat House', 'lh' => 'Link House']);
            $form->select('land_title_type', __('Land Title Type'))->option(['ht' => 'Hard Title', 'st' => 'Soft Title']);
            $form->text('property_value_per_sqm', __('Property per Sqm'));
            $form->text('property_market_value', __('Property Market Value'));
            $form->select('commune', __('Commune/Sangkat'))->option(['cc' => '', 'ss' => 'Sen Sok']);
            
        });		

        // Other
        // $form->column(1/2, function ($form){
        //     $form->select('region',__('Region'))->options(['Phnom Penh'=>'Phnom Penh', 'Siem Reap'=>'Siem Reap']);
        //     $form->select('branch',__('Branch'))->options(['LC'=>'8187(LOAN CENTER)','CC'=>'8186(CARLOAN CENTER)','CLB'=>'8185(COMMERCIAL LENDING BUSINESS)']);
        //     $form->date('requested_date', __('Requested Date'))->rules('required');
        //     $form->text('cif_no', __('CIF No.'))->rules('required');
        //     $form->text('loan_officer', __('Loan Officer'))->rules('required');
        //     $form->text('reference', __('Property Reference '))->rules('required');
        //     $form->text('access_name', __('Access Road Name'))->rules('required');
        //     $form->text('borey', __('Borey'))->rules('required');
        //     $form->text('land_titleno', __('Land title No'))->rules('required');
        //     $form->text('telephone', __('Telephone'))->rules('required');
        //     $form->select('location_type', __('Location Type'))->options(['Residential Area'=>'Residential Area', 'CA'=>'Commercial Area','IA'=>'Industrial Area']);
        //     $form->select('property_type', __('Property Type'))->options(['Vacant Land'=>'Vacant Land','FH'=>'Flat House','CD'=>'Cando']);
        //     $form->text('no_floor', __('No. of Floor'))->rules('required');
        //     $form->text('land_size', __('Land Size'))->rules('required');
        //     $form->select('information_type', __('Information Type'))->options(['Indication'=>'Indication']);
        //     $form->select('type_ofaccess_road', __('Type of Access Road'))->options(['NR'=>'National Road', 'PR'=>'Paved Road','UR'=>'Unpaved Road']);
        //     $form->text('building_status', __('Building Status'))->rules('required');
        //     $form->select('land_titletype', __('Land Title Type'))->options(['HT'=>'Hard Title', 'ST'=>'Soft Title']);
        //     $form->text('building_size', __('Building Size'))->rules('required');
        // });
       
            
        // $form->column(1/2, function ($form){
        //     $form->text('owner', __('Collateral Owner'))->rules('required');
        //     $form->select('province', __('Province'))->options(['Phnom Penh'=>'Phnom Penh', 'Takeo'=>'Takeo','Siem Reap'=>'Siem Reap']);
        //     $form->text('village', __('Village'))->rules('required');
        //     $form->multipleFile('photo', __('Photo'))->removable();
        //     $form->text('customer_name', __('Customer Name '))->rules('required');
        //     $form->select('district', __('District/Khan'))->options(['Sen Sok'=>'Sen Sok', 'Tuol Kouk'=>'Tuol Kouk']);
        //     $form->text('altitude', __('Altitude'))->rules('required');
        //     $form->text('remark', __('Remark'))->rules('required');
        //     $form->text('client_contact', __('client Contact No. '))->rules('required');
        //     $form->select('commune', __('Commune/Sangkat'))->options(['Tuek Thla'=>'Tuek Thla', 'PD'=>' Phsar Depou Ti Muoy']);
        //     $form->text('latitude', __('Latitude'))->rules('required');
          
        // });

        $form->footer(function ($footer) {

            // disable reset btn
            $footer->disableReset();
            // disable `View` checkbox
            $footer->disableViewCheck();
            // disable `Continue editing` checkbox
            $footer->disableEditingCheck();
            // disable `Continue Creating` checkbox
            $footer->disableCreatingCheck();
        
        });


        return $form;
    }
}