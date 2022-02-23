<div class="row">
    <div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">


                    <form action="javascript:void(0)" id="EdiUserForm" method="POST" autocomplete="off">

                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" class="form-control" required value="">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="edit_name" class="form-control" required value="">

                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control select2 edit_role" name="role[]" required multiple>
                                        <option value="" disabled="">Select role</option>
                                        @isset ($roles)
                                        @forelse ($roles as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                        @empty
                                        @endforelse
                                        @endisset
                                    </select>
                                </div>
                            </div>



                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input onkeyup="hideError()" type="email" name="email" class="form-control"
                                        placeholder="Enter Email">
                                    <p id="email_id_err" style="color: red"></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control"
                                        placeholder="Enter password" id="password"  />

                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input name="c_password" type="password" class="form-control"
                                        placeholder="Confirm Password"   />

                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="checkboxSuccess2" name="is_active">
                                    <label for="checkboxSuccess2">User Status</label>
                                </div>

                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-1">
                                <button type="submit" value="submit" class="btn btn-sm linear-btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
