@extends('layouts.back-end')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        
                        <div class="ml-auto">
                            <button type="button" class="top-right-corner btn btn-info btn-rounded m-t-10" data-toggle="modal" data-target="#add-contact">Add Booking</button>
                        </div>
                        <h5 class="card-title">BOOKINGS</h5>
                    </div>

                </div>
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form method="POST" action="{{route('admin_add_booking')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="added_by" name="added_by" value="{{Auth::id()}}">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Booking</h5>
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
                                            <label for="phone" class="col-form-label">{{ __('Phone') }}</label>
                                            <input type="text" class="form-control form-control-sm" id="phone" name="phone">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="item" class="col-form-label">Item:</label>
                                            <select class="custom-select custom-select-sm" name="item">
                                                <option disabled selected>Select Item Sold:</option>
                                                @foreach($items as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="quantity" class="col-form-label">Quantity:</label>
                                            <input type="text" class="form-control form-control-sm" id="quantity" name="quantity">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="receipt_number" class="col-form-label">Receipt Number:</label>
                                            <input type="text" class="form-control form-control-sm" id="receipt_number" name="receipt_number">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="price" class="col-form-label">Price:</label>
                                            <input type="text" class="form-control form-control-sm" id="price" name="price">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="collection_date" class="col-form-label">Collection Date:</label>
                                            <input type="date" class="form-control form-control-sm" id="collection_date" name="collection_date">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="return_date" class="col-form-label">Return Date:</label>
                                            <input type="date" class="form-control form-control-sm" id="return_date" name="return_date">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="deposit" class="col-form-label">Deposit:</label>
                                            <input type="text" class="form-control form-control-sm" id="deposit" name="deposit">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="balance" class="col-form-label">Balance:</label>
                                            <input type="text" class="form-control form-control-sm" id="balance" name="balance">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add Booking</button>
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
                                    <th>Customer Name</th>
                                    <th>Phone</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Receipt Number</th>
                                    <th>Collection Date</th>
                                    <th>Return Date</th>
                                    <th>Price</th>
                                    <th>Deposit</th>
                                    <th>Balance</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{$booking->customer_name}}</td>
                                        <td>{{$booking->phone}}</td>
                                        <td>{{App\Models\Product::find($booking->item)->name}}</td>
                                        <td> {{$booking->quantity}} </td>
                                        <td>{{$booking->receipt_number}}</td>
                                        <td> {{$booking->collection_date}} </td>
                                        <td>{{$booking->return_date}}</td>
                                        <td>${{$booking->price}}</td>
                                        <td>${{$booking->deposit}}</td>
                                        <td> ${{$booking->balance}} </td>
                                        <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                                    </tr>
                                @endforeach
                                
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
