<?php

namespace App;

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
    public function getPersonCreatedAtAttribute(){
        return date('d.m.Y H:i', strtotime($this->created_at));
    }

    /**
     * @return false|string
     */
    public function getPersonUpdatedAtAttribute(){
        return date('d.m.Y H:i', strtotime($this->updated_at));
    }
}
