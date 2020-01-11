<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class lokasi extends Model
{
    //
    use SoftDeletes;
    protected $table = 'lokasis';
    protected $dates = ['deleted_at'];
    protected $fillable = ['lokasis','slug_ina','slug_eng'];

}
