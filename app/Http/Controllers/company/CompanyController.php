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
use App\Http\Requests\StoreCompanyRequest;

class CompanyController extends Controller{
    public function index(){
        $Company = Company::get();
        return view('company.index',compact('Company'));
    }
    public function store(StoreCompanyRequest $request){
        if ($request->hasFile('icon_url')) {
            $file = $request->file('icon_url');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/icons');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $filename);
            $iconPath = 'uploads/icons/' . $filename;
        }
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
        Company::create([
            'company_name' => $request->company_name,
            'price' => $request->price,
            'order_price' => $request->order_price,
            'icon_url' => $iconPath,
            'banner_url' => $bannerPath,
            'description' => $request->description,
            'lat_one' => $request->lat_one,
            'lang_one' => $request->lang_one,
            'lat_two' => $request->lat_two,
            'lang_two' => $request->lang_two,
            'admin_id' => auth()->id(),
        ]);
        return redirect()->back()->with('success', 'Company saved successfully!');
    }




}
