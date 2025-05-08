<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyUser extends Model{
    protected $fillable = [
        'company_id', 
        'admin_id'
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }
}
