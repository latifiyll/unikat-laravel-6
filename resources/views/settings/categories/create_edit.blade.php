@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        @if(isset($category->id))
                        <strong>Perditëso</strong> Kategorinë
                        @else
                        <strong>Krijo</strong> Kategorinë
                        @endif
                    </div>
                @if (isset($category->id))
                <form action="{{url("settings/categories/$category->id")}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method("PUT")
                    @else
                    <form action="{{url('settings/categories')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                    @endif
                    <div class="card-body card-block">

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Emri</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control" name="name"
                                value="{{ old('name',  isset($category->name) ? $category->name : null) }}" placeholder="Emri i Kategorisë" />
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

