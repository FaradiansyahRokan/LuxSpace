<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = User::query();
            return DataTables::of($query)->addColumn('action', function($item){
                return '
                <a href = "'.route('dashboard.user.edit', $item->id). '" class = "bg-pink-400 hover:bg-white hover:text-pink-500 text-white font-bold py-2 px-4 row shadow-lg rounded " >Edit</a>
                <form class = "inline-block" method = "POST" action = "'.route('dashboard.user.destroy', $item).'">
                '.method_field('delete'). csrf_field(). '
                <button class = "bg-indigo-400 hover:bg-white hover:text-indigo-500 text-white font-bold py-2 px-4 mx-2 row shadow-lg rounded py-1.5 " type = "submit" >Delete</button>
                </form>';
            })
            ->rawColumns(['action'])
            ->make();
        }
        return view('pages.dashboard.user.index');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.dashboard.user.edit' , [
            'item' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();
        
        $user->update($data);

        return redirect()->route('dashboard.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('dashboard.user.index');
    }
}
