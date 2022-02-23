@extends('layouts.master')
@section('title','Shipping Calculator')
@section('breadcumb','Shipping Calculator')
@section('content')
<style type="text/css">

</style>

<section class="content">
    <div class="container">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-4 offset-md-3">
                <div class="card bg-purple">
                    <div class="card-header ">
                        <b>Shipping Calculator</b>

                    </div>
                    <div class="card-body">
                        <form action="javascript:void(0)" method="GET" id="shipping_calculator">
                            @csrf
                                <div class="col-12">
                                    <label>Delivery Route</label>
                                    <select class="form-control" name="delivery_route" id="delivery_route">
                                        <option selected disabled>Choose Type</option>
                                        <option value="ISD">Inside Dhaka</option>
                                        <option value="OSD">Outside Dhaka</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label>Delivery Type</label> <span class="text-danger">*</span>
                                    <select class="form-control" name="delivery_type" id="delivery_type">
                                        <option selected disabled>Choose Type</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Express">Express</option>
                                    </select>

                                </div>
                                <div class="col-12">
                                    <label>Product Weight(GM)</label> <span class="text-danger">*</span>
                                    <input class="form-control" type="number" name="weight" id="wight" required>

                                </div>

                                <div class="col-2">

                                </div>

                                <div class="col-12">
                                    <button type="submit" id="btn_save" value="submit" class="btn btn-md btn-success mt-2">Submit</button>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $("#shipping_calculator").submit(function(e){
            e.preventDefault();
            var delivery_route = $("#delivery_route option:selected").val();
            var delivery_type  = $("#delivery_type option:selected").val();
            var weight = $("#wight").val();
            $.ajax({
                type: "GET",
                url: "{{route("shipping.calculator.show")}}",
                data: {
                    delivery_route,delivery_type,weight
                },
                success: (data) => {

                if(data.unsuccess){
                    errortAlert(data.unsuccess);
                }
                if(data.cost){
                    alert("Cost: " + data.cost + "TK");
                }
                },
                error: function(data){
                    alert(data.responseJSON.errors);
                }
            });
        });


</script>
@endpush
@endsection
