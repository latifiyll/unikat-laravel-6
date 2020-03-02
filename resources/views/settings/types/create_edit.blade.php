@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        @if(isset($type->id))
                        <strong>Perditëso</strong> Tipin
                        @else
                        <strong>Krijo</strong> Tip
                        @endif
                    </div>
                @if (isset($type->id))
                <form action="{{url("settings/types/$type->id")}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method("PUT")
                    @else
                    <form action="{{url('settings/types')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                    @endif
                    <div class="card-body card-block">

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Emri</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control" name="name"
                                value="{{ old('name',  isset($type->name) ? $type->name : null) }}" placeholder="Emri i Kategorisë" />
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

