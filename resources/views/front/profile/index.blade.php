@extends('layouts.master')
@section('title','Profile')
@section('breadcumb','Profile Management')
@section('content')
	<style type="text/css">
		.upload_img{
			position: absolute;
	        top: 22%;
            left: 25%;
		}
		.widget-user-2 .widget-user-desc, .widget-user-2 .widget-user-username{
			margin-left: 122px;
		}

	</style>

		<section class="content">
		  <div class="container">
		    <div class="row">
		      <div class="col-12">
		       <div class="card bg-light" style="">
		          <div class="card-header ">
		            <h4 class="card-title">My Profile</h4>
		          </div>
		          <div class="card-body ">
		            <div class="row">

		             	<div class="col-md-4 offset-md-4">
		          <div class="card-body">
          				 	<div class="card card-widget widget-user-2 ">
				              <div class="widget-user-header linear-btn" >
				                <div class="widget-user-image">
				                 <img style="position:relative; width: 30%;" class="profile-user-img img-fluid img-square" src="{{(!empty($profile->image))?url('public/img/'.$profile->image):url('public/img/null.png')}}">
				                 <form id="upload_form" action="{{route('profile.image')}}" method="POST" enctype="multipart/form-data">
				                 	@csrf
					                 <input style="display: none" type="file" name="image" id="profile_image_input" value="">
					                 <input type="hidden" name="id" value="{{$profile->id}}">
				                 </form>
                                    <a title="Upload New" class="upload_img"><i class="fa fa-pen text-white" style="padding: 5px; background: #5d51ca;cursor: pointer;" aria-hidden="true"></i></a>
				                </div>
				                <!-- /.widget-user-image -->
				                <h3 class="widget-user-username">{{$profile->name}}</h3>
				                <h6 class="widget-user-desc">
                                    Role:
                                    @php $roles = json_decode($profile->role); @endphp
                                    @foreach ($roles as $role) {{$role . "  "}} @endforeach
                                    <br>Designation: {{$profile->designation}}
				                </h6>

				              </div>
				              <div class="card-footer p-0">
				                <ul class="nav flex-column">
				                  <li class="nav-item">
				                    <a class="nav-link">
				                      Mobile <span class="float-right badge bg-primary">{{@$profile->mobile}}</span>
				                    </a>
				                  </li>
                                  @if (Auth::user()->salesofficer)
                                    <li class="nav-item">
                                        <a class="nav-link">
                                        Zone <span class="float-right badge bg-info">{{@$profile->salesofficer->area->name}}</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link">
                                        Area/Base <span class="float-right badge bg-danger">{{@$profile->salesofficer->base->name}}</span>
                                        </a>
                                    </li>
                                  @endif

				                  <li class="nav-item">
				                    <a class="nav-link">
				                      Division<span class="float-right badge bg-danger">
                                            @if(Auth::user()->asm) {{@$profile->asm->division->name}}
                                            @elseif(Auth::user()->dsm)  {{@$profile->dsm->division->name}}
                                            @else{{@$profile->salesofficer->division->name}}
                                            @endif
                                        </span>
				                    </a>
				                  </li>

				                </ul>

				              </div>
				              <div class="card-footer mt-3 ">
				              	<button type="button" class="btn linear-btn btn-block"  data-toggle="modal" data-target="#modal-success"><i class="fa fa-key" aria-hidden="true"></i> Change Password</button>
				              </div>
				            </div>
			          	</div>
		        </div>
		       </div>
		    </div>
		  </div>
		</div>
		  </div>
		    <div class="modal fade" id="modal-success">
                <div class="modal-dialog">
                    <div class="modal-content bg-light">
                        <div class="modal-header">
                            <h4 class="modal-title">Change Password</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('change.password')}}" method="post" id="password_form">
                                @csrf
                                <div class="form-group"><input class="form-control" type="password" name="old_password" id="old_password" placeholder="Input Old password" required="" onkeyup="err(this.id)"><span id="old_pass_err" class="old_pass_err text-warning"></span></div>
                                <div class="form-group"><input class="form-control" type="password" name="new_password" id="new_password" placeholder="Input New Passorwrd" required=""  onkeyup="err(this.id)"><span class="new_pass_err text-warning"></span></div>
                                <div class="form-group"><input class="form-control" type="password" name="c_password" id="c_password" placeholder="Confirm New Passorwrd" required=""  onkeyup="err(this.id)"><span class="c_pass_err text-warning"></span></div>

                        </div>
                            <div class="modal-footer justify-content-between">
                                <button type="submit" class="btn btn-outline-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
		</section>

@push('scripts')
<script type="text/javascript">
	$('.upload_img').on('click',function(){
			$("#profile_image_input").click();
		});

		$('#profile_image_input').on('change',function(e){
			var form = $('#upload_form')[0];
			var formdata = new FormData(form);
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
			$.ajax({
			  url: form.action,
			  data: formdata,
			  beforeSend: function() {
			  	$('.widget-user-image').html(`<div class="spinner-border text-danger text-center" role="status"><span class="sr-only">Loading...</span></div>`)
		    },
			  processData: false,
			  contentType: false,
			  type: 'POST',
			  success: function(data,status){
			    insertAlert(data.success);
			    setTimeout(function(){
					  location.reload(true);
					}, 3000);
			  }
			});
		});

		$('#password_form').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: $(this).attr('action'),
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {

        if(data.success){
        	 $("#modal-success").modal('hide');
          insertAlert(data.success);
        }
        else
            $('.old_pass_err').html(data.old_pass_err)
        },
        error: function(data){
           $('.new_pass_err').html(data.responseJSON.errors.new_password)
           $('.c_pass_err').html(data.responseJSON.errors.c_password)
           console.log(data.responseJSON.message);
        }
        });
    })
    function err(e){$('#'+e).next('span').text('')}
</script>
@endpush
@endsection
