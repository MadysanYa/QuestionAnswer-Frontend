<?php

namespace App\Http\Controllers;
use App\Models\Commune;
use App\Models\PropertyIndicator;
use Encore\Admin\Controllers\AdminController;
use App\Models\Transfer;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class PropertyIndicatorController extends Controller
{


    public function verified(Request $request) 
    {


        $propertyIndicator = PropertyIndicator::findOrFail($request->id);
        $propertyIndicator->is_verified = $request->value;
        $propertyIndicator->save();
        return Redirect::to(url()->previous());

    }

    public function approved(Request $request)
    {

        //echo $request->id;
        $propertyIndicator = PropertyIndicator::findOrFail($request->id);
        $propertyIndicator->is_approved = $request->value;
        $propertyIndicator->save();
        return Redirect::to(url()->previous());
        // $verifieds = $request->get('q');
        // $verified = PropertyIndicator::where('id', $verifieds)->get(['id', DB::raw('verified as text')]);
		// return $verified;

    }

}
