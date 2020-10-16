<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Gender;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['movies']=Movie::paginate(5);
        return view('movies.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['genders']=Gender::all();
        return view('movies.create',$data);
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
        $fields = [
            'name' => 'required|string|unique:movies|max:100',
            'year_published' => 'required',
            'gender_id' => 'required'
        ];
        $message = [
            'required' => 'The :attribute is required.',
            'string' => 'The :attribute is of type text.',
            'integer' => 'The :attribute is of type integer.',
            'max' => 'The :attribute has a maximum of :max characters.',
            'unique' => 'The :attribute is unique.'
        ];

        $this->validate($request, $fields, $message);

        $dataMovie = request()->except('_token');
        $dataMovie['created_at'] =new \DateTime();

        Movie::insert($dataMovie);

        return redirect('movies')->with('message', 'The movie was saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['movie'] = Movie::findOrFail($id);
        $data['genders']=Gender::all();
        return view('movies.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $fields = [
            'name' => 'required|string|max:100',
            'year_published' => 'required',
            'gender_id' => 'required'
        ];
        $message = [
            'required' => 'The :attribute is required.',
            'string' => 'The :attribute is of type text.',
            'integer' => 'The :attribute is of type integer.',
            'max' => 'The :attribute has a maximum of :max characters.',
            'unique' => 'The :attribute is unique.'
        ];

        $this->validate($request, $fields, $message);

        $dataMovie = request()->except(['_token', '_method']);
        Movie::where('id', '=', $id)->update($dataMovie);

        return redirect('movies')->with('message', 'The movie has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Movie::destroy($id);

        return redirect('movies')->with('message', 'The movie was removed successfully');
    }
}
