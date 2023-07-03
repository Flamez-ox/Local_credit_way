<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Hash;
use Auth;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.pages.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profile_submit(Request $request)
    {
        $admin_data = Admin::where('email', Auth::guard('admin')->user()->email)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if($request->password !='') {
            $request->validate([
                'password' => 'required',
                'Retype_password' => 'required|same:password',
            ]);

            $admin_data->password = Hash::make($request->password);

        }elseif($request->Retype_password !=''){
            $request->validate([
                'password' => 'required|same:Retype_password',
            ]);

            $admin_data->password = Hash::make($request->password);
        }

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif',
            ]);

            unlink(public_path('admin/uploads/'.$admin_data->photo));
            $ext = $request->file('photo')->extension();
            $file = 'admin'.'.'. $ext;
            $request->file('photo')->move(public_path('admin/uploads/'),$file);

            $admin_data->photo = $file;
        }

        $admin_data->name =  $request->name;
        $admin_data->email =  $request->email;
        $admin_data->update();

        return redirect()->back()->with('success', 'Profile Updated Successfully');
        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
