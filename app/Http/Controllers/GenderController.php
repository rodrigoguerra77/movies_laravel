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
        $fields = [
            'name' => 'required|string|unique:genders|max:100'
        ];
        $message = [
            'required' => 'The: attribute is required.',
            'string' => 'The: attribute is of type text.',
            'max' => 'The: attribute has a maximum of 100 characters.',
            'unique' => 'The: attribute is unique.'
        ];

        $this->validate($request, $fields, $message);

        $dataGender = request()->except('_token');
        $dataGender['created_at'] =new \DateTime();
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
        $fields = [
            'name' => 'required|string|max:100'
        ];
        $message = [
            'required' => 'The: attribute is required.',
            'string' => 'The: attribute is of type text.',
            'max' => 'The: attribute has a maximum of 100 characters.',
            'unique' => 'The: attribute is unique.'
        ];

        $this->validate($request, $fields, $message);

        $dataGender = request()->except(['_token', '_method']);
        Gender::where('id', '=', $id)->update($dataGender);

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
