@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->

                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <h3 class="title-5 m-b-35">{{$sales[0]->buyer->full_name}}</h3>
                        </div>
                        <div class="table-data__tool-right">
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
                                    <th>Emri i Produktit</th>
                                    <th>Sasia</th>
                                    <th>Cmimi Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)

                                <tr class="tr-shadow">
                                <td>{{$sale->product->name}}</td>
                                <td>{{$sale->quantity}}</td>
                                <td><b>{{$sale->total_sum}} &euro;</b></td>
                                </tr>
                                <tr class="spacer"></tr>
                                @endforeach
                                <tr class="tr-shadow">
                                    <td></td>
                                    <td>Totali</td>
                                    <td style="font-size:20px; font-weight:bold">{{$totalSum[0]["totalSum"]}} &euro;</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
