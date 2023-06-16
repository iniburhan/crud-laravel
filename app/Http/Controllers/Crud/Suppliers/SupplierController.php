<?php

namespace App\Http\Controllers\Crud\Suppliers;

use App\Models\Crud\Suppliers\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SupplierController extends Controller
{
    public function index()
    {
        $data = [
            'flag' => 1,
        ];

        $supplier = Supplier::where($data)->get();

        return view('crud/suppliers/suppliers', ['supplier'=>$supplier]);

    }

    public function create()
    {
        // memuat form create
        return view('crud/suppliers/create-suppliers');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'supplier_name' => 'required',
            'telp' => 'required',
            'address' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('crud/suppliers'), $image);

        $data  = [
            'supplier_name' => $request->supplier_name,
            'telp' => $request->telp,
            'address' => $request->address,
            'image' => $image,
            'flag' => 1, // untuk soft delete kalau 1 berarti eksis
        ];

        $supplier = Supplier::insert($data);

        // redirect
        if ($supplier) {
            return redirect('suppliers')->with('success', 'Project created successfully.');
                                    // ->with('image', $image);
        } else {
            return redirect('suppliers')->with('error', 'Project created Failed.');
        }

    }

    public function show($id_supplier)
    {
        //
        // dd($id_supplier);
        $supplier = Supplier::where('id_supplier', $id_supplier)->first();

        $data = [
            'supplier' => $supplier,
        ];
        return view('crud/suppliers/suppliers')->with('data', $data);
    }

    public function edit($id_supplier)
    {
        //
        $supplier = Supplier::where('id_supplier', $id_supplier)->first();

        $data = [
            'supplier' => $supplier,
        ];
        return view('crud/suppliers/suppliers')->with('data', $data);

    }

    public function update(Request $request)
    {
        if (($request->image) == "")
        {
            $this->validate($request, [
                'supplier_name' => 'required',
                'telp' => 'required',
                'address' => 'required',
                // 'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $supplier = Supplier::findOrFail($request->id_supplier);

            // $image = time() . '.' . $request->image->extension();
            // $request->image->move(public_path('crud/suppliers'), $image);

            $data = [
                'supplier_name' => $request->supplier_name,
                'telp' => $request->telp,
                'address' => $request->address,
            ];

            $update = Supplier::where('id_supplier', $supplier->id_supplier)->update($data);

            if ($update) {
                return redirect('suppliers')->with('success', 'Project updated successfully.');
            } else {
                return redirect('suppliers')->with('error', 'Project updated Failed.');
            }

        } else {
            $this->validate($request, [
                'supplier_name' => 'required',
                'telp' => 'required',
                'address' => 'required',
                'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $supplier = Supplier::findOrFail($request->id_supplier);

            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('crud/suppliers'), $image);

            $data = [
                'supplier_name' => $request->supplier_name,
                'telp' => $request->telp,
                'address' => $request->address,
                'image' => $image,
            ];

            $update = Supplier::where('id_supplier', $supplier->id_supplier)->update($data);

            if ($update) {
                return redirect('suppliers')->with('success', 'Project updated successfully.')
                                            ->with('image', $image);
            } else {
                return redirect('suppliers')->with('error', 'Project updated Failed.');
            }
        }
    }

    public function destroy(Request $request)
    {
        $supplier = Supplier::findOrFail($request->id_supplier);

        $data = [
            'flag' => 0,
        ];
        $delete = Supplier::where('id_supplier', $supplier->id_supplier)->update($data);

        if($delete){
            //redirect dengan pesan sukses
            return redirect('suppliers')->with(['success' => 'Project deleted successfully!']);
        }else{
            //redirect dengan pesan error
            return redirect('suppliers')->with(['error' => 'Project deleted Failed!']);
        }


    }
    public function restore(Request $request)
    {
        $supplier = Supplier::findOrFail($request->id_supplier);

        $data = [
            'flag' => 1,
        ];
        $restore = Supplier::where('id_supplier', $supplier->id_supplier)->update($data);

        if($restore){
            //redirect dengan pesan sukses
            return redirect('suppliers')->with(['success' => 'Project restored successfully!']);
        }else{
            //redirect dengan pesan error
            return redirect('suppliers')->with(['error' => 'Project restored Failed!']);
        }
    }
}
