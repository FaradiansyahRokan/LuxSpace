<?php

namespace App\Http\Controllers;

use App\Models\TransactionItems;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Transactions::query();
            return DataTables::of($query)->addColumn('action', function($item){
                return '<a href = "'.route('dashboard.transaction.index', $item->id). '" class = "bg-emerald-300 hover:bg-white hover:text-emerald-400 text-white font-bold py-2 px-4 row shadow-lg rounded mx-2">Gallery</a>
                <form class = "inline-block" method = "POST" action = "'.route('dashboard.product.destroy', $item).'">
                <a href = "'.route('dashboard.transaction.show', $item->id). '" class = "bg-pink-400 hover:bg-white hover:text-pink-500 text-white font-bold py-2 px-4 row shadow-lg rounded " >Show</a>
            ';
            })
            ->editColumn('price', function($item){
                return number_format($item->price);
            })
            ->rawColumns(['action'])
            ->make();
        }
        return view('pages.dashboard.transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transactions $transaction)
    {
        if(request()->ajax()){
            $query = TransactionItems::with(['product'])->where('transaction_id' , $transaction->id);
            return DataTables::of($query)
            ->editColumn('price', function($item){
                return number_format($item->product->price);
            })
            ->rawColumns(['action'])
            ->make();
        }
        return view('pages.dashboard.transaction.show' , compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}