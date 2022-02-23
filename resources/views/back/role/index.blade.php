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
                    <div class="card-header">
                        <div class="card-title">Role Management</div>
                        <div class="float-right">
                            @can('role-create')
                            <a href="{{route('role.create')}}" class=" btn btn-sm linear-btn">Add Role</a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="table-respons ive">
                            <table class="DataTable table table-bordered">
                                <thead class="">
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Permissions
                                        </th>
                                        <th class="text-center align middle" width="15%">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $key=>$role)
                                    <tr>
                                        <td>
                                            {{$key+1}}
                                        </td>
                                        <td>
                                            {{$role->name}}
                                        </td>
                                        <td>
                                            @foreach ($role->permissions as $item)
                                            <span class="badge  badge-success mr-1">{{$item->name}}</span>
                                            @endforeach
                                            </span>
                                        </td>
                                        <td class="text-center align middle">
                                            @can('role-edit')
                                            <a href="{{route('role.edit',$role->id)}}" class="btn linear-btn btn-sm">
                                                Edit </a>
                                            @endcan

                                            @can('role-delete')
                                            <a href="javascript:void(0)" class="btn linear-btn-delete btn-sm"
                                                onclick="deleteRole('{!!$role->id!!}','{!!route('role.destroy',$role->id)!!}')">
                                                Delete </a>
                                            @endcan

                                        </td>
                                    </tr>
                                    @empty

                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{-- {!! $roles->render() !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script type="text/javascript">
    function deleteRole(id,link){

        Swal.fire({
          title: 'Are you sure?',
          text: "",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes!',
        }).then((result) => {
          if (result.isConfirmed) {
                $.ajax({
                type: "DELETE",
                url: link,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    if(data.success){
                      insertAlert(data.success);
                      setTimeout(function(){ location.reload() }, 3000);
                    }
                    else
                        errortAlert(data.unsuccess);

                },

            });
          }
        })

    }
</script>
@endpush
@endsection
