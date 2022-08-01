<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','sku','slug','category_id','user_id','price','discount','description','
        shiping_cost','shiping_address','feather_image','related_img','stock','visibility','is_promoted','promote_start_date','promote_end_date'
    ];
}
