<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    <title>Dragon Flames</title>
    <link rel="icon" href="{{ asset('img/logo.jpg') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Long+Cang&display=swap" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>
                    Item
                </th>
                <th>Date</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @php ($no = 1)
            @foreach($transactions as $transaction)
            <tr>
                <th>{{ $no++ }}</th>
                <th>{{ $transaction->id_transaction }}</th>
                <th>
                    @foreach($transaction->detailorder as $food)
                    {{ $food->food->foodname }} x{{ $food->quantity }}
                    <br>
                    @endforeach
                </th>
                <th> {{ $transaction->date }} </th>
                <th> {{ $transaction->total_price }} </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>



</html>