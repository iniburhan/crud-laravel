@extends('layouts.admin.master')

@section('content')
    <div class="page-heading">
        <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Customers Data</h3>
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
                        {{-- <div class="#"><a href="{{ url('create-customers') }}" class="btn icon icon-left btn-success" title="Create a project"
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
                        <th>Customer Name</th>
                        <th>Gender</th>
                        <th>Telephone</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Date Created</th>
                        <th width="280px" style="text-align: center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($customer as $s)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$s->customer_name}}</td>
                        <td>{{$s->gender}}</td>
                        <td>{{$s->telp}}</td>
                        <td>{{$s->address}}</td>
                        <td>
                            <img src="{{ asset('crud/customers/'.$s->image)}}"  alt="{{$s->image}}" style="width: 100px;border-radius: 50px;"
                            ></td>
                        <td>{{$s->created_at}}</td>
                        <td>
                            <form action="#" method="POST" style="text-align:center">
                                <input type="hidden" name="id_customer" value = "{{$s->id_customer}}">

                                <button type="button" class="btn icon btn-primary" data-toggle="modal"
                                    data-target="#show-modal{{$s->id_customer}}"><i class="bi bi-eye text-white"></i>
                                </button>
                                <button type="button" class="btn icon btn-warning" data-toggle="modal"
                                    data-target="#edit-modal{{$s->id_customer}}"><i class="bi bi-pencil"></i>
                                </button>

                                {{-- @csrf --}}

                                <button type="button" title="delete"  class="btn icon btn-danger"data-toggle="modal"
                                    data-target="#delete-modal{{$s->id_customer}}"><i class="bi bi-trash text-white"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </section>
    </div>

    <!-- The Modal Create-->
    <div class="modal fade" id="create-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create customer</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="{{ url('store-customers') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Customer Name:</strong>
                                    <input type="text" name="customer_name" class="form-control"
                                    placeholder="Customer Name" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Gender:</strong>
                                    {{-- <input type="text" name="gender" class="form-control"
                                    placeholder="Gender" required> --}}
                                </div>
                                <div class="form-check">
                                    <input
                                      class="form-check-input"
                                      type="radio"
                                      name="gender"
                                      id="gender"
                                      value="pria"
                                    />
                                    <label class="form-check-label" for="flexRadioDefault1" style="padding: 0px 50px 0px 0px">
                                      Pria
                                    </label>
                                    <input
                                      class="form-check-input"
                                      type="radio"
                                      name="gender"
                                      id="gender"
                                      value="wanita"
                                    />
                                    <label class="form-check-label" for="flexRadioDefault1">
                                      Wanita
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Telephone:</strong>
                                    <input type="text" name="telp" class="form-control" placeholder="Telephone">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Address:</strong>
                                    <input type="text" name="address" class="form-control" placeholder="Address">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image:</strong>
                                    <input type="file" name="image" class="form-control" placeholder="Image">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

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

    <!-- The Modal Show-->
    @foreach ($customer as $s)
    <div class="modal fade" id="show-modal{{$s->id_customer}}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">{{ $s->customer_name }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Customer Name:</strong>
                                {{ $s->customer_name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Gender:</strong>
                                {{ $s->gender }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Telephone:</strong>
                                {{ $s->telp }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Address:</strong>
                                {{ $s->address }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Image:</strong>
                                <img src="{{ asset('/crud/customers/'.$s->image) }}" alt=". . ."
                                style="width: 400px;border-radius: 50px;">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Date Created:</strong>
                                {{($s->created_at) }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    @endforeach

    <!-- The Modal Edit-->
    @foreach ($customer as $s)
    <div class="modal fade" id="edit-modal{{$s->id_customer}}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="{{ url('update-customers') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        @csrf

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>customer Name:</strong>
                                    <input type="hidden" name = "id_customer" value = "{{$s->id_customer}}">
                                    <input type="text" name="customer_name" value="{{ $s->customer_name }}"
                                        class="form-control" placeholder="customer Name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Gender:</strong>
                                    {{-- <input type="text" name="gender" class="form-control"
                                    placeholder="Gender" required> --}}
                                </div>
                                <div class="form-check">

                                    @if ($s->gender == 'pria')
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="pria" checked/>
                                        <label class="form-check-label" for="flexRadioDefault1" style="padding: 0px 50px 0px 0px">
                                        pria
                                        </label>
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="wanita" />
                                        <label class="form-check-label" for="flexRadioDefault1">
                                        wanita
                                        </label>
                                    @else
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="pria" />
                                        <label class="form-check-label" for="flexRadioDefault1" style="padding: 0px 50px 0px 0px">
                                        pria
                                        </label>
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="wanita" checked/>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                        wanita
                                        </label>
                                    @endif

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Telephone:</strong>
                                    <input type="text" name="telp" value="{{ $s->telp }}" class="form-control"
                                        placeholder="Telephone">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Address:</strong>
                                    <input type="text" name="address" class="form-control" placeholder="Address"
                                        value="{{ $s->address }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image:</strong>
                                    <input type="file" name="image" class="form-control" placeholder="{{ $s->image }}"
                                        value="{{ old('image', $s->image) }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

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
    @endforeach

    <!-- The Modal Delete-->
    @foreach ($customer as $s)
    <div class="modal fade" id="delete-modal{{$s->id_customer}}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="{{ url('delete-customers') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id_customer" value="{{$s->id_customer}}">
                        @csrf
                        Hapus dosa anda?
                     </div>

                <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Hapus</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

@endsection
