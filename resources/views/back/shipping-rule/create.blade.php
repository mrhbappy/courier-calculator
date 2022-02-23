<div class="row">
    <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="exampleModalLabel">Shipping Rule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-light">
                    <form action="{{route("shipping-rule.store")}}" id="reportForm" method="POST">
                        {{csrf_field()}}
                        <input id="put_method" type="hidden" name="_method" value="">
                        <input id="id" type="hidden" name="id">
                        <div class="row">

                                    <div class="col-12">
                                        <label for="">Rule Title</label> <span class="text-danger">*</span>
                                        <input placeholder="Rule Title" class="form-control" type="text" name="title" id="title">
                                    </div>
                                    <div class="col-12">
                                        <label for="">Expiry Date</label> <span class="text-danger">*</span>
                                        <input class="form-control flatpickr-input" name="expiry_date" type="text" id="rangeDate" placeholder="Please select Date Range" data-input="" required="required" value="" readonly="readonly" aria-invalid="false">
                                    </div>

                                    <div class="col-12">
                                        <label for="">Base Rate</label> <span class="text-danger">*</span>
                                       <input class="form-control" type="number" name="shipping_rate" id="shipping_rate">
                                    </div>


                                    <div class="col-12">
                                        <label>Delivery Type</label> <span class="text-danger">*</span>
                                        <select class="form-control" name="delivery_type" id="delivery_type">
                                            <option selected disabled>Choose Type</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Express">Express</option>
                                        </select>
                                        {{-- <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Regular</span>
                                            </div>
                                            <input name="regular_rate" type="number" class="form-control" placeholder="Additional Cost" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Express</span>
                                            </div>
                                            <input name="express_rate" type="number" class="form-control" placeholder="Additional Cost" required>
                                        </div> --}}
                                    </div>
                                    {{-- <div class="col-12"> --}}
                                        {{-- <label>Delivery Route</label> <span class="text-danger">*</span> --}}

                                        {{-- <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Inside Dhaka</span>
                                            </div>
                                            <input name="isd_rate" type="number" class="form-control" placeholder="Additional Cost" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Outside Dhaka</span>
                                            </div>
                                            <input name="osd_rate" type="number" class="form-control" placeholder="Additional Cost" required>
                                        </div> --}}
                                    {{-- </div> --}}

                                    <div class="col-12">
                                        <label>Delivery Route</label>
                                        <select class="form-control" name="delivery_route" id="delivery_route">
                                            <option selected disabled>Choose Type</option>
                                            <option value="ISD">Inside Dhaka</option>
                                            <option value="OSD">Outside Dhaka</option>
                                        </select>
                                    </div>


                                    <div class="col-12">
                                        <label>Weight Ranges (Gram)</label>
                                        <table class="table table-sm mb-1" id="RuleWeightTable">
                                            <thead>
                                               <tr>
                                                    <th>
                                                        Min range <span class="text-danger">*</span>
                                                    </th>
                                                    <th>
                                                        Max range <span class="text-danger">*</span>
                                                    </th>
                                                    <th>
                                                       Additional Cost  <span class="text-danger">*</span>
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                               </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input class="weight-range-min form-control" type="number" name="weight_range[1][min]" min="0" required >
                                                    </td>
                                                    <td>
                                                        <input class="weight-range-max form-control" type="number" name="weight_range[1][max]" min="0" required>
                                                    </td>
                                                    <td>
                                                        <input class="weight-cost form-control" type="number" name="weight_range[1][cost]" min="0" required>
                                                    </td>
                                                    <td width="5%" class="text-center remove-row" style="cursor: pointer;"><i class="fa fa-times-circle text-mute p-1" aria-hidden="true"></i>
                                                    </td>


                                                </tr>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-sm btn-warning mb-1 float-right add-row" type="button">Add More</button>
                                    </div>


                                    <div class="col-12">
                                        <div class="icheck-primary">
                                            <input type="checkbox" id="checkboxSuccess1" name="is_active">
                                        <label for="checkboxSuccess1">Status</label> <span class="text-danger">*</span>
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
