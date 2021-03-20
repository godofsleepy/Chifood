@extends('layouts.home')
@section('contentdashboard')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Food</h1>
    <p class="mb-4"></a>Data table of foods</p>
    <p class="text-right">
        <a href="#" class="btn btn-danger mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-file-pdf" style="color: #ffffff;"></i>
            </span>
            <span class="text">Generate PDF</span>
        </a>
        <a href="#" class="btn btn-danger mb-3" data-toggle="modal" data-target="#addfood">
            <span class="icon text-white-50">
                <i class="fas fa-plus" style="color: #ffffff;"></i>
            </span>
            <span class="text">Add food</span>
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
                            <th>Food Name</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php ($i = 1)
                        @foreach($foods as $food)
                        <tr>
                            <th>{{$i}}</th>
                            <th>
                                <img style="width: 60px; border-radius: 20%;" src="img/{{$food['image']}}" alt="">
                                {{$food['foodname']}}
                            </th>
                            <th>{{$food['type']}}</th>
                            <th>{{$food['description']}}</th>
                            <th>Rp {{$food['price']}}</th>
                            <th>
                                <button class="btn btn-danger btn-circle mb-1" data-id="{{$food['id_food']}}" data-foodname="{{$food['foodname']}}" data-image="{{$food['image']}}" data-type="{{$food['type']}}" data-description="{{$food['description']}}" data-price="{{$food['price']}}" data-toggle="modal" data-target="#editfood">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <form action="/food/{{ $food['id_food'] }} " method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-circle " type="submit">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </th>
                        </tr>
                        @php ($i++)
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="addfood" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Food</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="/food" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Food Name</label>
                        <input type="text" name="name" class="form-control" id="input-name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control" name="type" id="input-type">
                            <option>Food</option>
                            <option>Drink</option>
                            <option>Snack</option>
                            <option>Dimsum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" name="price" id="input-price" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                    </div>
                    <div class="form-group custom-file ">
                        <label for="image">Image</label>
                        <input type="file" class="custom-file-input" name="image" id="validatedCustomFile" required>
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>

                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editfood" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Food</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="editform" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Food Name</label>
                        <input type="text" name="name" class="form-control" id="inputname" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control" name="type" id="inputtype">
                            <option>Food</option>
                            <option>Drink</option>
                            <option>Snack</option>
                            <option>Dimsum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" name="price" id="inputprice" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="inputdescription" rows="4"></textarea>
                    </div>
                    <div class="form-group custom-file ">
                        <label for="image">Image</label>
                        <input type="file" class="custom-file-input" name="image" id="imageedit" required>
                        <label class="custom-file-label" for="imageedit">Choose file...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection