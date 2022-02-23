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
                        <div class="card-title">User Management</div>
                        <div class="float-right">
                            @can('user-create')
                            <button onclick="reset()" href="javascript:void(0)" type="button"
                                class=" btn btn-sm linear-btn" value="Add Report" data-toggle="modal"
                                data-target="#add_user">Add User</button>
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
                                                Name
                                            </th>
                                            <th>
                                                Email
                                            </th>

                                            <th>
                                                User Role
                                            </th>
                                            <th>
                                                User Status
                                            </th>
                                            <th width="20%">
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
                                                Name
                                            </th>
                                            <th>
                                                Email
                                            </th>

                                            <th>
                                                User Role
                                            </th>

                                            <th>
                                                User Status
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
        @include('back.user.add-user-form',['roles'=>$roles])
        {{-- @include('back.user.edit-user-form') --}}
    </div>
</section>
@push('scripts')
<script type="text/javascript">

function ajaxFormSubmit (formId,link) {
        var FormID = formId;
        var formData = new FormData($(FormID)[0]);

        console.log(formData);
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
             url: '{{ route('user.index') }}',
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false,searchable: false},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'roles', name: 'roles' },
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
        ajaxFormSubmit($("#reportForm"),"{{route("user.store")}}");

    })

    $(document).on('click','#btn_update',function(e){
        e.preventDefault();
        $('#put_method').val('PUT')
        var id = $('input[name="id"]').val();
        var link = '{{ route('user.index') }}/'+id;
        ajaxFormSubmit($('#reportForm'),link)

    })


    $('body').on('click','.editUser',function(){
        var id = $(this).attr("data-id");
        $('#password').removeAttr('required');
        $('#c_password').removeAttr('required');
        $("#btn_update").show();
        $("#btn_save").hide();
        $.get("{{route('user.index')}}"+'/'+ id +'/edit',function(data){
            $('#EdiUserForm').trigger("reset");
            $('input[name="id"]').val(id);
            $('input[name="email"]').val(data.email);
            $('input[name="name"]').val(data.name);
            $('#role').val(JSON.parse(data.role));
            $('#role').trigger('change');
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
                url:"user/"+id,
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
