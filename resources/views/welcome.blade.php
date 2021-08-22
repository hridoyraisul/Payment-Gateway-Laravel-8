<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>TestPay</title>
</head>
<body>
<h1>TestPay</h1>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="theme-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Currency</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Invoice</th>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-right">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->product}}</td>
                    <td>{{$order->currency}}</td>
                    <td>{{$order->amount}}</td>
                    <td>{{$order->invoice}}</td>
                    <td>{{$order->trxID}}</td>
                    <td>{{$order->status}}</td>
                    <td>
                        <a href="{{url('/order',$order->id)}}" class="btn btn-sm btn-dark">View</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
-->
</body>
</html>
