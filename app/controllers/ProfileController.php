<?php

class ProfileController extends BaseController {

	public function __construct(){
	}

	public function show($id = null){
		if(Auth::guest()){
			return Redirect::to('/');
		}
		if($id==null){
			return Redirect::to('profile/'.Auth::user()->username);
		}

		$user = User::where('username', '=', $id)->first();

		if($user->count() == 0){
			App::abort(404);
		}

		$title = "Profile";
		$places = Place::all();
		$posts = DB::table('posts')->where('posts.user_id', '=', $user->id)->join('users', 'posts.user_id', '=', 'users.id')
    ->join('places', 'posts.place_id', '=', 'places.id')->orderBy('posts.created_at', 'desc')->select('posts.user_id', 'users.username', 'users.email', 'places.id as place_id', 'places.place_name', 'posts.post_body', 'posts.id as post_id', 'posts.jam_value')->get();
   
 		$username = $id;

		return View::make('site/profile/show', compact('user','profile', 'places', 'posts', 'username'));
	}
}
