<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy("created_at", "desc")->paginate(50);

        return view('admin.users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required',
            'user_role' => 'required|max:1'
        ]);

        if ($request->password !== $request->confirm_password) {
            Session::flash('error', "Password And Confirm Password Should same");
            return redirect()->back();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_role' => $request->user_role,
        ]);

        Profile::create([
            'user_id' => $user->id
        ]);

        Session::flash('success', "Successfully User Create");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin/users/edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'user_role' => 'required'
        ]);
        $user = User::find($id);
        if ($request->password === $request->confirm_password) {
            $user->password = bcrypt($request->password);
        } elseif ($request->password !== $request->confirm_password) {
            Session::flash('error', "Password and Confirm Password should same");
            return redirect()->back();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_role = $request->user_role;

        $user->save();
        Session::flash('success', "User Update Successfully");
        return redirect()->route('users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        $user->delete();
        Session::flash('success', "Successfully Trashed");
        return redirect()->back();

    }

    public function trashed()
    {
        $trashed = User::onlyTrashed()->paginate(50);
        return view('admin.users.trashed')->with('trashes', $trashed);
    }

    public function kill($id)
    {
        $user = User::withTrashed()->where("id", $id)->first();
        $user->forceDelete();

        $profile = Profile::all()->where('user_id', $id)->first();
        $profile->delete();

        Session::flash('success', 'Parmanently deleted');
        return redirect()->back();
    }

    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        $user->restore();
        Session::flash('success', 'Restore Successfully Done.');
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'min:3'
        ]);

         $users=User::where('name', 'like', '%'.$request["search"].'%')
                ->orWhere('email', 'like', '%'.$request["search"].'%')->paginate(60);

        return view('admin.users.index')
            ->with('users', $users);

    }


}
