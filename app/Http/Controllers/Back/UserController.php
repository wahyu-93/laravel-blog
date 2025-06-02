<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('back.user.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();

        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->route('users.index')->with('success', 'User Berhasil Ditambahkan');
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
    public function update(UserEditRequest $request, string $id)
    {
        $data = $request->validated();
        $user = User::findOrFail($id);

        if($request->password == ''){
            $user->update([
                'name'  => $request->name,
                'email' => $request->email
            ]);
        }
        else {
            $data['password'] = bcrypt($request->password);
            $user->update($data);
        };

        return redirect()->route('users.index')->with('success', 'User Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('success', 'User Berhasil Dihapus');
    }
}
