<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyAddress extends Model
{
    protected $fillable = ['company_id','addresses'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function getAddressesAttribute($value)
    {
        return (array)json_decode($value);
    }

}
