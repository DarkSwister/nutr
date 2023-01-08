<?php

namespace App\Http\Controllers;

use App\Models\Invertor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StaterkitController extends Controller
{

    // home
    public function home()
    {
        $breadcrumbs = [
            ['link' => "", 'name' => "Home"], ['name' => "Power Overview"]
        ];
        return view('/content/home', ['breadcrumbs' => $breadcrumbs]);
    }



    public function platform_users()
    {
        $breadcrumbs = [
            ['link' => "", 'name' => "Home"], ['name' => "Platform Users"]
        ];

        return view('/content/platform-users', ['breadcrumbs' => $breadcrumbs]);
    }

    public function solar_parks()
    {
        $breadcrumbs = [
            ['link' => "", 'name' => "Home"], ['name' => "Solar parks"]
        ];

        return view('/content/solar-parks', ['breadcrumbs' => $breadcrumbs]);
    }

    public function companies()
    {
        $breadcrumbs = [
            ['link' => "", 'name' => "Home"], ['name' => "Companies"]
        ];

        return view('/content/companies', ['breadcrumbs' => $breadcrumbs]);
    }

    public function company_details($company)
    {
        $breadcrumbs = [
            ['link' => "", 'name' => "Home"], ['name' => "Companies"], ['name' => "Company"]
        ];

        return view('/content/company-details', ['breadcrumbs' => $breadcrumbs]);
    }

    public function device_details($device)
    {
        $inverter = Invertor::where('id',$device)->first();
        $breadcrumbs = [
            ['link' => "", 'name' => "Home"], ['name' => "Inverter Overview", 'link' => route('inverters')], ['name' => $inverter->name]
        ];
        return view('/content/device-detail', ['breadcrumbs' => $breadcrumbs, 'inverter' => $inverter]);
    }



    public function demo($type = null)
    {
        $breadcrumbs = [
            ['link' => "", 'name' => "Home"], ['name' => "Demo"]
        ];
        if($type === 'apex') {
            return view('/content/demo-apex-chart', ['breadcrumbs' => $breadcrumbs]);
        }
        return view('/content/demo', ['breadcrumbs' => $breadcrumbs]);
    }

    public function setting(string $type = 'dark') {
        Session::put('theme_color', htmlspecialchars($type));
        return response()->json(['success', Session::get('theme_color')]);
    }
}
