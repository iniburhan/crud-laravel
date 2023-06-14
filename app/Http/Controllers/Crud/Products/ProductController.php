<?php

namespace App\Http\Controllers\Crud\Products;

use App\Models\Crud\Products\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // index master
        // $products = Product::get();
        // return view('crud/products/products', ['products'=>$products]);

        $data = [
            'flag' => 1,
        ];

        // get (mengambil) semua data dari model Product
        $products = Product::where($data)->get();
        // dd($product); // die dump

        // memuat view products dan passing ke $products
        return view('crud/products/products', ['products'=>$products]);

        // if ($data = ['flag' => 1]) {
        //     $products = Product::where($data)->get();
        //     return view('crud/products/products', ['products'=>$products]);
        // } else {
        //     $products = Product::where($data)->get();
        //     return view('crud/products/trash', ['products'=>$products]);
        // }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // memuat form create
        return view('crud/products/create-products');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate 1
        // $request->validate([
        //     'kd_product' => 'required',
        //     'product_name' => 'required',
        //     'price' => 'required'
        // ]);

        // validate 2
        $this->validate($request, [
            'kd_product' => 'required',
            'product_name' => 'required',
            'price' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        // upload image 1
        // $image = $request->file('image');
        // $image->storeAs('public/blogs', $image->hashName());

        // upload image 2
        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('crud/products'), $image);

        // menampung data di array
        $data  = [
            'kd_product' => $request->kd_product,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'image' => $image,
            'flag' => 1, // untuk soft delete kalau 1 berarti eksis
        ];

        // memasukkan data dari data array
        $product = Product::insert($data);

        // redirect
        if ($product) {
            return redirect('products')->with('success', 'Project created successfully.')
                                    ->with('image', $image);
        } else {
            return redirect('products')->with('error', 'Project created Failed.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_product)
    {
        //
        // dd($id_product);
        $product = Product::where('id_product', $id_product)->first();

        $data = [
            'product' => $product,
        ];
        // return view('crud/products/show-products', compact('product'));
        return view('crud/products/show-products')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_product)
    {
        //
        $product = Product::where('id_product', $id_product)->first();

        $data = [
            'product' => $product,
        ];
        // return view('crud/products/edit-products', compact('product'));
        return view('crud/products/edit-products')->with('data', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request , $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $this->validate($request, [
            'kd_product' => 'required',
            'product_name' => 'required',
            'price' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        // mencari data by id
        $product = Product::findOrFail($request->id_product);
        // $product = Product::where('id_product', $request->id_product)->first();
        // dd($product);

        // upload image 1
        // $image = $request->file('image');
        // $image->storeAs('public/blogs', $image->hashName());

        // upload image 2
        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('crud/products'), $image);

        // update data
        // $product->update([
        //     'kd_product' => $request->kd_product,
        //     'product_name' => $request->product_name,
        //     'price' => $request->price,
        //     'image' => $image
        // ]);

        // dd($product->id_product);

        $data = [
            'kd_product' => $request->kd_product,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'image' => $image,
        ];


        $update = Product::where('id_product', $product->id_product)->update($data);

        // redirect
        if ($update) {
            return redirect('products')->with('success', 'Project updated successfully.')
                                        ->with('image', $image);
        } else {
            return redirect('products')->with('error', 'Project updated Failed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // dd($request);

        // mencari data by id
        $product = Product::findOrFail($request->id_product);
        // dd($product);

        // contoh hapus data image yg ada di server sesuai nama filed
        // Storage::disk('local')->delete('/crud/products/1686628947.jpg');

        // delete data
        // $product->delete();

        // $delete = Product::where('id_product', $product->id_product)->delete();

        // soft delete menggunakan flag 0 masuk trash
        $data = [
            'flag' => 0,
        ];
        $delete = Product::where('id_product', $product->id_product)->update($data);
        // dd($product->id_product);

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
