<?php

namespace App\Models\Shop;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'shop_products';

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'featured' => 'boolean',
        'is_visible' => 'boolean',
        'backorder' => 'boolean',
        'requires_shipping' => 'boolean',
        'published_at' => 'date',
    ];

    protected $fillable = [
        'shop_brand_id',
        'name', 
        'slug', 
        'sku', 
        'barcode',
        'description',
        'qty',
        'security_stock', 
        'featured', 
        'is_visible', 
        'old_price', 
        'price', 
        'cost', 
        'type',
        'back_order',
        'requires_shipping', 
        'seo_title', 
        'seo_description',
        'weight_value',
        'weight_unit', 
        'height_value', 
        'height_unit',
        'width_value',
        'width_unit',
        'depth_value',
        'depth_unit', 
        'volume_value',
        'volume_unit',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'shop_brand_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'shop_category_product', 'shop_product_id', 'shop_category_id');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
