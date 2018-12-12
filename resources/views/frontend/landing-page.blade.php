@extends('layouts.front-end')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <img class="img-responsive" src="{{asset('media/bridalsuit1.jpg')}}" alt="First slide">
                                                </div>
                                                <div class="col-md-3">
                                                    <img class="img-responsive" src="{{asset('media/bridalsuit1.jpg')}}" alt="First slide">
                                                </div>
                                                <div class="col-md-3">
                                                    <img class="img-responsive" src="{{asset('media/bridalsuit1.jpg')}}" alt="First slide">
                                                </div>
                                                <div class="col-md-3">
                                                    <img class="img-responsive" src="{{asset('media/bridalsuit1.jpg')}}" alt="First slide">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <img class="img-responsive" src="{{asset('media/bridaldress1.jpg')}}" alt="First slide">
                                                </div>
                                                <div class="col-md-3">
                                                    <img class="img-responsive" src="{{asset('media/bridaldress1.jpg')}}" alt="First slide">
                                                </div>
                                                <div class="col-md-3">
                                                    <img class="img-responsive" src="{{asset('media/bridaldress1.jpg')}}" alt="First slide">
                                                </div>
                                                <div class="col-md-3">
                                                    <img class="img-responsive" src="{{asset('media/bridaldress1.jpg')}}" alt="First slide">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="carousel-item">
                                            <img class="img-responsive" src="{{asset('media/bridaldress1.jpg')}}" alt="First slide">
                                            <img class="img-responsive" src="{{asset('media/bridaldress1.jpg')}}" alt="First slide">
                                            <img class="img-responsive" src="{{asset('media/bridaldress1.jpg')}}" alt="First slide">
                                            <img class="img-responsive" src="{{asset('media/bridaldress1.jpg')}}" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="img-responsive" src="{{asset('media/bridaldress1.jpg')}}" alt="First slide">
                                            <img class="img-responsive" src="{{asset('media/bridaldress1.jpg')}}" alt="First slide">
                                            <img class="img-responsive" src="{{asset('media/bridaldress1.jpg')}}" alt="First slide">
                                            <img class="img-responsive" src="{{asset('media/bridaldress1.jpg')}}" alt="First slide">

                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            @if($trending->count())
                <div class="col-md-12">
                <div class="card">
                    <div class="card-body bg-light">
                        <h4 class="card-title">Trending</h4>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">

                                @foreach($trending as $product)
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="product-img">
                                            <img src="/storage/{{$product->main_picture}}">
                                            <div class="pro-img-overlay">
                                                <a href="{{route('product_detail', $product->id)}}" class="bg-info"><i class="ti-marker-alt"></i></a>
                                                <a href="javascript:void(0)" class="bg-danger"><i class="ti-trash"></i></a>
                                                <a href="javascript:void(0)" class="bg-danger"><i class="ti-trash"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-text">
                                            <span class="pro-price bg-primary">${{$product->price}}</span>
                                            <h5 class="card-title m-b-0">{{$product->name}}</h5>
                                            <!--<small class="text-muted db">globe type chair for rest</small>-->
                                        </div>
                                    </div>
                                @endforeach


                        </div>

                    </div>
                </div>
            </div>
            @endif
        </div>

        <div class="row">

            @if($featured->count())
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body bg-light">
                            <h4 class="card-title">Featured</h4>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                @foreach($featured as $product)
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="product-img">
                                            <img src="/storage/{{$product->main_picture}}">
                                            <div class="pro-img-overlay">
                                                <a href="{{route('product_detail', $product->id)}}" class="bg-info"><i class="ti-marker-alt"></i></a>
                                                <a href="javascript:void(0)" class="bg-danger"><i class="ti-trash"></i></a>
                                                <a href="javascript:void(0)" class="bg-danger"><i class="ti-trash"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-text">
                                            <span class="pro-price bg-primary">${{$product->price}}</span>
                                            <h5 class="card-title m-b-0">{{$product->name}}</h5>
                                            <!--<small class="text-muted db">globe type chair for rest</small>-->
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            @endif


        </div>
    </div>
@endsection
