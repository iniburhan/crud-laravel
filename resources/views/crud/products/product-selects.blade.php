@extends('layouts.admin.master')

@section('content')
    <div class="page-heading">
        <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Product Select JQuery</h3>
            {{-- <p class="text-subtitle text-muted">
                A sortable, searchable, paginated table without dependencies
                thanks to simple-datatables.
            </p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
            <nav
                aria-label="breadcrumb"
                class="breadcrumb-header float-start float-lg-end"
            >
                <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    DataTable
                </li>
                </ol>
            </nav>
            </div>
        </div>
        </div>
        <section class="section">
        <div class="card">
            <div class="card-header" style="padding: 24px 24px 10px 24px">
                <ul>
                    <li style="float: left; list-style: none">
                        <div class="#" style="padding: 10px 0px" >Simple Datatable</div>
                        {{-- <div class="#"><a href="{{ url('create-suppliers') }}" class="btn icon icon-left btn-success" title="Create a project"
                            data-toggle="modal" data-target="#myModal"
                            ><i data-feather="plus"></i> Create</a>
                        </div> --}}

                    </li>
                    <li style="float: right; list-style: none">
                        <div class="#" style="padding: 5px 40px 5px 0px">
                            <button type="button" class="btn icon icon-left btn-success"
                                data-toggle="modal" data-target="#create-modal">
                                <i data-feather="plus"></i> Create
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="card-body">
            <table class="table table-striped" id="table2">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Id</th>
                        <th>Supplier Name</th>
                        <th>Telephone</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Date Created</th>
                        <th width="280px" style="text-align: center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    {{-- @foreach ($supplier as $s)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$s->id_supplier}}</td>
                            <td>{{$s->supplier_name}}</td>
                            <td>{{$s->telp}}</td>
                            <td>{{$s->address}}</td>
                            <td>
                                <img src="{{ asset('crud/suppliers/'.$s->image)}}"  alt="{{$s->image}}" style="width: 100px;border-radius: 50px;"
                                ></td>
                            <td>{{$s->created_at}}</td>
                            <td>
                                <form action="#" method="POST" style="text-align:center">
                                    <input type="hidden" name="id_supplier" value = "{{$s->id_supplier}}">

                                    <button type="button" class="btn icon btn-primary" data-toggle="modal"
                                        data-target="#show-modal{{$s->id_supplier}}"><i class="bi bi-eye text-white"></i>
                                    </button>
                                    <button type="button" class="btn icon btn-warning" data-toggle="modal"
                                        data-target="#edit-modal{{$s->id_supplier}}"><i class="bi bi-pencil"></i>
                                    </button>

                                    @csrf

                                    <button type="button" title="delete"  class="btn icon btn-danger"data-toggle="modal"
                                        data-target="#delete-modal{{$s->id_supplier}}"><i class="bi bi-trash text-white"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
            </div>
        </div>
        </section>
    </div>

    <!-- The Modal Create-->
    <div class="modal fade" id="create-modal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create Supplier</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="{{ url('store-suppliers') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    {{-- @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach --}}
                                </ul>
                            </div>
                        @endif

                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>Supplier Name:</strong>
                                    {{-- <input type="text" name="supplier_name" class="form-control"
                                    placeholder="Supplier Name" required> --}}
                                    <select class="choices form-control" name="supplier_name" id="supplier">
                                        <option hidden>Suppliers</option>
                                        @foreach ($data['supplier'] as $item)
                                            <option value="{{$item->id_supplier}}">{{$item->supplier_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>Product Name:</strong>
                                    {{-- <input type="text" name="telp" class="form-control" placeholder="Telephone"> --}}
                                    <select class="choices form-control" name="product" id="product"></select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>Supplier Detail:</strong>
                                    <table class="table table-striped" id="">
                                        <thead>
                                            <tr>
                                                {{-- <th>No.</th> --}}
                                                <th>Id</th>
                                                <th>Supplier Name</th>
                                                <th>Telephone</th>
                                                <th>Address</th>
                                                <th>Image</th>
                                                {{-- <th width="280px" style="text-align: center">Action</th> --}}
                                            </tr>
                                        </thead>

                                        <tbody id="supplier_detail">
                                            {{-- @foreach ($supplier as $s)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$s->id_supplier}}</td>
                                                    <td>{{$s->supplier_name}}</td>
                                                    <td>{{$s->telp}}</td>
                                                    <td>{{$s->address}}</td>
                                                    <td>
                                                        <img src="{{ asset('crud/suppliers/'.$s->image)}}"  alt="{{$s->image}}" style="width: 100px;border-radius: 50px;"
                                                        ></td>
                                                    <td>{{$s->created_at}}</td>
                                                    <td>
                                                        <form action="#" method="POST" style="text-align:center">
                                                            <input type="hidden" name="id_supplier" value = "{{$s->id_supplier}}">

                                                            <button type="button" class="btn icon btn-primary" data-toggle="modal"
                                                                data-target="#show-modal{{$s->id_supplier}}"><i class="bi bi-eye text-white"></i>
                                                            </button>
                                                            <button type="button" class="btn icon btn-warning" data-toggle="modal"
                                                                data-target="#edit-modal{{$s->id_supplier}}"><i class="bi bi-pencil"></i>
                                                            </button>

                                                            @csrf

                                                            <button type="button" title="delete"  class="btn icon btn-danger"data-toggle="modal"
                                                                data-target="#delete-modal{{$s->id_supplier}}"><i class="bi bi-trash text-white"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <div class="spinner-border text-info " role="status" id='loading-1'>
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group" id="product-list">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <div class="spinner-grow text-info " role="status" id='loading-2'>
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Product Detail:</strong>
                                    <table class="table table-striped" id="">
                                        <thead>
                                            <tr>
                                                {{-- <th>No.</th> --}}
                                                <th>Id</th>
                                                <th>Kode Product</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                {{-- <th width="280px" style="text-align: center">Action</th> --}}
                                            </tr>
                                        </thead>

                                        <tbody id="product_detail">
                                            {{-- @foreach ($supplier as $s)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$s->id_supplier}}</td>
                                                    <td>{{$s->supplier_name}}</td>
                                                    <td>{{$s->telp}}</td>
                                                    <td>{{$s->address}}</td>
                                                    <td>
                                                        <img src="{{ asset('crud/suppliers/'.$s->image)}}"  alt="{{$s->image}}" style="width: 100px;border-radius: 50px;"
                                                        ></td>
                                                    <td>{{$s->created_at}}</td>
                                                    <td>
                                                        <form action="#" method="POST" style="text-align:center">
                                                            <input type="hidden" name="id_supplier" value = "{{$s->id_supplier}}">

                                                            <button type="button" class="btn icon btn-primary" data-toggle="modal"
                                                                data-target="#show-modal{{$s->id_supplier}}"><i class="bi bi-eye text-white"></i>
                                                            </button>
                                                            <button type="button" class="btn icon btn-warning" data-toggle="modal"
                                                                data-target="#edit-modal{{$s->id_supplier}}"><i class="bi bi-pencil"></i>
                                                            </button>

                                                            @csrf

                                                            <button type="button" title="delete"  class="btn icon btn-danger"data-toggle="modal"
                                                                data-target="#delete-modal{{$s->id_supplier}}"><i class="bi bi-trash text-white"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <div class="" role="status" id='loading-3'>
                                        <span class="visually-hidden">Loading...</span>
                                        <img src="{{asset('crud/admin/assets/compiled/svg/ball-triangle.svg')}}" class="me-4" style="width: 3rem" alt="audio"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Jquery untuk get product --}}
    <script>
        $('#supplier').on('change', function()
        {
            id_supplier = this.value;
            // alert("welcome");
            $('#product').empty();

            $.ajax({
                url : "{{url('get-product-selects')}}",
                type : "GET",
                data : {id_supplier : id_supplier}, // {var_from_controller : var_from_jquery_this.value}
                dataType : "JSON",
                success:function(data)
                {

                    var html = '<option> -Pilih Product- </option>'
                    for (let i = 0; i < data.length; i++) {
                        html+= '<option value = "'+data[i]['id_product']+'">'+data[i]['product_name']+'</option>';
                    }
                    $('#product').append(html);

                }
            });
        });
    </script>

    {{-- Jquery untuk get product list --}}
    <script>
        $(document).ready(function(){
            $("#loading-2").hide();
        });
        $('#supplier').on('change', function()
        {
            id_supplier = this.value;

            $('#product-list').empty();

            $.ajax({
                url : "{{url('get-product-lists')}}",
                type : "GET",
                data : {id_supplier : id_supplier}, // {var_from_controller : var_from_jquery_this.value}
                dataType : "JSON",
                beforeSend: function() {
                    $("#loading-2").show();
                },
                success:function(data)
                {
                    var html = ''
                    html +=
                    `
                    <strong>Product Lists:</strong>
                    <table class="table table-striped" id="">
                        <thead>
                            <tr>
                                {{-- <th>No.</th> --}}
                                <th>Id</th>
                                <th>Kode Product</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Image</th>
                                {{-- <th width="280px" style="text-align: center">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                    `;

                    for (let i = 0; i < data.length; i++) {
                        html += '<tr>'
                        html += '<td>'+data[i]['id_product']+'</td>'
                        html += '<td>'+data[i]['kd_product']+'</td>'
                        html += '<td>'+data[i]['product_name']+'</td>'
                        html += '<td>'+data[i]['price']+'</td>'
                        html += '<td>'+data[i]['image']+'</td>'
                        // html += '<td>'
                        //             '<img src="{{ asset('crud/suppliers/')}}"  alt="'+data[i]['image']+'" style="width: 100px;border-radius: 50px;">'
                        //     '</td>'
                        html += '</tr>'
                    }

                    html +=
                    `
                        </tbody>
                    </table>
                    `;
                    $("#loading-2").hide();
                    $('#product-list').append(html);

                }
            });
        });
    </script>

    {{-- Jquery untuk get supplier detail --}}
    <script>

        $(document).ready(function(){
            $("#loading-1").hide();
        });
        $('#supplier').on('change', function()
        {
            id_supplier = this.value;


            $('#supplier_detail').empty();
            $('#product_detail').empty();

            $.ajax({
                url : "{{url('get-supplier-details')}}",
                type : "GET",
                data : {id_supplier : id_supplier},
                dataType : "JSON",
                beforeSend: function() {
                    $("#loading-1").show();
                },
                success:function(data)
                {
                    var html = ''
                    // html = '<option> -Pilih Product- </option>'
                    // for (let i = 0; i < data.length; i++) {
                    //     html+= '<option value = "'+data[i]['id_product']+'">'+data[i]['product_name']+'</option>';
                    // }


                    for (let i = 0; i < data.length; i++) {
                        html += '<tr>'
                        html += '<td>'+data[i]['id_supplier']+'</td>'
                        html += '<td>'+data[i]['supplier_name']+'</td>'
                        html += '<td>'+data[i]['telp']+'</td>'
                        html += '<td>'+data[i]['address']+'</td>'
                        html += '<td>'+data[i]['image']+'</td>'
                        // html += '<td>'
                        //             '<img src="{{ asset('crud/suppliers/')}}"  alt="'+data[i]['image']+'" style="width: 100px;border-radius: 50px;">'
                        //     '</td>'
                        html += '</tr>'
                    }
                    $("#loading-1").hide();
                    $('#supplier_detail').append(html);

                }
            });
        });
    </script>

    {{-- Jquery untuk get product detail --}}
    <script>
        $(document).ready(function(){
            $("#loading-3").hide();
        });

        $('#product').on('change', function()
        {
            id_product = this.value;

            $('#product_detail').empty();

            $.ajax({
                url : "{{url('get-product-details')}}",
                type : "GET",
                data : {id_product : id_product},
                dataType : "JSON",
                beforeSend: function() {
                    $("#loading-3").show();
                },
                success:function(data)
                {
                    var html = ''
                    // html = '<option> -Pilih Product- </option>'
                    // for (let i = 0; i < data.length; i++) {
                    //     html+= '<option value = "'+data[i]['id_product']+'">'+data[i]['product_name']+'</option>';
                    // }
                    for (let i = 0; i < data.length; i++) {
                        html += '<tr>'
                        html += '<td>'+data[i]['id_product']+'</td>'
                        html += '<td>'+data[i]['kd_product']+'</td>'
                        html += '<td>'+data[i]['product_name']+'</td>'
                        html += '<td>'+data[i]['price']+'</td>'
                        html += '<td>'+data[i]['image']+'</td>'
                        // html += '<td>'
                        //             '<img src="{{ asset('crud/suppliers/')}}"  alt="'+data[i]['image']+'" style="width: 100px;border-radius: 50px;">'
                        //     '</td>'
                        html += '</tr>'
                    }
                    $("#loading-3").hide();
                    $('#product_detail').append(html);
                }
            });
        });
    </script>

@endsection
