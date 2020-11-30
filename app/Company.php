<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'website', 'html','image','addresses'];


    public function companyAddress()
    {
        return $this->belongsTo(CompanyAddress::class, 'company_id', 'id');
    }

    /**
     * @return false|string
     */
    public function getCompanyCreatedAtDateAttribute(){
        return date('d.m.Y', strtotime($this->created_at));
    }

    public function getCompanyUpdatedAtDateAttribute(){
        return date('d.m.Y', strtotime($this->updated_at));
    }

    public function getCompanyCreatedAtAttribute(){
        return date('d.m.Y H:i', strtotime($this->created_at));
    }

    public function getCompanyUpdatedAtAttribute(){
        return date('d.m.Y H:i', strtotime($this->updated_at));
    }
}
