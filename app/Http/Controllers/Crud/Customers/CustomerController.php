<?php

namespace App\Http\Controllers\Crud\Customers;

use App\Models\Crud\Customers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index()
    {
        $data = [
            'flag' => 1,
        ];

        $customer = Customer::where($data)->get();

        return view('crud/customers/customers', ['customer'=>$customer]);

    }

    public function create()
    {
        // memuat form create
        return view('crud/customers/create-customers');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_name' => 'required',
            'gender' => 'required',
            'telp' => 'required',
            'address' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('crud/customers'), $image);

        $data  = [
            'customer_name' => $request->customer_name,
            'gender' => $request->gender,
            'telp' => $request->telp,
            'address' => $request->address,
            'image' => $image,
            'flag' => 1, // untuk soft delete kalau 1 berarti eksis
        ];

        $customer = Customer::insert($data);

        // redirect
        if ($customer) {
            return redirect('customers')->with('success', 'Project created successfully.');
                                    // ->with('image', $image);
        } else {
            return redirect('customers')->with('error', 'Project created Failed.');
        }

    }

    public function show($id_customer)
    {
        //
        // dd($id_customer);
        $customer = Customer::where('id_customer', $id_customer)->first();

        $data = [
            'customer' => $customer,
        ];
        return view('crud/customers/customers')->with('data', $data);
    }

    public function edit($id_customer)
    {
        //
        $customer = Customer::where('id_customer', $id_customer)->first();

        $data = [
            'customer' => $customer,
        ];
        return view('crud/customers/customers')->with('data', $data);

    }

    public function update(Request $request)
    {
        if (($request->image) == "")
        {
            $this->validate($request, [
                'customer_name' => 'required',
                'gender' => "required",
                'telp' => 'required',
                'address' => 'required',
                // 'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $customer = Customer::findOrFail($request->id_customer);

            // $image = time() . '.' . $request->image->extension();
            // $request->image->move(public_path('crud/customers'), $image);

            $data = [
                'customer_name' => $request->customer_name,
                'gender' => $request->gender,
                'telp' => $request->telp,
                'address' => $request->address,
            ];

            $update = Customer::where('id_customer', $customer->id_customer)->update($data);

            if ($update) {
                return redirect('customers')->with('success', 'Project updated successfully.');
            } else {
                return redirect('customers')->with('error', 'Project updated Failed.');
            }

        } else {
            $this->validate($request, [
                'customer_name' => 'required',
                'gender' => "required",
                'telp' => 'required',
                'address' => 'required',
                'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $customer = Customer::findOrFail($request->id_customer);

            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('crud/customers'), $image);

            $data = [
                'customer_name' => $request->customer_name,
                'gender' => $request->gender,
                'telp' => $request->telp,
                'address' => $request->address,
                'image' => $image,
            ];

            $update = Customer::where('id_customer', $customer->id_customer)->update($data);

            if ($update) {
                return redirect('customers')->with('success', 'Project updated successfully.')
                                            ->with('image', $image);
            } else {
                return redirect('customers')->with('error', 'Project updated Failed.');
            }
        }
    }

    public function destroy(Request $request)
    {
        $customer = Customer::findOrFail($request->id_customer);

        $data = [
            'flag' => 0,
        ];
        $delete = Customer::where('id_customer', $customer->id_customer)->update($data);

        if($delete){
            //redirect dengan pesan sukses
            return redirect('customers')->with(['success' => 'Project deleted successfully!']);
        }else{
            //redirect dengan pesan error
            return redirect('customers')->with(['error' => 'Project deleted Failed!']);
        }


    }
    public function restore(Request $request)
    {
        $customer = Customer::findOrFail($request->id_customer);

        $data = [
            'flag' => 1,
        ];
        $restore = Customer::where('id_customer', $customer->id_customer)->update($data);

        if($restore){
            //redirect dengan pesan sukses
            return redirect('customers')->with(['success' => 'Project restored successfully!']);
        }else{
            //redirect dengan pesan error
            return redirect('customers')->with(['error' => 'Project restored Failed!']);
        }
    }
}
