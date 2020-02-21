@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <strong>Shiko</strong> Produktin
                    </div>
                    <div class="card-body card-block">

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Emri</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$product->name}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Përshkrimi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$product->description}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Kategoria</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$product->category->name}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Tipi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$product->type->name}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Cmimi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$product->price}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Sasia</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$product->quantity}}</p>
                                </div>
                            </div>
                            {{-- <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="file-input" class=" form-control-label">File input</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="file-input" name="file-input" class="form-control-file">
                                </div>
                            </div> --}}
                        </div>
                        <div class="card-footer">
                        <a href="{{url('products')}}"> <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Shko mbrapa
                            </button>
                        </a>
                        </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
