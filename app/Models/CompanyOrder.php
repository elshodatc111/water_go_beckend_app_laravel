<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyOrder extends Model
{
    protected $fillable = [
        'company_id',
        'user_id',
        'lang',
        'latude',
        'addres',
        'price',
        'status',
        'star',
        'comment',
        'currer_id',
    ];
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function currer(){
        return $this->belongsTo(User::class);
    }

}
