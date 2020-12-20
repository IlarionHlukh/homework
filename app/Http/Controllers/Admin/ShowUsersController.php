<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShowUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::query()->where('id', $id)->first();

        if ($user) {
            $user->is_admin = 0;
            $user->save();
        }
        return redirect(route('users.index'))->with('success', 'Role successfully updated!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::query()->where('id', $id)->first();

        if ($user) {
            $user->is_admin = 1;
            $user->save();
        }
        return redirect(route('users.index'))->with('success', 'Role successfully updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete($id);

        // Redirect user with a deleted notification
        return response()->json([
            'success' => 'User deleted successfully!'
        ]);
    }
}
