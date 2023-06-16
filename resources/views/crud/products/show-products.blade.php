@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                {{-- @php
                    dd($data['product']);
                @endphp --}}
                <h2>  {{ $data['product']->product_name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('products') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id Product:</strong>
                {{ $data['product']->id_product }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kode Product:</strong>
                {{ $data['product']->kd_product }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Name:</strong>
                {{ $data['product']->product_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                {{ $data['product']->price }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img src="{{ asset('/crud/products/'.$data['product']->image) }}" alt=". . ." style="width: 400px;border-radius: 50px;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stok:</strong>
                {{ $data['product']->stok }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Supplier:</strong>
                {{ $data['product']->supplier_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Created:</strong>
                {{($data['product']->created_at) }}
            </div>
        </div>
    </div>

    {{-- <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $data['product']s->product_name }}</h6>
        </div>

        <div class="card-body">
            <div class="row mb-4">
                @if (session()->has('message'))
                <div style="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
                @endif
                <div class="float-left">
                    <a href="{{ route('products') }}" class="btn btn-light btn-icon-split">
                        <span class="icon text-gray-600">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>KODE PRODUK</th>
                            <th>NAMA PRODUK</th>
                            <th>HARGA</th>
                            <th>CREATED AT</th>
                            <th>UPDATED AT</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>KODE PRODUK</th>
                            <th>NAMA PRODUK</th>
                            <th>HARGA</th>
                            <th>CREATED AT</th>
                            <th>UPDATED AT</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>{{$data['product']s->id_product}}</td>
                            <td>{{$data['product']s->kd_product}}</td>
                            <td>{{$data['product']s->product_name}}</td>
                            <td>{{$data['product']s->price}}</td>
                            <td>{{$data['product']s->created_at}}</td>
                            <td>{{$data['product']s->updated_at}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
@endsection
