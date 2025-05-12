<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Company;
use App\Models\CompanyItem;
use App\Models\CompanyUser;
use App\Models\CompanyLocation;
use App\Http\Requests\StoreCompanyRequest;

class CompanyController extends Controller{
    public function index(){
        $Company = Company::get();
        return view('company.index',compact('Company'));
    }
    public function store(StoreCompanyRequest $request){
        if ($request->hasFile('banner_url')) {
            $file_banner = $request->file('banner_url');
            $filename_banner = time() . '_' . uniqid() . '.' . $file_banner->getClientOriginalExtension();
            $destinationPath_nammer = public_path('uploads/banner');
            if (!file_exists($destinationPath_nammer)) {
                mkdir($destinationPath_nammer, 0755, true);
            }
            $file_banner->move($destinationPath_nammer, $filename_banner);
            $bannerPath = 'uploads/banner/' . $filename_banner;
        }
        $Company = Company::create([
            'company_name' => $request->company_name,
            'price' => $request->price,
            'order_price' => $request->order_price,
            'banner_url' => $bannerPath,
            'description' => $request->description,
            'admin_id' => auth()->id(),
        ]);
        CompanyLocation::create([
            'company_id' => $Company->id,
            'lat_max' => $request->lat_one,
            'lat_man' => $request->lat_two,
            'lang_max' => $request->lang_one,
            'lang_man' => $request->lang_two,
        ]);
        return redirect()->back()->with('success', 'Company saved successfully!');
    }
    public function show($id){
        $Company = Company::find($id);
        return view('company.show',compact('Company'));
    }




}
