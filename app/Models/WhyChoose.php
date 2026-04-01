<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WhyChoose extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $table = 'why_choose';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];

}