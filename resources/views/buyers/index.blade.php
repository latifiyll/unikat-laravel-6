@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            @if($buyers->count() == 0)
            <div class="alert alert-danger" role="alert">
                Nuk keni Bleres të regjistruara.<br>
                Për të shtuar një bleres të ri kliko këtu. <br> <br>
            <a href="{{url("buyers/create")}}"><button class="btn btn-success">Shto Bleres</button></a>
            </div>
            @else
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">produktet</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" name="property">
                                    <option selected="selected">All Properties</option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--light rs-select2--sm">
                                <select class="js-select2" name="time">
                                    <option selected="selected">Today</option>
                                    <option value="">3 Days</option>
                                    <option value="">1 Week</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <button class="au-btn-filter">
                                <i class="zmdi zmdi-filter-list"></i>filters</button>
                        </div>
                        <div class="table-data__tool-right">
                        <a href="{{url('buyers/create')}}"> <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>Shto Produkt</button></a>
                            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                <select class="js-select2" name="type">
                                    <option selected="selected">Export</option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>emri</th>
                                    <th>përshkrimi</th>
                                    <th>Kategoria</th>
                                    <th>Tipi</th>
                                    <th>Cmimi</th>
                                    <th>Sasia në stok</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buyers as $buyer)

                                <tr class="tr-shadow  @if($buyer->quantity <= 5 && $buyer->quantity > 0)  alert-warning
                                    @elseif($buyer->quantity == 0)  alert-danger @endif">

                                <td>{{$buyer->name}}</td>
                                    <td class="desc">
                                        {{$buyer->description}}
                                    </td>
                                    <td>{{$buyer->category->name}}</td>
                                    <td>{{$buyer->type->name}}</td>
                                    <td>{{$buyer->price}}</td>
                                    @if ($buyer->quantity <= 5)
                                    <td>
                                        <span class="status--denied">{{$buyer->quantity}}</span>
                                    </td>
                                    @else
                                        <td>
                                            <span class="status--process">{{$buyer->quantity}}</span>
                                        </td>
                                    @endif
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Shiko më shumë">
                                            <a href="{{url("/buyers/$buyer->id")}}"><i class="zmdi zmdi-mail-send"></i></a>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Përditëso">
                                                <a href="{{url("/buyers/$buyer->id/edit")}}"><i class="zmdi zmdi-edit"></i></a>
                                            </button>
                                            <form action="{{url("/buyers/$buyer->id")}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Fshij">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
