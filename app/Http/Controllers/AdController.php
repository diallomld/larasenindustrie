<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Region;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function __construct(){
        $this->middleware("auth")->except(['show','index','search']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonces = Ad::all();

        return view('ad.index', compact('annonces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();
        $categories = Category::all();
        return view("ad.create", compact('regions','categories'));
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
            'title' => ['required', 'min:5'],
            'content' => ['required', 'min:10'],
            'adresse' => ['required', 'min:5'],
            'prix' => 'required',
            'category_id' => ['required','exists:App\Models\Category,id'],
            'region_id' => ['required','exists:App\Models\Region,id'],
            "image" => ['nullable','mimes:jpeg,jpg,png','max:1024'],

        ]);

        if ($request->hasFile("image")) {
            
            $image = $request->file('image');
            $extension = $request->file('image')->extension();
            $filename = time().'-'.uniqid().'.'.$extension;

            //$image->move('uploads/annonces', $filename);
            $path = $request->file('image')->storeAs('annonces',$filename, 'public');
        }

        $ad = new Ad();
        $ad->title = $validated['title'];
        $ad->content = $validated['content'];
        $ad->adresse =$validated['adresse'];
        $ad->prix =$validated['prix'];
        $ad->region_id =$validated['region_id'];
        $ad->category_id =$validated['category_id'];
        if (isset($path)) {
            $ad->image = $path;
        }
        $ad->user_id = auth()->user()->id;
        $ad->save();


        return redirect()->route('dashboard')->with('success',' Votre annonce a ete créee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $annonce)
    {
        return view('ad.show', compact('annonce'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $annonce)
    {
        $regions = Region::all();
        $categories = Category::all();

        return view('ad.edit', compact('annonce','regions','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $annonce)
    {
        $request->validate([
            'title' => ['required', 'min:5'],
            'content' => ['required', 'min:10'],
            'adresse' => ['required', 'min:5'],
            'prix' => 'required',
            'category_id' => ['required','exists:App\Models\Category,id'],
            'region_id' => ['required','exists:App\Models\Region,id']

        ]);
        $annonce->update($request->all());
        return redirect()->route('dashboard')->with('success', 'Annonce modife avec success');
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

    public function search()
    {
        request()->validate([
            'search' => 'required|min:3',
        ]);

        $query = request()->input('search');
        $words = '%'. $query . '%';

        $ads = [];
    
        $ads = Ad::where('title', 'like', $words)->orWhere('content', 'like', $words)->get();
        //dd($this->ads);
    
        return view('ad.search',[
            'annonces' => $ads
        ]);
    }
}
