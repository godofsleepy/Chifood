@extends('layouts.home')

@section('contentdashboard')
<div class="container-fluid mb-2">
    <div class="row">
        <div class="col-8 card p-3 bg-white">
            <h1 class="h3 mb-2 font-weight-bold text-dark">Cashier</h1>
            <p class="mb-4">Dragon Flames &bull; Kemang</p>

            <div class="form-inline row">
                <div class="col-8">
                    <a href="#" style="border-radius: 30px;" class="badge badge-danger p-3 px-4 mr-3">All Item</a>
                    <a href="#" style="border-radius: 30px;" class="badge badge-white text-dark p-3 px-4 mr-3">Food</a>
                    <a href="#" style="border-radius: 30px;" class="badge badge-white text-dark p-3 px-4 mr-3">Drink</a>
                    <a href="#" style="border-radius: 30px;" class="badge badge-white text-dark p-3 px-4 mr-3">Snack</a>
                    <a href="#" style="border-radius: 30px;" class="badge badge-white text-dark p-3 px-4 mr-3">Dimsum</a>

                </div>

                <div class="col-4">
                    <input type="text" class="form-control mr-1" placeholder="search">
                    <button type="submit" class="btn btn-danger "><i style="color: white" class="fas fa-search"></i></button>
                </div>
            </div>

            <div class="mt-5 row card-group">
                @foreach($foods as $food)
                <div class="col-2 mb-4 item-cashier" data-id="{{$food['id_food']}}" data-name="{{$food['foodname']}}" data-price="{{$food['price']}}" data-image="{{$food['image']}}">
                    <div style="border: none;" class="card text-center">
                        <img style="border-radius: 15px !important; width: 90px;" class="rounded mx-auto d-block" src="img/{{ $food['image'] }}" class="card-img-top" alt="...">
                        <div class="card-body p-2">
                            <h5 class="h6 card-title mb-1 font-weight-bold text-dark">{{ $food['foodname'] }}</h5>
                            <p style="font-size: 12px;" class="card-text text-dark">Rp {{ $food['price'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-4 p-3">
            <div class="row mb-3">
                <p class="h5 mb-2 font-weight-bold text-dark col-9">Curent Order</p>
                <div class="col-3 bg-white p-0"><button type="button" class="btn btn-sm btn-outline-danger ">Clear All</button></div>
            </div>

            <div style="height: 300px;" id="current-order" class="overflow-auto">


            </div>

            <div class="card p-3 mt-3">
                <div class="row">
                    <p class="col-8">Subtotal : </p>
                    <p class="col-4 text-right"> Rp 20000 </p>
                </div>

                <div class="row">
                    <p class="col-8">Discount : </p>
                    <p class="col-4 text-right"> - </p>
                </div>

                <div class="row">
                    <p class="col-8">Tax : </p>
                    <p class="col-4 text-right"> - </p>
                </div>

                <hr>
                <div class="row">
                    <p class="col-8 h4">Total : </p>
                    <p class="col-4 text-right"> Rp 20000 </p>
                </div>
            </div>

            <button type="button" id="pay" class="btn btn-danger btn-lg btn-block mt-3">Pay</button>
        </div>
    </div>
</div>
@endsection