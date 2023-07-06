<?php

namespace App\Http\Controllers\Crud;

use App\Models\Crud\Products\Product;
use App\Models\Crud\Suppliers\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductSelectController extends Controller
{
    public function index()
    {
        return view('crud/jquery-dummy');
    }

    public function getContent(Request $request)
    {

        $id_supplier = $request->id_supplier;
        $product = Product::where('id_supplier', $id_supplier)->get(); //ambil data dari model supplier

        // return view('crud/products/create-products')->with('supplier', $supplier);
        return response()->json($product);
        // return $product;
    }

    public function getProductList(Request $request)
    {

        $id_supplier = $request->id_supplier;
        $product_list = Product::where('id_supplier', $id_supplier)->get(); //ambil data dari model supplier

        // return view('crud/products/create-products')->with('supplier', $supplier);
        return response()->json($product_list);
        // return $product;
    }


    public function getSupplierDetail(Request $request)
    {
        $id_supplier = $request->id_supplier;
        $supplier_detail = Supplier::where('id_supplier', $id_supplier)->get();

        return $supplier_detail;
    }

    public function getProductDetail(Request $request)
    {
        $id_product = $request->id_product;
        $product_detail = Product::where('id_product', $id_product)->get();

        return $product_detail;
    }

    public function create()
    {
        // memuat form create
        $supplier = Supplier::get(); //ambil data dari model supplier

        return view('crud/products/create-products')->with('supplier', $supplier);
    }

    public function store(Request $request)
    {
        // validate 1
        // $request->validate([
        //     'kd_product' => 'required',
        //     'product_name' => 'required',
        //     'price' => 'required'
        // ]);

        // validate 2
        // $this->validate($request, [
        //     'kd_product' => 'required',
        //     'product_name' => 'required',
        //     'price' => 'required',
        //     'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     // 'image' => 'required|image|mimes:png,jpg,jpeg'
        // ]);

        // upload image 1
        // $image = $request->file('image');
        // $image->storeAs('public/blogs', $image->hashName());

        // upload image 2
        // $image = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('crud/products'), $image);

        // menampung data di array
        // $data  = [
        //     'kd_product' => $request->kd_product,
        //     'product_name' => $request->product_name,
        //     'price' => $request->price,
        //     'image' => $image,
        //     'flag' => 1, // untuk soft delete kalau 1 berarti eksis
        // ];

        // memasukkan data dari data array
        // $product = Product::insert($data);

        // redirect
        // if ($product) {
        //     return redirect('products')->with('success', 'Project created successfully.')
        //                             ->with('image', $image);
        // } else {
        //     return redirect('products')->with('error', 'Project created Failed.');
        // }

        $this->validate($request, [
            'kd_product' => 'required',
            'product_name' => 'required',
            'price' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stok' => 'required',
            'id_supplier' => 'required',
        ]);

        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('crud/products'), $image);

        $data  = [
            'kd_product' => $request->kd_product,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'image' => $image,
            'stok' => $request->stok,
            'id_supplier' => $request->id_supplier,
            'flag' => 1, // untuk soft delete kalau 1 berarti eksis
        ];

        $product = Product::insert($data);

        // redirect
        if ($product) {
            return redirect('products')->with('success', 'Project created successfully.')
                                    ->with('image', $image);
        } else {
            return redirect('products')->with('error', 'Project created Failed.');
        }

    }

    public function show($id_product)
    {
        //
        // dd($id_product);
        // $product = Product::where('id_product', $id_product)->first();

        $product = Product::select(
            'products.*',
            'suppliers.supplier_name',
        )
            ->join('suppliers', 'suppliers.id_supplier', '=', 'products.id_supplier')
            ->where('id_product', $id_product)
            ->first();

        $data = [
            'product' => $product,
        ];
        // return view('crud/products/show-products', compact('product'));
        return view('crud/products/show-products')->with('data', $data);
    }

    public function edit($id_product)
    {
        //
        // $product = Product::where('id_product', $id_product)->first();

        $supplier = Supplier::get();

        $product = Product::select(
            'products.*',
            'suppliers.supplier_name',
        )
            ->leftjoin('suppliers', 'suppliers.id_supplier', '=', 'products.id_supplier')
            ->where('id_product', $id_product)
            ->first();

        $data = [
            'product' => $product,
        ];
        // return view('crud/products/edit-products', compact('product'));
        return view('crud/products/edit-products')->with('data', $data)
                                                ->with('supplier', $supplier);

    }

    public function update(Request $request)
    {
        // validate 1
        // $request->validate([
        //     'kd_product' => 'required',
        //     'product_name' => 'required',
        //     'price' => 'required'
        // ]);
        // $id_products = $request->id_product;

        // validate 2
        // $this->validate($request, [
        //     'kd_product' => 'required',
        //     'product_name' => 'required',
        //     'price' => 'required',
        //     'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     // 'image' => 'required|image|mimes:png,jpg,jpeg'
        // ]);

        // mencari data by id
        // 1
        // $product = Product::findOrFail($request->id_product);
        // 2
        // $product = Product::where('id_product', $request->id_product)->first();
        // dd($product);

        // upload image 1
        // $image = $request->file('image');
        // $image->storeAs('public/blogs', $image->hashName());

        // upload image 2
        // $image = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('crud/products'), $image);

        // update data
        // $product->update([
        //     'kd_product' => $request->kd_product,
        //     'product_name' => $request->product_name,
        //     'price' => $request->price,
        //     'image' => $image
        // ]);

        // dd($product->id_product);

        // $data = [
        //     'kd_product' => $request->kd_product,
        //     'product_name' => $request->product_name,
        //     'price' => $request->price,
        //     'image' => $image,
        // ];

        // update data
        // $update = Product::where('id_product', $product->id_product)->update($data);

        // redirect
        // if ($update) {
        //     return redirect('products')->with('success', 'Project updated successfully.')
        //                                 ->with('image', $image);
        // } else {
        //     return redirect('products')->with('error', 'Project updated Failed.');
        // }
        if (($request->image) == "")
        {
            $request->validate([
                'kd_product' => 'required',
                'product_name' => 'required',
                'price' => 'required',
                'stok' => 'required',
                // 'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $product = Product::findOrFail($request->id_product);

            // $image = time() . '.' . $request->image->extension();
            // $request->image->move(public_path('crud/products'), $image);

            $data = [
                'kd_product' => $request->kd_product,
                'product_name' => $request->product_name,
                'price' => $request->price,
                'stok' => $request->stok,
                'id_supplier' => $request->id_supplier,
            ];

            $update = Product::where('id_product', $product->id_product)->update($data);

            if ($update) {
                return redirect('products')->with('success', 'Project updated successfully.');
            } else {
                return redirect('products')->with('error', 'Project updated Failed.');
            }

        } else {
            $this->validate($request, [
                'kd_product' => 'required',
                'product_name' => 'required',
                'price' => 'required',
                'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'stok' => 'required',
                'id_supplier' => 'required',
            ]);

            $product = Product::findOrFail($request->id_product);

            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('crud/products'), $image);

            $data = [
                'kd_product' => $request->kd_product,
                'product_name' => $request->product_name,
                'price' => $request->price,
                'image' => $image,
                'stok' => $request->stok,
                'id_supplier' => $request->id_supplier,
            ];

            $update = Product::where('id_product', $product->id_product)->update($data);

            if ($update) {
                return redirect('products')->with('success', 'Project updated successfully.')
                                            ->with('image', $image);
            } else {
                return redirect('products')->with('error', 'Project updated Failed.');
            }
        }
    }

    public function destroy(Request $request)
    {
        // dd($request);

        // mencari data by id
        // $product = Product::findOrFail($request->id_product);
        // dd($product);

        // contoh hapus data image yg ada di server sesuai nama filed
        // Storage::disk('local')->delete('/crud/products/1686628947.jpg');

        // delete data
        // $product->delete();

        // $delete = Product::where('id_product', $product->id_product)->delete();

        // soft delete menggunakan flag 0 masuk trash
        // $data = [
        //     'flag' => 0,
        // ];
        // $delete = Product::where('id_product', $product->id_product)->update($data);
        // dd($product->id_product);

        // redirect
        // if($delete){
        //     //redirect dengan pesan sukses
        //     return redirect('products')->with(['success' => 'Project deleted successfully!']);
        // }else{
        //     //redirect dengan pesan error
        //     return redirect('products')->with(['error' => 'Project deleted Failed!']);
        // }

        $product = Product::findOrFail($request->id_product);

        $data = [
            'flag' => 0,
        ];
        $delete = Product::where('id_product', $product->id_product)->update($data);

        if($delete){
            //redirect dengan pesan sukses
            return redirect('products')->with(['success' => 'Project deleted successfully!']);
        }else{
            //redirect dengan pesan error
            return redirect('products')->with(['error' => 'Project deleted Failed!']);
        }


    }

    public function restore(Request $request)
    {
        $product = Product::findOrFail($request->id_product);

        $data = [
            'flag' => 1,
        ];
        $restore = Product::where('id_product', $product->id_product)->update($data);

        if($restore){
            //redirect dengan pesan sukses
            return redirect('products')->with(['success' => 'Project restored successfully!']);
        }else{
            //redirect dengan pesan error
            return redirect('products')->with(['error' => 'Project restored Failed!']);
        }
    }
}
