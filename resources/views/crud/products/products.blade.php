@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD </h2>
            </div>
            <div class="pull-right">
                {{-- <a class="btn btn-success" href="{{ route('products.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
                </a> --}}
                <a class="btn btn-success" href="{{ url('create-products') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive">
        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Id</th>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Date Created</th>
                    <th width="280px" style="text-align: center">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $p)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$p->id_product}}</td>
                    <td>{{$p->kd_product}}</td>
                    <td>{{$p->product_name}}</td>
                    <td>{{$p->price}}</td>
                    <td>
                        <img src="{{ asset('crud/products/'.$p->image)}}"  alt="{{$p->image}}" style="width: 100px;border-radius: 50px;"></td>
                    <td>{{$p->created_at}}</td>
                    <td>
                        <form action="{{ url('delete-products') }}" method="POST" style="text-align:center">
                            <input type="hidden" name="id_product" value = "{{$p->id_product}}">
                            <a href="{{ url('show-products', $p->id_product) }}" title="show" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye text-white fa-lg"></i>
                            </a>

                            <a href="{{ url('edit-products', $p->id_product) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit fa-lg"></i>
                            </a>

                            @csrf

                            <button type="submit" title="delete" style="border: none; background-color:transparent;" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash fa-lg text-danger  "></i>

                            </button>
                        </form>

                        {{-- <a href="{{ route('products.edit',[$p->id_product]) }}" class="btn btn-warning btn-circle btn-sm">
                            <i class="fas fa-exclamation-triangle"></i>
                        </a>
                        <!-- Show -->
                        <a href="{{ route('products.show',[$p->id_product]) }}" class="btn btn-info btn-circle btn-sm">
                            <i class="fas fa-info-circle"></i>
                        </a>
                        <!-- Delete -->
                        <a href="{{ route('products.delete',[$p->id_product]) }}" class="btn btn-danger btn-circle btn-sm">
                            <i class="fas fa-trash"></i>
                        </a> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
            {{-- <tfoot>
                <tr>
                    <th>No.</th>
                    <th>Id</th>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Date Created</th>
                    <th width="280px">Action</th>
                </tr>
            </tfoot> --}}
        </table>
    </div>

@endsection
