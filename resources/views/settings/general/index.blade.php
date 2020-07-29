@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <strong>Të dhënat gjenerale të Kompanisë</strong>
                    </div>
                    <div class="card-body card-block">

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Emri</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$general->company_name}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$general->company_email}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Adresa</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$general->company_address}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Tel/Mob</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$general->company_phone}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Social media</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$general->social_links}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Qyteti</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$general->company_city}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Shteti</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$general->company_country}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Logo e Kompanisë</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    @if($general->company_image === null || $general->company_image === '')
                                    <p class="form-control-static">Nuk keni Logo</p>
                                    @else
                                <img src="{{url("")}}" alt="">
                                    @endif
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
                        <a href="{{url('settings/general/' . $general->id . '/edit')}}"> <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Edito të dhënat
                            </button>
                        </a>
                        </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
