@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <strong>Edito</strong> Bleresin
                    </div>
                <form action="{{url("buyers/$buyer->id")}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method("PUT")
                    <div class="card-body card-block">

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Emri i Plotë</label>
                                </div>
                                <div class="col-12 col-md-9">
                                <input type="text" id="name" name="full_name" placeholder="Emri i plotë" class="form-control" value="{{$buyer->full_name}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Tel/Mob</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="phone" name="phone" placeholder="Tel/Mob" class="form-control" value="{{$buyer->phone}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Adresa</label>
                                </div>
                                <div class="col-12 col-md-9">
                                <textarea name="address" id="textarea-input" rows="5" placeholder="Adressa" class="form-control">{{$buyer->address}}</textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Qyteti</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="city" id="phone" name="city" placeholder="Qyteti" class="form-control" value="{{$buyer->city}}">
                                </div>
                            </div>
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
