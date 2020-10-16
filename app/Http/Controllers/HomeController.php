<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MovieUser;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = auth()->user()->id;

        $sql = "SELECT m.id, m.name AS movie, m.year_published, g.name AS gender, (SELECT count(id) FROM movie_users WHERE movie_id = m.id) AS likes,
        (SELECT count(id) FROM movie_users WHERE movie_id = m.id AND user_id = $userId) AS user_likes
        FROM movies m
        INNER JOIN genders g ON m.gender_id = g.id";

        $data['movies']=DB::select($sql);

        return view('home', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MovieUser  $movie
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request, $id)
    {
        //
        $data = array();
        $data['created_at'] = new \DateTime();
        $data['user_id'] = auth()->user()->id;
        $data['movie_id'] = $id;

        MovieUser::insert($data);

        return redirect('home')->with('message', 'You liked a movie!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MovieUser  $movie
     * @return \Illuminate\Http\Response
     */
    public function dontLike(Request $request, $id)
    {
        //
        $movieUser = MovieUser::where('user_id', '=', auth()->user()->id)
                 ->where('movie_id', '=', $id)
                 ->first();
        
        MovieUser::destroy($movieUser->id);

        return redirect('home')->with('message', "You don't like a movie anymore!");
    }
}
