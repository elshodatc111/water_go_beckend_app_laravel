<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyItem extends Model{
        
    protected $fillable = [
        'company_id', 
        'hajm', 
        'price', 
        'icon_url', 
        'admin_id'
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }
}
