<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.view', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string'],
            'department_id' => ['required'],
            'role_id' => ['required'],
            'image' => ['mimes:jpeg,jpg,png'],
            'start_from' => ['required'],
            'designation' => ['required'],
        ]);

       if($request->hasFile('image')){
            $image = $request->image->hashName();
            $request->image->move(public_path('profile'),$image);
        }else{
            $image = 'avatar2.png';
        }

        $data = [
            'name' => $request->firstname . ' ' . $request->lastname,
            'image' => $image,
            'password' => bcrypt($request->password),
        ];

        $user = User::create(array_merge($request->all(), $data));

        return redirect()->route('users.create')->with('success', 'User created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request -> validate([
        //     'firstname' => ['required'],
        //     'lastname' => ['required'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string'],
        //     'department_id' => ['required'],
        //     'role_id' => ['required'],
        //     'image' => ['mimes:jpeg,jpg,png'],
        //     'start_from' => ['required'],
        //     'designation' => ['required'],
        // ]);

        // $user = User::find($id);
        // $data = $request->all();

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '_' . $image->getClientOriginalName();
        //     $image->move(public_path('profile'), $image);
        //     $user->image = $image;
        // }

        // $user->update($data);
        // return redirect()->route('users.index')->with('message', 'User update succesffuly!');

        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required|string|email|max:255|unique:users,email,'.$id,
            'department_id'=>'required',
            'role_id'=>'required',
            'image'=>'mimes:jpeg,jpg,png',
            'start_from'=>'required',
            'designation'=>'required'
        ]);

        $data = $request->all();
        $user = User::find($id);
        if($request->hasFile('image')){
            $image = $request->image->hashName();
            $request->image->move(public_path('profile'),$image);
        }else{
            $image = $user->image;
        }
        if($request->password){
            $password = $request->password;
        }else{
            $password = $user->password;
        }
        $data['image']=$image;
        $data['password']= bcrypt($password);
        $user->update($data);
        return redirect()->back()->with('message','User updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('message','Delete Successffully');
    }
}
