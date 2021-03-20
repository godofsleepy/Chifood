@extends('layouts.home')
@section('contentdashboard')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Transaction</h1>
    <p class="mb-4"></a>Data table of Transcation</p>
    <p class="text-right">
        <a href="/transaction/pdf" class="btn btn-danger mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-file-pdf" style="color: #ffffff;"></i>
            </span>
            <span class="text">Generate PDF</span>
        </a>
    </p>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
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
            </div>
        </div>
    </div>

</div>

@endsection