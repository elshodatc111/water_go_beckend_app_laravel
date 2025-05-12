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
        'admin_id'
    ];

    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function users(){
        return $this->hasMany(CompanyUser::class);
    }

    public function location(){
        return $this->hasMany(CompanyLocation::class);
    }


}
