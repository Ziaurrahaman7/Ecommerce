<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','sku','slug','category_id','user_id','price','discount','description','
        shiping_cost','shiping_address','stock','visibility','is_promoted','promote_start_date','promote_end_date'
    ];
   public function productImage(){
    return $this->hasMany(ProductImage::class, 'product_id');
   }
   public function category(){
    return $this->belongsTo(Category::class, 'category_id');
   }
}
