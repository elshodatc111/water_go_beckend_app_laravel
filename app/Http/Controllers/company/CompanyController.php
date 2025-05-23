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
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Requests\UpdateCompanyFileRequest;
use App\Http\Requests\CreateCompanyLocationRequest;
use App\Http\Requests\StoreUserCompanyRequest;

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
    public function company_user($id){
        $CompanyUser = CompanyUser::where('company_users.company_id',$id)->join('users','users.id','company_users.admin_id')->get();
        //dd($CompanyUser);
        return view('company.users',compact('id','CompanyUser'));
    }
    public function company_trash_user(Request $request){
        $id = $request->id;
        $user = User::find($id);
        $user->status='false';
        $user->save();
        return redirect()->back()->with('success', 'User Delete');
    }
    public function company_update_password_user(Request $request){
        $id = $request->id;
        $user = User::find($id);
        $user->password=Hash::make(12345678);
        $user->save();
        return redirect()->back()->with('success', 'User Update Password');
    }
    public function company_create_user(StoreUserCompanyRequest $request){
        $validated = $request->validated();
        $user = User::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'type' => $validated['status'],
            'status' => 'true',
            'email' => $validated['email'],
            'code' => 4567,
            'password' => Hash::make($validated['password']),
        ]);
        CompanyUser::create([
            'company_id' => $validated['id'],
            'admin_id' => $user->id,
        ]);
        return redirect()->back()->with('success', 'Create User');
    }

    public function show($id){
        $Company = Company::find($id);
        $CompanyLocation = CompanyLocation::where('company_id',$id)->get();
        return view('company.show',compact('Company','CompanyLocation'));
    }

    public function company_update(UpdateCompanyRequest $request){
        $Company = Company::find($request->id);
        $Company->company_name = $request->company_name;
        $Company->price = $request->price;
        $Company->order_price = $request->order_price;
        $Company->description = $request->description;
        $Company->save();
        return redirect()->back()->with('success', 'Company Update');
    }

    public function company_update_image(UpdateCompanyFileRequest $request){
        $validated = $request->validated();
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
        $Company = Company::find($request->id);
        $Company->banner_url = $bannerPath;
        $Company->save();
        return redirect()->back()->with('success', 'Fayl muvaffaqiyatli yangilandi!');
    }

    public function company_location_delete(Request $request){
        $id = intval($request->id);
        $Company = CompanyLocation::where('id', $id)->first();
        if (!$Company) {
            return redirect()->back()->with('error', 'Company location not found!');
        }
        $Company->delete();
        return redirect()->back()->with('success', 'Location deleted!');
    }

    public function create_location(CreateCompanyLocationRequest $request){
        $validated = $request->validated();
        CompanyLocation::create([
            'company_id' => $validated['id'],
            'lat_man' => $validated['lat_man'],
            'lat_max' => $validated['lat_max'],
            'lang_man' => $validated['lang_man'],
            'lang_max' => $validated['lang_max'],
        ]);
        return redirect()->back()->with('success', 'Location created successfully!');
    }

    public function company_update_change(Request $request){
        $Company = Company::find($request->id);
        $Company->status = $request->status;
        $Company->save();
        return redirect()->back()->with('success', 'Location updated successfully!');
    }

}
