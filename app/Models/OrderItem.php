<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'slug',
        'name',
        'edition',
        'image',
        'price',
        'quantity',
        'line_total',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'line_total' => 'decimal:2',
        ];
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * The live product, if it still exists. Prefer the snapshot fields
     * above (name/image/price) for display — this is only for linking
     * through to the current product page.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
