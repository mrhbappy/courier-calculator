<div class="row">
    <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="exampleModalLabel">User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-light">
                    <form action="javascript:void(0)" id="reportForm" method="POST">
                        {{csrf_field()}}
                        <input id="put_method" type="hidden" name="_method" value="">
                        <input id="id" type="hidden" name="id">
                        <div class="row">

                                <div class="col-12">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                        required>
                                </div>



                                <div class="col-12">
                                    <label>Email</label>
                                    <input onkeyup="hideError()" type="email" name="email" class="form-control"
                                        placeholder="Enter Email" required="">
                                    <p id="email_id_err" style="color: red"></p>
                                </div>




                                <div class="col-12">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control" required=""
                                        placeholder="Enter password" id="password" autocomplete />

                                </div>



                                <div class="col-12">
                                    <label>Confirm Password</label>
                                    <input name="c_password" type="password" class="form-control" id="c_password"
                                        placeholder="Confirm Password" required="" autocomplete />

                                </div>

                            </div>

                                <div class="col-12">
                                    <label>User Role</label>
                                    <select class="select2 form-control" multiple name="role[]" id="role" required="">
                                        <option value="" disabled="">Select role</option>
                                        @isset ($roles)
                                        @forelse ($roles as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                        @empty
                                        @endforelse
                                        @endisset
                                    </select>
                                </div>

                            <div class="col-12">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="checkboxSuccess1" name="is_active">
                                <label for="checkboxSuccess1">User Status</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" id="btn_save" value="submit" class="btn btn-sm linear-btn">Save</button>
                                <button type="submit" id="btn_update" value="submit" class="btn btn-sm linear-btn">Update</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
