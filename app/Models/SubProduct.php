<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubProduct extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'subproduct';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
        public function category()
    {
        return $this->belongsTo(Category::class);
    }
            public function industry()
    {
        return $this->hasMany(Industry::class, 'product_id');
    }
}