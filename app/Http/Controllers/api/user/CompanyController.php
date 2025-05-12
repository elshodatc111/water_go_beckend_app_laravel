<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Company;
use App\Models\CompanyItem;
use App\Models\CompanyUser;
use App\Models\CompanyLocation;

class CompanyController extends Controller{
    public function apiGet(){
        $Company = Company::where('status','true')->get();
        $res = [];
        foreach ($Company as $key => $value) {
            $res[$key]['id'] = $value->id;
            $res[$key]['title'] = $value->company_name;
            $res[$key]['star'] = $value->star."(".$value->star_count.")";
            $res[$key]['price'] = number_format($value->price, 0, '.', ',')." so'm";
            $res[$key]['image_url'] = $value->banner_url;
        }
        return response()->json($res,200);
    }

    public function apiGetShow($id){
        $Company = Company::find($id);
        $CompanyLocation = CompanyLocation::where('company_id',$id)->get();
        $loc = [];
        foreach ($CompanyLocation as $key => $value) {
            $loc[$key]['min_lat'] = $value->lat_man;
            $loc[$key]['min_lang'] = $value->lang_man;
            $loc[$key]['max_lat'] = $value->lat_max;
            $loc[$key]['max_lang'] = $value->lang_max;
        }
        $res = [
            'id'=> $id,
            "image"=>$Company->banner_url,
            'title'=> $Company->company_name,
            'star'=> $Company->star,
            'star_str'=> $Company->star." (".$Company->star_count.")",
            'price'=> $Company->price,
            'description'=>$Company->description,
            "lacation" => $loc
        ];
        return response()->json($res,200);
    }


}
