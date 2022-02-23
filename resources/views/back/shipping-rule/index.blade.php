@extends('layouts.master')
@section('title','User Management')
@section('breadcumb','User Management')
@section('content')
<style type="text/css">

</style>

<section class="content">
    <div class="container">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="card-title">Price Rule</div>
                        <div class="float-right">
                            @can('user-create')
                            <button onclick="reset()" href="javascript:void(0)" type="button"
                                class=" btn btn-sm linear-btn" value="Add Report" data-toggle="modal"
                                data-target="#add_user">Add Rule</button>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table_wrapper" style="width: 100%; padding-left: -10px; ">
                            <div class="col-sm-12 col-md-6"></div>
                            <div class="table-responsive">

                                <table class="table table-bordered dataTable table-sm text-center">
                                    <thead>
                                        <tr class="">
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Title
                                            </th>
                                            <th>
                                                Delivery Type
                                            </th>
                                            <th>
                                                Delivery Route
                                            </th>
                                            <th>
                                                Base Rate
                                            </th>
                                            <th width="25%">
                                                Weight Base Cost
                                            </th>

                                            <th>
                                            Created By
                                            </th>
                                            <th>
                                                Expire Date
                                            </th>

                                            <th>
                                                Status
                                            </th>
                                            <th width="15%">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="">
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Title
                                            </th>
                                            <th>
                                                Delivery Type
                                            </th>
                                            <th>
                                                Delivery Route
                                            </th>
                                            <th>
                                                Base Rate
                                            </th>
                                            <th>
                                                Weight Base Cost
                                            </th>

                                            <th>
                                                Created By
                                            </th>
                                            <th>
                                                Expire Date
                                            </th>

                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Action
                                            </th>

                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('back.shipping-rule.create')
    </div>
</section>
@push('scripts')
<script type="text/javascript">

function row(table_id,sl){
        console.log(table_id)
        table_id.append(`
        <tr>
            <td>
                <input class="weight-range-min form-control" type="number" name="weight_range[`+sl+`][min]" required>
            </td>
            <td>
                <input class="weight-range-max form-control" type="number" name="weight_range[`+sl+`][max]" required>
            </td>
            <td>
                <input plass class="weight-cost form-control" type="number" name="weight_range[`+sl+`][cost]" required>
            </td>
            <td width="5%" class="text-center remove-row" style="cursor: pointer;"><i class="fa fa-times-circle text-mute p-1" aria-hidden="true"></i>
            </td>

        </tr>
        `)
    }
    var i = 1;
    $(document).on('click','.add-row',function(){
        i++
        row($('#RuleWeightTable tbody'),i);
    })

    $(document).on('click','.remove-row',function(){
      $(this).closest('tr').remove();
    })

function ajaxFormSubmit (formId,link) {

        var FormID = formId;
        var formData = new FormData($(FormID)[0]);
        $.ajax({
        type:'POST',
        url: link,
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        beforeSend: function() {
            $('.btn_save').attr('disabled');
            $('.btn_save').text('submitting');
            $('.btn_update').attr('disabled');
            $('.btn_update').text('submitting');
        },
        success: (data) => {
            if(data.success){
            $('.btn_save').text('submit');
            $('.btn_save').removeAttr('disabled');
            $('.btn_update').text('submit');
            $('.btn_update').removeAttr('disabled');
            insertAlert(data.success);
            $('.dataTable').DataTable().draw(true);
            $("#add_user").modal('hide');
            }
            else
            errortAlert(data.unsuccess);
            $('.dataTable').DataTable().draw(true);
        },
        error: function(data){
            var errors = data.responseJSON.errors;
            $.each(errors, function (i, value) {
                errortAlert(value);
            });
        }
        });

    }


    $(document).ready(function(){
		$.ajaxSetup({
			headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
		})
		$('.dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
             url: '{{ route('shipping-rule.index') }}',
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false,searchable: false},
                {data: 'title', name: 'title'},
                {data: 'delivery_type', name: 'delivery_type'},
                {data: 'delivery_route', name: 'delivery_route'},
                {data: 'shipping_rate', name: 'shipping_rate'},
                {data: 'weight_range', name: 'weight_range'},
                {data: 'created_by', name: 'created_by' },
                {data: 'expiry_date', name: 'expiry_date' },
                {data: 'is_active', name: 'is_active'},
                {data: 'action', name: 'action', orderable: false, searchable: false},

            ],

        });
	});

	function reset(){
        $('#reportForm').trigger("reset");
        $('#add_user').modal('show');
        $('#role').trigger("change");
        $('#password').prop('required',true);
        $('#c_password').prop('required',true);
        $("#btn_save").show();
    }


    function hideError(){
    	$('#emp_id_err').html('');
        $('#email_id_err').html('');
    }


    $(document).on('click','#btn_save',function(e){
        e.preventDefault();
        $('#put_method').val('POST')
        ajaxFormSubmit($("#reportForm"),"{{route("shipping-rule.store")}}");

    })

    $(document).on('click','#btn_update',function(e){
        e.preventDefault();
        $('#put_method').val('PUT')
        var id = $('input[name="id"]').val();
        var link = '{{route("shipping-rule.index")}}/'+id;
        ajaxFormSubmit($('#reportForm'),link)

    })


    $('body').on('click','.editUser',function(){
        $('#RuleWeightTable tbody tr').remove();
        var id = $(this).attr("data-id");
        $('#password').removeAttr('required');
        $('#c_password').removeAttr('required');
        $("#btn_update").show();
        $("#btn_save").hide();
        $.get("{{route('shipping-rule.index')}}"+'/'+ id +'/edit',function(data){
            $.each(JSON.parse(data.weight_range), function (index, value) {
                row($('#RuleWeightTable tbody'),index);
                $('input[name="weight_range['+index+'][min]"]').val(value.min);
                $('input[name="weight_range['+index+'][max]"]').val(value.max);
                $('input[name="weight_range['+index+'][cost]"]').val(value.cost);
            });
            $('#EdiUserForm').trigger("reset");
            $('input[name="id"]').val(data.id);
            $('input[name="title"]').val(data.title);
            $('input[name="shipping_rate"]').val(data.shipping_rate);
            // $('input[name="regular_rate"]').val(data.regular_rate);
            // $('input[name="express_rate"]').val(data.express_rate);
            // $('input[name="isd_rate"]').val(data.isd_rate);
            // $('input[name="osd_rate"]').val(data.express_rate);
            $('select[name="delivery_type"]').val(data.delivery_type).attr("selected","selected");
            $('select[name="delivery_route"]').val(data.delivery_route).attr("selected","selected");
            $('input[name="expiry_date"]').val(data.expiry_date);
            if((data.is_active)!=0){
                $('input[name="is_active"]').attr('checked', true);
            }
            else{
              $('input[name="is_active"]').attr('checked', false);
            }

        });
    });



    $('body').on('click', '.delete ', function () {
        var id = $(this).attr("data-id");
        Swal.fire({
          title: 'Are you sure ?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes!',
        }).then((result) => {
          if (result.isConfirmed) {
                $.ajax({
                type: "DELETE",
                url:"shipping-rule/"+id,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    if(data.success) {
                        insertAlert(data.success);
                        $('.dataTable').DataTable().draw(true);

                    }else{
                        errortAlert(data.unsuccess);
                        $('.dataTable').DataTable().draw(true);
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
          }
        })
    });

    $(".modal").on("hidden.bs.modal", function(){
        $('.select2').val([]).trigger('change');
        $('#put_method').val('')
    })



</script>
@endpush
@endsection
