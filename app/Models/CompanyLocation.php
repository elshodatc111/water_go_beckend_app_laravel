<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyLocation extends Model
{
    protected $fillable = [
        'company_id',
        'lat_max',
        'lat_man',
        'lang_max',
        'lang_man',
    ];
    
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
