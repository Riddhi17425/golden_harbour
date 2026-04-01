<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndustrySolution extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'industrial_solution';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];

}