<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'wilayah';

    public function registrasi(){
        return $this->hasOne('App\RegWilayah', 'wilayah_id', 'wilayah_id');
    }
    public function parent()
    {
        return $this->hasOne('App\Wilayah', 'wilayah_id', 'parent_id');
    }
}
