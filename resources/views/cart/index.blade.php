@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
              @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @elseif(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h1>Shporta</h1>
            @if (session('cart'))
            <form action="{{url('save-buyer-products')}}" method="post" enctype="multipart/form-data">
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th>emri</th>
                            <th>Kategoria</th>
                            <th>Tipi</th>
                            <th>Cmimi</th>
                            <th>Sasia</th>
                            <th>Totali</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @csrf
                       <?php $total = 0 ?>

                        @foreach (session('cart') as $id => $details)

                        <?php $total += $details['price'] * $details['quantity'] ?>

                        <tr class="tr-shadow">
                            <td>{{$details['name']}}</td>
                            <td>{{$details['category']}}</td>
                            <td>{{$details['type']}}</td>
                            <td>{{$details['price']}}</td>
                            <td>
                                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                            </td>

                            <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>

                            <td>
                                <div class="table-data-feature">
                                    <button type="submit" class="item update-cart" data-id="{{ $id }}" data-toggle="tooltip" data-placement="top" title="Ripertri"><i class="zmdi zmdi-refresh"></i></button>
                                        <button type="submit" class="item remove-from-cart" data-id="{{ $id }}" data-toggle="tooltip" data-placement="top" title="Fshij">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
            <select name="buyer_id" id="select" class="form-control col-md-4">
                <option value="" selected disabled>Zgjedh Bleresin</option>
                @foreach ($buyers as $buyer)
                <option value="{{$buyer->id}}"> {{$buyer->full_name}}</option>
                @endforeach
            </select>
            <button class="btn btn-primary" style="float:right; margin-top: 10px" type="submit">Ruaj Porosinë</button>
        </form>
        @else
        <div class="alert alert-danger" role="alert">
            Nuk keni produkte në shportë.<br>
            Për të shtuar një produkt në shportë kliko këtu. <br> <br>
        <a href="{{url("products")}}"><button class="btn btn-success">Shto Produkt</button></a>
        </div>
        @endif
        </div>
    </div>
</div>
@endsection
    @section('scripts')


 <script type="text/javascript">

        $(".update-cart").click(function (e) {
           e.preventDefault();

           var ele = $(this);

            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("A jeni te sigurt?")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>
     @endsection


