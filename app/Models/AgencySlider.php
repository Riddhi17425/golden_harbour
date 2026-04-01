<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgencySlider extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'agency_slider';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];
}