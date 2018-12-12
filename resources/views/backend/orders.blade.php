@extends('layouts.back-end')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="clearfix">
                        <h4 class="card-title">ORDERS</h4>
                        <div class="ml-auto">
                            <button type="button" class="float-right btn btn-info btn-rounded m-t-10" data-toggle="modal" data-target="#add-contact">New Order</button>
                        </div>
                    </div>

                </div>
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form method="POST" action="{{route('add_products')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="added_by" name="added_by" value="{{Auth::id()}}">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="name" class="col-form-label">Product Name:</label>
                                            <input type="text" class="form-control form-control-sm" id="name" name="name">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="category" class="col-form-label">{{ __('Category') }}</label>
                                            <select class="custom-select custom-select-sm" name="category">
                                                <option disabled selected>Select Category:</option>


                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="price" class="col-form-label">Price:</label>
                                            <input type="text" class="form-control form-control-sm" id="price" name="price">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="discounted_price" class="col-form-label">Discounted Price:</label>
                                            <input type="text" class="form-control form-control-sm" id="discounted_price" name="discounted_price">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="quantity_in_stock" class="col-form-label">Quabity in Stock:</label>
                                            <input type="text" class="form-control form-control-sm" id="quantity_in_stock" name="quantity_in_stock">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="main_picture" class="col-form-label">Main Picture:</label>
                                            <input type="file" class="form-control-file" id="main_picture" name="main_picture">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="trending" class="col-form-label">{{ __('Trending') }}</label>
                                            <select class="custom-select custom-select-sm" name="trending">
                                                <option disabled selected>Is Trending:</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="featured" class="col-form-label">{{ __('Featured') }}</label>
                                            <select class="custom-select custom-select-sm" name="featured">
                                                <option disabled selected>Featured:</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>


                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="description" class="col-form-label">Description:</label>
                                            <textarea class="form-control" id="description" name="description"></textarea>
                                        </div>
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                </div>
                            </form>


                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table product-overview" id="myTable">
                            <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Order ID</th>
                                <th>Photo</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Steave Jobs</td>
                                <td>#85457898</td>
                                <td> <img src="../assets/images/gallery/chair.jpg" alt="iMac" width="80"> </td>
                                <td>Rounded Chair</td>
                                <td>20</td>
                                <td>10-7-2017</td>
                                <td> <span class="label label-success font-weight-100">Paid</span> </td>
                                <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>Varun Dhavan</td>
                                <td>#95457898</td>
                                <td> <img src="../assets/images/gallery/chair2.jpg" alt="iPhone" width="80"> </td>
                                <td>Wooden Chair</td>
                                <td>25</td>
                                <td>09-7-2017</td>
                                <td> <span class="label label-warning font-weight-100">Pending</span> </td>
                                <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>Ritesh Desh</td>
                                <td>#68457898</td>
                                <td> <img src="../assets/images/gallery/chair3.jpg" alt="apple_watch" width="80"> </td>
                                <td>Gray Chair</td>
                                <td>12</td>
                                <td>08-7-2017</td>
                                <td> <span class="label label-success font-weight-100">Paid</span> </td>
                                <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>Hrithik</td>
                                <td>#45457898</td>
                                <td> <img src="../assets/images/gallery/chair4.jpg" alt="mac_mouse" width="80"> </td>
                                <td>Pure Wooden chair</td>
                                <td>18</td>
                                <td>02-7-2017</td>
                                <td> <span class="label label-danger font-weight-100">Failed</span> </td>
                                <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>Genelia Jobs</td>
                                <td>#65257898</td>
                                <td> <img src="../assets/images/gallery/chair.jpg" alt="iMac" width="80"> </td>
                                <td>Globe Rounded Chair</td>
                                <td>25</td>
                                <td>08-7-2017</td>
                                <td> <span class="label label-success font-weight-100">Paid</span> </td>
                                <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>Sonu Nigam</td>
                                <td>#15457898</td>
                                <td> <img src="../assets/images/gallery/chair2.jpg" alt="iPhone" width="80"> </td>
                                <td>Gold Wooden Chair</td>
                                <td>15</td>
                                <td>06-7-2017</td>
                                <td> <span class="label label-warning font-weight-100">Pending</span> </td>
                                <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>Pawan Trivedi</td>
                                <td>#56457898</td>
                                <td> <img src="../assets/images/gallery/chair3.jpg" alt="apple_watch" width="80"> </td>
                                <td>Still Gray Chair</td>
                                <td>11</td>
                                <td>05-7-2017</td>
                                <td> <span class="label label-success font-weight-100">Paid</span> </td>
                                <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>Ranbir kapoor</td>
                                <td>#35457898</td>
                                <td> <img src="../assets/images/gallery/chair4.jpg" alt="mac_mouse" width="80"> </td>
                                <td>Comfirtable chair</td>
                                <td>28</td>
                                <td>01-7-2017</td>
                                <td> <span class="label label-danger font-weight-100">Failed</span> </td>
                                <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
