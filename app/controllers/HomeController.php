<?php

class HomeController extends BaseController {

	public function __construct(){
	}


	public function index(){

		$title = "Home";
		$places = Place::all();
		$posts = DB::table('posts')->join('users', 'posts.user_id', '=', 'users.id')
    ->join('places', 'posts.place_id', '=', 'places.id')->orderBy('posts.created_at', 'desc')->select('posts.user_id', 'users.username', 'users.email', 'places.id as place_id', 'places.place_name', 'posts.post_body', 'posts.id as post_id', 'posts.jam_value')->get();
    //return $posts;
		return View::make('site/home/index', compact('title', 'places', 'posts'));
	}
}
