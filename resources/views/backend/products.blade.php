@extends('layouts.back-end')

@section('content')

    <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body ">
                   
                    <div class="ml-auto">
                        <button type="button" class="top-right-corner btn btn-info btn-rounded m-t-10" data-toggle="modal" data-target="#add-contact">Add New Product</button>
                    </div>
                     <div>
                        <h5 class="card-title">PRODUCTS</h5>
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
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach

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
                </div>
                <div class="card-body">
                    @if($products->count())
                        <div class="table-responsive">
                            <table class="table product-overview" id="myTable">
                                <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Photo</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Discounted Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{App\Models\ProductCategory::find($product->category)->name}}</td>
                                        <td> <img src="/storage/{{$product->main_picture}}" alt="iMac" width="80"> </td>
                                        <td>${{$product->price}}.00</td>
                                        <td>{{$product->quantity_in_stock}}</td>
                                        <td>{{$product->discounted_price}}</td>
                                        <td> <span class="label label-success font-weight-100">Paid</span> </td>
                                        <td><a href="{{route('admin_show_product', $product->id)}}" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
                            No Products found
                        </div>
                    @endif

                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
