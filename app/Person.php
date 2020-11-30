<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    protected $table = 'persons';

    use SoftDeletes;

    public function getFullNameAttribute(){
        return $this->name.' '.$this->surname;
    }

    public function getPersonCreatedAtDateAttribute(){

        return date('d.m.Y', strtotime($this->created_at));

    }

    public function getPersonUpdatedAtDateAttribute(){

        return date('d.m.Y', strtotime($this->updated_at));

    }

    public function getPersonCreatedAtAttribute(){

        return date('d.m.Y H:i', strtotime($this->created_at));

    }

    public function getPersonUpdatedAtAttribute(){

        return date('d.m.Y H:i', strtotime($this->updated_at));

    }
}
