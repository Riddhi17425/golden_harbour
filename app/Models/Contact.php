<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Contact extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'contacts';
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