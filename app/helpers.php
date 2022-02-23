<?php
    use Illuminate\Support\Facades\Auth;
    use Carbon\carbon;
    use App\Models\ProductDiscount;

    function ProductDiscount($product,$color) {
        $product_discount = 0;
        $today = carbon::now()->format('Y-m-d');
        $disProduct =  ProductDiscount::where('product_id',$product->id)->where('start_date','<',carbon::now()->format('Y-m-d'))->where('is_active',1)->where('end_date','>=', carbon::now()->format('Y-m-d'))->first();

        if ($disProduct != null) {
            if ($disProduct->is_active == 1 && $disProduct->end_date >= $today) {
              if ( in_array($color,json_decode($disProduct->color))) {
                $product_discount =  $disProduct->discountTotal();
              }
            }
        }

        return $product_discount;
    }


?>
