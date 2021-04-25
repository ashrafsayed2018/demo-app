<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }


    public function slug($string, $separator = '-') {
        if (is_null($string)) {
            return "";
        }

        $string = trim($string);

        $string = mb_strtolower($string, "UTF-8");;

        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

        $string = preg_replace("/[\s-]+/", " ", $string);

        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $user_id = auth()->user()->id;

        if($request->hasFile('image')) {

          $image = $request->image;

          $image_name = time() . $image->getClientOriginalName();
          $request->image->storeAs('category_image', $image_name, 'public');

        }



        // dd($request->all());

        $request->validate([
            'category_name' => Rule::unique('categories')->where(function ($query) use ($user_id) {
                return $query->where('user_id', $user_id);
            }),
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // check if there is category


        Category::create([
            'user_id'       => $user_id,
            'category_name'    => $request->category_name,
            'slug'    => $this->slug($request->category_name),
            'image'         => $image_name,

          ]);


         Session::flash('success','تمت اضافته الفئه بنجاح');
         return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $cateogry = Category::where('slug', $slug)->first();

        return view('categories.show')->with('category', $cateogry);
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
        // validation rule for update category name

    //     'category_name' => Rule::unique('categories')->ignore($existingRecordId)->where(function ($query) use ($categoryId) {
    //         return $query->where('category_id', $categoryId);
    //     }),
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
