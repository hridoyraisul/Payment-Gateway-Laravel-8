<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<meta name="csrf-token" content="{{csrf_token()}}">

    <title>{{$order->product}}</title>
</head>
<body>
<h1>TestPay</h1>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{$order->product}}
                </div>
                <div class="card-body">
                    <h5 class="card-title amount">{{$order->amount}}</h5>
                    <p class="card-text invoice">{{$order->invoice}}</p>
                    @if($order->status === 'Pending')
                        <button class="btn btn-dark" id="bKash_button">Pay</button>
                    @else
                        <h4><span class="badge badge-success">Paid</span></h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@include('bkash_script')
</body>
</html>
