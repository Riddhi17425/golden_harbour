<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Inquires extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'inquiries';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'number',
        'company_name',
        'city',
        'subject',
        'message'
    ];
}