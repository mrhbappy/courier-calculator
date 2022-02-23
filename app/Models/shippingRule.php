<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shippingRule extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        // "regular_rate",
        // "express_rate",
        // "isd_rate",
        // "osd_rate",
        "delivery_type",
        "delivery_route",
        "weight_range",
        "expiry_date",
        "shipping_rate",
        "created_by",
        "is_active",
    ];
}
