<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ValuableClient extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $table = 'clients';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];

}