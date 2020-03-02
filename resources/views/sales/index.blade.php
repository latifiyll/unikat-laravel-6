@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    @if ($sales->count() == 0)
                    <div class="alert alert-danger" role="alert">
                        Nuk keni bërë ende shitje.<br>
                         <br>
                    <a href="{{url("products")}}"><button class="btn btn-success">Produktet</button></a>
                    @else
                    <h3 class="title-5 m-b-35">shitjet</h3>
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

                            </div>
                        <div class="table-data__tool-right">
                        <a href="{{url('sales/create')}}"> <button class="au-btn au-btn-icon au-btn--green au-btn--small">
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
                                    <th></th>
                                    <th>Bleresit</th>
                                    <th>Cmimi Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)

                                <tr class="tr-shadow">
                                    <td></td>
                                <td>{{$sale->buyer->full_name}}</td>
                                <td>{{$sale["totalSum"]}}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Shiko më shumë">
                                            <a href="{{url("/sales/$sale->buyer_id")}}"><i class="zmdi zmdi-mail-send"></i></a>
                                            </button>

                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                    <!-- END DATA TABLE -->
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
