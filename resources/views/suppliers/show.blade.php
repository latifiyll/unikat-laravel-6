@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <strong>{{$supplier->full_name}}</strong>
                    </div>
                    <div class="card-body card-block">

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Emri i Plotë</label>
                                </div>
                                <div class="col-12 col-md-9">
                                <p>{{$supplier->full_name}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Kompania</label>
                                </div>
                                <div class="col-12 col-md-9">
                                <p>{{$supplier->company}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Tel/Mob</label>
                                </div>
                                <div class="col-12 col-md-9">
                                <p>{{$supplier->phone}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Adresa</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p>{{$supplier->address}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Qyteti</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p>{{$supplier->city}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                        </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
