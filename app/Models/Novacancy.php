<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Novacancy extends Model
{
    use HasFactory;
    protected $table = 'no_vacancy_form';
    protected $primarykey = 'id';
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'current_location',
        'linked_in',
        'resume',
    ];
}