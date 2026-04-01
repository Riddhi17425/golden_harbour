<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductEnquiry extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'product_enquiry_form';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
}
