<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VacancyForm extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'vacancyform';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'current_location',
        'linked_link',
        'resume_path',
    ];
}
