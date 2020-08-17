@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <strong>Edito</strong> të dhënat
                    </div>
                <form action="{{url("settings/general/$general->id")}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    {{csrf_field()}}
                    {{ method_field("PUT") }}
                    <div class="card-body card-block">

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Emri i kompanisë</label>
                                </div>
                                <div class="col-12 col-md-9">
                                <input type="text" id="name" name="name" placeholder="Emri i kompanisë" class="form-control" value="{{$general->company_name}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-12 col-md-9">
                                <input type="text" name="description" id="textarea-input" rows="5" placeholder="Email" class="form-control" value="{{$general->company_email}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Adresa</label>
                                </div>
                                <div class="col-12 col-md-9">
                                <input type="text" name="description" id="textarea-input" rows="5" placeholder="Email" class="form-control" value="{{$general->company_address}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Tel/Mob</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="description" id="textarea-input" rows="5" placeholder="Email" class="form-control" value="{{$general->company_address}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Social Links</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="description" id="textarea-input" rows="5" placeholder="Email" class="form-control" value="{{$general->social_links}}">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Qyteti</label>
                                </div>
                                <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="price" value="{{$general->company_city}}" placeholder="Cmimi" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Shteti</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="quantity" value="{{$general->company_country}}" placeholder="Sasia" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Logo</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="text-input" name="quantity" placeholder="Sasia" class="form-control">
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
