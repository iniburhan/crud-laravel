@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('products') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

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

    <form action="{{ url('update-products') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode:</strong>
                    <input type="hidden" name = "id_product" value = "{{$data['product']->id_product}}">
                    <input type="text" name="kd_product" value="{{ $data['product']->kd_product }}" class="form-control" placeholder="Kode">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name:</strong>
                        <input type="text" name="product_name" value="{{ $data['product']->product_name }}" class="form-control" placeholder="Product Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="price" class="form-control" placeholder="{{ $data['product']->price }}"
                        value="{{ $data['product']->price }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="{{ $data['product']->image }}"
                        value="{{ old('image', $data['product']->image) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stok:</strong>
                    <input type="text" name="stok" class="form-control" placeholder="{{ $data['product']->stok }}"
                        value="{{ $data['product']->stok }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Supplier:</strong>
                    <select name="id_supplier" id="id_supplier" placeholder="{{ $data['product']->supplier_name }}"
                        class="form-control" required>
                        {{-- <option value="">Suppliers</option> --}}
                        <option value="{{ $data['product']->supplier_name }}">
                            {{ old('supplier_name',$data['product']->supplier_name) }}
                        </option>

                        @foreach ($supplier as $s)
                        <option value="{{ $s->id_supplier }}">{{ $s->supplier_name }}</option>
                        @endforeach

                    </select>
                    {{-- <input type="text" name="id_supplier" class="form-control" placeholder="{{ $data['product']->supplier_name }}"
                        value="{{ $data['product']->supplier_name }}"> --}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
