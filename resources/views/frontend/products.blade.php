@extends('layouts.front-end')

@section('content')
    <div class="container">
        <div class="row">
            @if($products->count())
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="get" action="">
                                <div class="input-group">
                                    <select class="custom-select" id="inputGroupSelect04" name="category">
                                        <option value="0" selected>All</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                         @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                {{--<div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="skin skin-flat m-t-30">
                                        <form>
                                            <div class="form-group">
                                                <label>Colors</label>
                                                <div class="input-group">
                                                    <ul class="icolors">
                                                        <li></li>
                                                        <li class="red active"></li>
                                                        <li class="green"></li>
                                                        <li class="blue"></li>
                                                        <li class="orange"></li>
                                                        <li class="purple"></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Product Categories</label>
                                                <div class="input-group">
                                                    <ul class="icheck-list">
                                                        <li>
                                                            <input type="radio" class="check" id="flat-radio-1" name="category" checked data-radio="iradio_flat-red">
                                                            <label for="flat-radio-1">All</label>
                                                        </li>
                                                        @foreach($categories as $category)
                                                        <li>
                                                            <input type="radio" class="check" id="flat-radio-2" name="category" value="{{$category->id}}" data-radio="iradio_flat-red">
                                                            <label for="flat-radio-2">{{$category->name}}</label>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- column -->
                            </div>
                        </div>
                    </div>
                </div>--}}

                @foreach($products as $product)
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="product-img">
                                    <img src="/storage/{{$product->main_picture}}">
                                    <div class="pro-img-overlay"><a href="{{route('product_detail', $product->id)}}" class="bg-info"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="bg-danger"><i class="ti-trash"></i></a></div>
                                </div>
                                <div class="product-text">
                                    <span class="pro-price bg-success">${{$product->price}}</span>
                                    <h5 class="card-title m-b-0">{{$product->name}}</h5><hr/>
                                    <div class="button-group">
                                        <button type="button" class="btn btn-danger btn-sm btn-circle"><i class="ti-heart"></i> </button>
                                        <button type="button" class="btn btn-success btn-sm btn-circle"><i class="ti-shopping-cart"></i> </button>
                                        <button type="button" class="btn btn-primary btn-sm btn-circle dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-list"></i>
                                        </button>
                                        <div class="dropdown-menu animated lightSpeedIn">
                                            <a class="dropdown-item" href="javascript:void(0)">Buy Now</a>
                                            <a class="dropdown-item" href="javascript:void(0)">View Product</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Book Now</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else


            @endif

        </div>
    </div>
@endsection



