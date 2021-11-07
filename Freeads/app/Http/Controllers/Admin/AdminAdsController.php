<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Ads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdRequest;
use Illuminate\Support\Facades\Gate;

class AdminAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ads::all();
        return view('admin.ads.index', compact('ads'));
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
    public function store(Request $request)
    {
        //
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
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function edit(Ads $ad)
    {
        $categories = Category::all();
        return view('admin.ads.edit',compact('ad','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ads  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ads $ad)
    {
        $array_update=[
            'title'=>$request->title,
            'content'=>$request->content
        ];
        $ad->category()->associate($request->category);
        if ($request->image != null){
            $imageName=$request->image->store('ads');
            $array_update=array_merge($array_update,['image'=>$imageName]);
        }
        
        $ad->update($array_update);
        
        return redirect()->route('admin.ads.index')->with('succes','Ad has been modified.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ads $ad)
    {

        $ad->delete();

        return redirect()->route('admin.ads.index')->with('succes','Ad has been deleted.');
    }
}
