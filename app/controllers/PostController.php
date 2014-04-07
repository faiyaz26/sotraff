<?php

class PostController extends BaseController {

	public function __construct(){
	}


	public function index(){
		$posts = Post::all();
		return Response::json(array(
		        'error' => false,
		        'posts' => $posts->toArray()),
		        200
		    );
	}

	public function create(){

	}

	public function store(){
		$post = new Post;
		$post->post_body = Input::get('post_body');
		$post->user_id = Auth::user()->id;
		$post->place_id = Input::get('place_id');
		$post->jam_value = Input::get('jam_value');
		$place_name = Place::find(Input::get('place_id'))->first()->place_name;
		if($post->save()){
			$email = trim(Auth::user()->email);
	        $email = strtolower( $email ); // "myemailaddress@example.com"
	        $email = md5( $email );
	        $username = Auth::user()->username;

	        $label = "";
		    if($post->jam_value <= 2){
		    	$label = "label-success";
		    }else if($post->jam_value <= 4){
		    	$label = "label-warning";
		    }else{
		    	$label = "label-danger";
		    }

			$html = '<div class = "well">
						<div class = "row">
							<div class = "col-md-8">
								<p>
										        <div class = "row">
										        	<div class = "col-md-6">
										        		<img src="http://www.gravatar.com/avatar/'.$email.'?s=50" alt="" class="img-rounded img-responsive" />
										        	</div>
										        	<div class = "col-md-6" style = "margin-left: -30%;">
										        		<a href = "'.URL::to("profile/".$username).'"><h3>'.$username.' </h3></a>
										        	</div>
										        </div>
										        <a href = "'.URL::to("post/".$post->id).'">'.Post::find($post->id)->created_at() .'</a>
										    </p><blockquote>
										    	<p>'.$post->post_body.'</p>
										    </blockquote>

										</div>
										<div class = "col-md-4 text-center">
											<div class = "panel panel-success">
												<div class = "panel-heading">
													<h4>'.$place_name.'</h4>
												</div>

												<div class = "panel-body">
													<h3>
														<span class="label

														'.$label.'
														">'.
														$post->jam_value.
														'
													</span>
												</h3>
											</div>
										</div>
									</div>
								</div>
							</div>';

			return $html;
		}else{
			return Response::json(array(
		        'error' => true,
		        'posts' => 'NA'),
		        200
		    );
		}
	}

	public function show($id){
		$post = Post::find($id);
		$user = User::find($post->user_id);
		$place = Place::find($post->place_id);
		$title = "Post";

		return View::make('site/post/show', compact('title', 'post', 'user', 'place'));
	}
}
