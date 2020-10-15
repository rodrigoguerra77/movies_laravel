<?php

namespace App\Http\Controllers;

use App\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['genders']=Gender::paginate(5);
        return view('genders.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('genders.create');
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
        //$dataGender = request()->all();
        $dataGender = request()->except('_token');

        Gender::insert($dataGender);

        return redirect('genders')->with('message', 'The gender was saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function show(Gender $gender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $gender = Gender::findOrFail($id);

        return view('genders.edit', compact('gender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dataGender = request()->except(['_token', '_method']);
        Gender::where('id', '=', $id)->update($dataGender);

        //$gender = Gender::findOrFail($id);
        //return view('genders.edit', compact('gender'));

        return redirect('genders')->with('message', 'The gender has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Gender::destroy($id);

        return redirect('genders')->with('message', 'The gender was removed successfully');
    }
}
