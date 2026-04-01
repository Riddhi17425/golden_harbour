<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeBanner extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $table = 'homepage_banner';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];

}