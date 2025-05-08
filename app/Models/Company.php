<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model{

    protected $fillable = [
        'company_name',
        'star',
        'star_count',
        'status',
        'price',
        'balans',
        'order_price',
        'icon_url',
        'banner_url',
        'description',
        'lang_one',
        'lang_two',
        'lat_one',
        'lat_two',
        'admin_id'
    ];

    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function items(){
        return $this->hasMany(CompanyItem::class);
    }

    public function users(){
        return $this->hasMany(CompanyUser::class);
    }

}
