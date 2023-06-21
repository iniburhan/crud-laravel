<?php

namespace App\Http\Controllers\Crud\Transactions;

use App\Models\Crud\Transactions\Transaction;
use App\Models\Crud\Transactions\TransactionDetail;
use App\Models\Crud\Customers\Customer;
use App\Models\Crud\Products\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    public function index()
    {
        // menampilkan data dengan join table
        $transaction = Transaction::select(
            'trx_transactions.*',
            'ms_customers.customer_name'
        )
        ->leftjoin('ms_customers', 'ms_customers.id_customer', '=', 'trx_transactions.id_customer')
        ->where('trx_transactions.flag', 1)
        ->get();

        // mengambil data Product
        $products = Product::get();

        // mengambil data Transaction Detail
        $transaction_detail = TransactionDetail::select(
            'trx_transaction_details.*',
            'products.product_name',
            'products.price',
        )
        ->leftjoin('products', 'products.id_product', '=', 'trx_transaction_details.id_product')
        ->get();

        $data = [
            'transaction'=>$transaction,
            'product' => $products,
            'transaction_detail' => $transaction_detail
        ];

        return view('crud/transactions/transactions', $data);
    }

    public function create()
    {
        // memuat form create
        $product = Product::get(); //ambil data dari model product

        return view('crud/transactions/create-transactions')->with('product', $product);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_product' => 'required',
            'qty' => 'required',
        ]);

        $data  = [
            'id_product' => $request->id_product,
            'qty' => $request->qty,
        ];

        $transaction = TransactionDetail::insert($data);

        // redirect
        if ($transaction) {
            return redirect('transactions')->with('success', 'Project created successfully.');
        } else {
            return redirect('transactions')->with('error', 'Project created Failed.');
        }

    }

    public function show($id_Transaction)
    {
        //

        $Transaction = Transaction::select(
            'transactions.*',
            'customers.customer_name',
        )
            ->join('customers', 'customers.id_customer', '=', 'transactions.id_customer')
            ->where('id_Transaction', $id_Transaction)
            ->first();

        $data = [
            'Transaction' => $Transaction,
        ];
        // return view('crud/transactions/show-transactions', compact('Transaction'));
        return view('crud/transactions/show-transactions')->with('data', $data);
    }

    public function edit($id_transaction)
    {
        //

        $Transaction = Transaction::select(
            'transactions.*',
            'customers.customer_name',
        )
            ->leftjoin('customers', 'customers.id_customer', '=', 'transactions.id_customer')
            ->where('id_transaction', $id_transaction)
            ->first();

        $data = [
            'Transaction' => $Transaction,
        ];
        // return view('crud/transactions/edit-transactions', compact('Transaction'));
        return view('crud/transactions/edit-transactions')->with('data', $data);

    }

    public function update(Request $request)
    {
        // validate 1
        // $request->validate([
        //     'kd_Transaction' => 'required',
        //     'Transaction_name' => 'required',
        //     'price' => 'required'
        // ]);
        // $id_transactions = $request->id_Transaction;

        // validate 2
        // $this->validate($request, [
        //     'kd_Transaction' => 'required',
        //     'Transaction_name' => 'required',
        //     'price' => 'required',
        //     'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     // 'image' => 'required|image|mimes:png,jpg,jpeg'
        // ]);

        // mencari data by id
        // 1
        // $Transaction = Transaction::findOrFail($request->id_Transaction);
        // 2
        // $Transaction = Transaction::where('id_Transaction', $request->id_Transaction)->first();
        // dd($Transaction);

        // upload image 1
        // $image = $request->file('image');
        // $image->storeAs('public/blogs', $image->hashName());

        // upload image 2
        // $image = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('crud/transactions'), $image);

        // update data
        // $Transaction->update([
        //     'kd_Transaction' => $request->kd_Transaction,
        //     'Transaction_name' => $request->Transaction_name,
        //     'price' => $request->price,
        //     'image' => $image
        // ]);

        // dd($Transaction->id_Transaction);

        // $data = [
        //     'kd_Transaction' => $request->kd_Transaction,
        //     'Transaction_name' => $request->Transaction_name,
        //     'price' => $request->price,
        //     'image' => $image,
        // ];

        // update data
        // $update = Transaction::where('id_Transaction', $Transaction->id_Transaction)->update($data);

        // redirect
        // if ($update) {
        //     return redirect('transactions')->with('success', 'Project updated successfully.')
        //                                 ->with('image', $image);
        // } else {
        //     return redirect('transactions')->with('error', 'Project updated Failed.');
        // }
        if (($request->image) == "")
        {
            $this->validate($request, [
                'kd_Transaction' => 'required',
                'Transaction_name' => 'required',
                'price' => 'required',
                'stok' => 'required',
                // 'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $Transaction = Transaction::findOrFail($request->id_Transaction);

            // $image = time() . '.' . $request->image->extension();
            // $request->image->move(public_path('crud/transactions'), $image);

            $data = [
                'kd_Transaction' => $request->kd_Transaction,
                'Transaction_name' => $request->Transaction_name,
                'price' => $request->price,
                'stok' => $request->stok,
                'id_customer' => $request->id_customer,
            ];

            $update = Transaction::where('id_Transaction', $Transaction->id_Transaction)->update($data);

            if ($update) {
                return redirect('transactions')->with('success', 'Project updated successfully.');
            } else {
                return redirect('transactions')->with('error', 'Project updated Failed.');
            }

        } else {
            $this->validate($request, [
                'kd_Transaction' => 'required',
                'Transaction_name' => 'required',
                'price' => 'required',
                'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'stok' => 'required',
                'id_customer' => 'required',
            ]);

            $Transaction = Transaction::findOrFail($request->id_Transaction);

            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('crud/transactions'), $image);

            $data = [
                'kd_Transaction' => $request->kd_Transaction,
                'Transaction_name' => $request->Transaction_name,
                'price' => $request->price,
                'image' => $image,
                'stok' => $request->stok,
                'id_customer' => $request->id_customer,
            ];

            $update = Transaction::where('id_Transaction', $Transaction->id_Transaction)->update($data);

            if ($update) {
                return redirect('transactions')->with('success', 'Project updated successfully.')
                                            ->with('image', $image);
            } else {
                return redirect('transactions')->with('error', 'Project updated Failed.');
            }
        }
    }

    public function destroy(Request $request)
    {
        $transaction = TransactionDetail::findOrFail($request->id_transaction);
        $transaction->delete();

        // $data = [
        //     'flag' => 0,
        // ];
        // $delete = Transaction::where('id_Transaction', $transaction->id_Transaction)->update($data);

        if($transaction){
            //redirect dengan pesan sukses
            return redirect('transactions')->with(['success' => 'Project deleted successfully!']);
        }else{
            //redirect dengan pesan error
            return redirect('transactions')->with(['error' => 'Project deleted Failed!']);
        }


    }

    public function restore(Request $request)
    {
        $Transaction = Transaction::findOrFail($request->id_Transaction);

        $data = [
            'flag' => 1,
        ];
        $restore = Transaction::where('id_Transaction', $Transaction->id_Transaction)->update($data);

        if($restore){
            //redirect dengan pesan sukses
            return redirect('transactions')->with(['success' => 'Project restored successfully!']);
        }else{
            //redirect dengan pesan error
            return redirect('transactions')->with(['error' => 'Project restored Failed!']);
        }
    }
}
