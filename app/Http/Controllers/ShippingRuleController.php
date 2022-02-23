<?php

namespace App\Http\Controllers;

use App\Models\shippingRule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Auth;


class ShippingRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $data =  ShippingRule::all();
        if($request->ajax()){
            return datatables()->of($data)
            ->addIndexColumn()
            ->editColumn('weight_range',function($row){
                $weight_range = json_decode($row->weight_range,true);
                $wg = "";
                foreach ($weight_range as $key => $value) {
                    $wg .= "<span>Range: (".$value["min"]." - ".$value["max"].")gm : ".$value["cost"]."<span></br>";
                };

                return   $wg;
            })

            ->editColumn('created_by',function($row){
               return  User::find($row->created_by) ? User::find($row->created_by)->name : "Not Found";
            })

            ->editColumn('is_active',function($row){
                if($row->is_active==1){
                    return "<span class='badge badge-success'>Active</span>";
                }
                else{
                    return "<span class='badge badge-warning'>Inactive</span>";
                }
            })

            ->addColumn('action', function ($row) {
                $btn = "N/A";

                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn linear-btn btn-sm editUser" data-toggle="modal" data-target="#add_user">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i>  </a>';
                    $btn .= '   <a href="javascript:void(0)" data-id="' . $row->id . '" data-original-title="Delete" class="btn linear-btn-delete btn-sm delete">Delete</a>';

                return $btn;
            })
            ->rawColumns(['action','is_active','weight_range'])
            ->make(true);
        }


        return view("back.shipping-rule.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $request->merge(["weight_range"=>json_encode($request->weight_range)]);
        $request->merge(["is_active"=> $request->is_active == "on"? 1 : 0]);
        $request->merge(["created_by"=> Auth::id()]);
        if(shippingRule::create($request->all())){
            return response()->json(['success' => 'Rule Created successfully']);
        }

        return response()->json(['unsuccess' => 'Something Went Wrong !!!']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\shippingRule  $shippingRule
     * @return \Illuminate\Http\Response
     */
    public function show(shippingRule $shippingRule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\shippingRule  $shippingRule
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editData = shippingRule::find($id);
        return response()->json($editData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\shippingRule  $shippingRule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->merge(["weight_range"=>json_encode($request->weight_range)]);
        $request->merge(["is_active"=> $request->is_active == "on"? 1 : 0]);
        $request->merge(["created_by"=> Auth::id()]);
        if(shippingRule::find($id)->update($request->all())){
            return response()->json(['success' => 'Rule Updated successfully']);
        }

        return response()->json(['unsuccess' => 'Something Went Wrong !!!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\shippingRule  $shippingRule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shippingRule = shippingRule::find($id)->delete();
        if ($shippingRule) {
            return response()->json(['success' => 'Rule Deleted Successfully']);
        }
        return response()->json(['unsuccess' => 'Something Went Wrong, Please Try Again']);
    }
}
