@extends('layouts.master')
@section('title','User Management')
@section('breadcumb','User Management')
@section('content')
    <style type="text/css">

    </style>

	<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
            	<div class="card-header">
            		<div class="card-title">Add Role</div>
            	</div>
            	<div class="card-body">
                    <div class="col-md-10 offset-md-1" style="padding: 10px; border: 1px dashed #607d8b">
                        <form action="{{route('role.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Role Name</label>
                                <input type="text" class="form-control" name="role_name" required>
                            </div>
                            <h6 class="text-muted">Permissions:</h6>

                            <div class="row">
                                <div class="col-md-12 icheck-primary">
                                    <input type="checkbox" class="" id="checkAll">
                                    <label for="checkAll">
                                        Check All
                                    </label>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                @foreach ($permission_gropus as $group_name => $permission)
                                    <div class="col-3">
                                        <h6 class="text-muted">{{$group_name}}</h6>
                                        <hr>
                                        @foreach ($permission as $i=>$permit)
                                            <div class="icheck-primary">
                                                <input type="checkbox" class="" name="permissions[]" id="checkboxSuccess{{$permit->id}}" value="{{$permit->name}}" >
                                                <label for="checkboxSuccess{{$permit->id}}">{{$permit->name}}</label>
                                            </div>
                                       @endforeach
                                    </div>
                                 @endforeach

                            </div>

                        <button class="btn linear-btn mt-5"type="submit">Submit</button>
                        </form>
                    </div>
            	</div>
            </div>
           </div>
        </div>
      </div>
    </section>
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#checkAll').click(function () {
            if ($(this).is(':checked')) {
                $('input[type=checkbox]').prop('checked', true);
            }
            else{
                $('input[type=checkbox]').prop('checked', false);
            }
        })
    });
</script>
@endpush
@endsection


