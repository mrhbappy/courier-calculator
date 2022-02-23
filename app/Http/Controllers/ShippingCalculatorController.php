<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shippingRule;
use Carbon\carbon;

class ShippingCalculatorController extends Controller
{
    public function show(Request $request){
        $request->validate([
            "weight" => "required",
            "delivery_route" => "required",
            "delivery_type" => "required",
        ]);

        $data = shippingRule::where("delivery_route",$request->delivery_route)
                ->where("expiry_date",">",Carbon::now()->format('Y-m-d'))
                ->where("is_active",1)
                ->where("delivery_type",$request->delivery_type)
                ->first();

                if(!$data){
                    return response()->json(["unsuccess"=>"Shipping Rule Not Find"]);
                }
                $weight_ranges = json_decode($data->weight_range,true);
                if($request->weight > end($weight_ranges)["max"]){
                    return response()->json(["unsuccess"=>"Weight is exceeded"]);
                }
                foreach($weight_ranges as $weight_range){
                    if($weight_range["min"] <= $request->weight && $weight_range["max"] >= $request->weight){
                        $weight_cost = $weight_range["cost"];
                    }
                }
                $cost = $weight_cost + $data->shipping_rate;
               return response()->json(["cost"=>$cost]);

    }

    public function create(){
        return view('front.shipping-calculator.create');
    }
}
