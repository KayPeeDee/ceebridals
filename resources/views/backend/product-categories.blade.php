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
                        <button type="button" class="float-right btn btn-info btn-rounded m-t-10" data-toggle="modal" data-target="#add-contact">Add New Category</button>
                    </div>
                    <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{route('add_product_category')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="admin_id" name="admin_id" value="{{Auth::id()}}">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="name" class="col-form-label"> Name:</label>
                                                <input type="text" class="form-control form-control-sm" id="name" name="name">
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="description" class="col-form-label">Description:</label>
                                                <textarea class="form-control form-control-sm" id="description" name="description"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save and Continue</button>
                                    </div>
                                </form>


                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($categories as $category)
                            <div class="col-md-3">
                                <form method="POST" action="#">
                                    @csrf

                                    <div class="form-group row">

                                        <div class="col-md-12">
                                            <label for="password" class=" col-form-label">{{ __('Category Name') }}</label>

                                            <input id="email" type="email" class="form-control" name="email" value="{{ $category->name}}">

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Update Category') }}
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        @empty

                        @endforelse

                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
