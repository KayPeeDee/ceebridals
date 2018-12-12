@extends('layouts.back-end')

@section('content')

    <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body bg-light" >
                    <div>
                        <h4 class="card-title">PRODUCTS</h4>
                    </div>
                    <div class="ml-auto">
                        <button type="button" class="float-right btn btn-info btn-rounded m-t-10" data-toggle="modal" data-target="#add-contact">Add Product Variation</button>
                    </div>
                    <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{route('add_products_variations')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" id="product_id" name="product_id" value="{{$product->id}}">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Product Variation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="size" class="col-form-label">Size:</label>
                                                <input type="text" class="form-control form-control-sm" id="size" name="size">
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="size_in_words" class="col-form-label">Size in Words:</label>
                                                <input type="text" class="form-control form-control-sm" id="size_in_words" name="size_in_words">
                                            </div>


                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="color" class="col-form-label">Color:</label>
                                                <input type="text" class="form-control form-control-sm" id="color" name="color">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="picture" class="col-form-label">Picture:</label>
                                                <input type="file" class="form-control form-control-sm" id="picture" name="picture">
                                            </div>

                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Product Variation</button>
                                    </div>
                                </form>


                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
                <div class="card-body">
                    {{$product}}

                </div>

                <div class="card-body">
                    {{$product->variations}}

                </div>


            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
