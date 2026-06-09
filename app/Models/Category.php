<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'category';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];
    protected $casts = [
        'faqs' => 'array',
    ];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

}
