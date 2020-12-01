<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'website',
        'html',
        'image',
        'addresses'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function companyAddress()
    {
        return $this->belongsTo(CompanyAddress::class, 'company_id', 'id');
    }

    /**
     * @return false|string
     */
    public function getCompanyCreatedAtAttribute(){
        return Carbon::parse($this->createdAt)->format('d.m.Y');
    }

    /**
     * @return false|string
     */
    public function getCompanyUpdatedAtAttribute(){
        return Carbon::parse($this->createdAt)->format('d.m.Y');
    }
}
