<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ads;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAdRequest;
use Illuminate\Support\Facades\Gate;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ads::with('category','user')->latest()->paginate(6);
        if (request('category')){
            $catname=request('category');
            $ads = Ads::with('category','user')->whereHas('category',function($q) use($catname){
                $q->where('name','=',$catname);
            })->latest()->paginate(6);
        }
        if (request('search')){
            $ads = Ads::where('title','LIKE','%'.request('search').'%')->with('category','user')->latest()->paginate(6);
        }
        $bestusers = Ads::with('category','user')->selectRaw('user_id, count(id) as countads')->groupBy('user_id')->orderBy('countads','desc')->limit(5)->get();
        $categories = Category::all();
        $last=Ads::latest()->first();
        return view('ads.index', compact('ads','categories','last','bestusers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        return view('ads.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdRequest $request)
    {
        $imageName=$request->image->store('ads');

        Ads::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'image'=>$imageName
        ]);

        return redirect()->route('dashboard')->with('succes','Ad has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function show(Ads $ad)
    {
        return view('ads.show',compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function edit(Ads $ad)
    {
        if (! Gate::allows('update-ads',$ad)){
            abort(403);
        }
        $categories = Category::all();
        return view('ads.edit',compact('ad','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreAdRequest  $request
     * @param  \App\Models\Ads  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAdRequest $request, Ads $ad)
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
        
        
        return redirect()->route('dashboard')->with('succes','Ad has been modified.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ads $ad)
    {
        if (! Gate::allows('update-ads',$ad)){
            abort(403);
        }

        $ad->delete();

        return redirect()->route('dashboard')->with('succes','Ad has been deleted.');
    }
}
