<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected  $guarded = [];

    protected $appends = ['logo_path'];


    public function getLogoPathAttribute(){

        return asset('storage/companies/'. $this->logo);
    }

}
