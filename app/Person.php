<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    protected $table = 'persons';

    use SoftDeletes;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    /**
     * @return string
     */
    public function getFullNameAttribute(){
        return $this->name.' '.$this->surname;
    }

    /**
     * @return false|string
     */
    public function getPersonCreatedAtAttribute($item){
        return Carbon::parse($this->createdAt)->format('d.m.Y');
    }

    /**
     * @return false|string
     */
    public function getPersonUpdatedAtAttribute(){
        return Carbon::parse($this->updatedAt)->format('d.m.Y');
    }
}
