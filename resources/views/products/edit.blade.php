@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <strong>Edito</strong> Produktin
                    </div>
                <form action="{{url("products/$product->id")}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    {{csrf_field()}}
                    {{ method_field("PUT") }}
                    <div class="card-body card-block">

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Emri</label>
                                </div>
                                <div class="col-12 col-md-9">
                                <input type="text" id="name" name="name" placeholder="Emri i produktit" class="form-control" value="{{$product->name}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Përshkrimi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                <textarea name="description" id="textarea-input" rows="5" placeholder="Përshkruaj produktin" class="form-control">{{$product->description}}</textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Kategoria</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="category_id" id="select" class="form-control">
                                        <option value="0" disabled selected>Zgjidhni njërën</option>
                                        @foreach ($categories as $category)
                                    <option value="{{$category->id}}" @if ($category->id == $product->category_id)

                                    selected @endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Tipi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="type_id" id="select" class="form-control">
                                        <option value="0" selected disabled>Zgjidhni njërën</option>
                                        @foreach ($types as $type)
                                    <option value="{{$type->id}}" @if ($type->id == $product->type_id)
                                        selected
                                    @endif>{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Cmimi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="price" value="{{$product->price}}" placeholder="Cmimi" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Sasia</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" id="text-input" name="quantity" value="{{$product->quantity}}" placeholder="Sasia" class="form-control">
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
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Shto
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Anulo
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
