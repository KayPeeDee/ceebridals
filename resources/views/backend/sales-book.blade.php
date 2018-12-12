@extends('layouts.back-end')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="clearfix">
                        <h4 class="card-title">SALES BOOK</h4>
                        <div class="ml-auto">
                            <button type="button" class="float-right btn btn-info btn-rounded m-t-10" data-toggle="modal" data-target="#add-contact">Add New Sale</button>
                        </div>
                    </div>

                </div>
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form method="POST" action="{{route('admin_add_sale')}}" enctype="multipart/form-data">
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
                                            <label for="customer_name" class="col-form-label">Customer Name:</label>
                                            <input type="text" class="form-control form-control-sm" id="customer_name" name="customer_name">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="phone" class="col-form-label">Phone Number:</label>
                                            <input type="text" class="form-control form-control-sm" id="phone" name="phone">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">

                                            <label for="item" class="col-form-label">{{ __('Item Sold') }}</label>
                                            <select class="custom-select custom-select-sm" name="item">
                                                <option disabled selected>Select Item Sold:</option>
                                                @foreach($items as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="quantity" class="col-form-label">Quantity Bought:</label>
                                            <input type="text" class="form-control form-control-sm" id="quantity" name="quantity">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="amount" class="col-form-label">Amount:</label>
                                            <input type="text" class="form-control form-control-sm" id="amount" name="amount">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add Sale</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>


                <div class="card-body">
                    @if($sales->count())
                        <div class="table-responsive">
                            <table class="table product-overview" id="myTable">
                                <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Phone</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sales as $sale)
                                    <tr>
                                        <td>{{$sale->customer_name}}</td>
                                        <td>{{$sale->phone}}</td>
                                        <td>{{App\Models\Product::find($sale->item)->name}}</td>
                                        {{--<td> <img src="/storage/{{$sale->main_picture}}" alt="iMac" width="80"> </td>--}}
                                        <td>{{$sale->quantity}}</td>
                                        <td>${{$sale->amount}}</td>
                                        <td><a href="{{--route('admin_show_product', $sale->id)--}}" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
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
    </div>
@endsection
