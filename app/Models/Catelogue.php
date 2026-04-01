<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catelogue extends Model
{
    use HasFactory;
    protected $table = 'catelogue_form';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'fullname',
    'company_name',
    'phone',
    'email',
    'message'
];

}