<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $profiles = Profile::all();

        $categories = Category::all();

        return view('profile.index')->with('profiles',$profiles)->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user_id = auth()->user()->id;

        $profile =  Profile::where('user_id',$user_id)->first();

        if (!$profile) {

            return view('profile.create');

        } else {

            return view('profile.index');

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {

     $user_id = auth()->user()->id;

      if($request->hasFile('image')) {

        $image = $request->image;

        $image_name = time() . $image->getClientOriginalName();

        // check if the user has image already

        if(auth()->user()->profile) {
            Storage::delete('/public/profile_image/'. auth()->user()->profile->image);
        }
        $request->image->storeAs('profile_image', $image_name, 'public');

      }




      $unique_user = Profile::where('user_id',$user_id)->first();


      if(!$unique_user) {

            Profile::create([
                'user_id'       => $user_id,
                'about'         => $request->about,
                'mobile_number' => $request->mobile_number,
                'image'         => $image_name,
                'location'      => $request->location,
              ]);

             Session::flash('success','الملف الشخصي تمت اضافته بنجاح');
             return redirect()->back();
        }

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {


        $name = str_replace('-', ' ', $name);

        $user = User::where('username',$name)->first();
        if($user) {
            return view('profile.show')->with('user',$user);
        } else {
              return view('profile.index');
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {



        $user_id = auth()->user()->id;


        if($request->hasFile('image')) {

          $image = $request->image;

          $image_name = time() . $image->getClientOriginalName();

          // check if the user has image already

          if(auth()->user()->profile) {
              Storage::delete('/public/profile_image/'. auth()->user()->profile->image);
          }

          $request->image->storeAs('profile_image', $image_name, 'public');
        }



              auth()->user()->profile->update([
                  'user_id'       => $user_id,
                  'about'         => $request->about,
                  'mobile_number' => $request->mobile_number,
                  'image'         => $image_name,
                  'location'      => $request->location,
                ]);

               return redirect()->route('profile.index')->with('success','الملف الشخصي تمت تحديثه بنجاح');

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
