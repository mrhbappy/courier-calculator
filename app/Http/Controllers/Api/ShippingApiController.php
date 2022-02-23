<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shippingRule;
use Carbon\carbon;

class ShippingApiController extends Controller
{
    public function shippingCalculator($weight,$route,$type){

        if(!$weight && !$route && !$type){
            return response()->json(["message"=>"Wrong Parameter"]);
        }
        $data = shippingRule::where("delivery_route",$route)
        ->where("expiry_date",">",Carbon::now()->format('Y-m-d'))
        ->where("is_active",1)
        ->where("delivery_type",$type)
        ->first();

        if(!$data){
            return response()->json(["message"=>"Shipping Rule Not Find"]);
        }
        $weight_ranges = json_decode($data->weight_range,true);
        if($weight > end($weight_ranges)["max"]){
            return response()->json(["message"=>"Weight is exceeded"]);
        }
        foreach($weight_ranges as $weight_range){
            if($weight_range["min"] <= $weight && $weight_range["max"] >= $weight){
                $weight_cost = $weight_range["cost"];
            }
        }
        $cost = $weight_cost + $data->shipping_rate;
       return response()->json(["cost"=>$cost]);

    }
}
