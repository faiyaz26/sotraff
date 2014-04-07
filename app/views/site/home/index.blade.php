@extends('site.layouts.default')

{{-- Content --}}
@section('content')

<div class = "row" style = "margin-left: -80px;">
	<div class="col-md-2">
		<div class="panel panel-info">
			<div class = "panel-heading text-center">
				<h4> {{Auth::user()->fullname}} </h4>
			</div>
			<div class="panel-body">

				<ul class="nav nav-pills nav-stacked">
					<li class="active"><a href="{{ URL::to('/')}}">News Feed</a></li>
					<li><a href="#">Profile</a></li>
					<li><a href="#">Following</a></li>
					<li><a href="#">Follower</a></li>
				</ul>

			</div>
		</div>
	</div>
	<div class="col-md-6">

		<div class = "panel panel-default">

			<div class = "panel-heading">

				{{Form::open(array('url' => 'api/v1/posts', 'id' => 'status'))}}
				<strong> Update Traffic Condition </strong>

				{{Form::textarea('post_body',null, array('id'=>'post_body','class' => 'form-control', 'rows' => 2))}}
				<div class="row">
					<div class="col-lg-6">
						<div class="input-group">
							<select id = "place_id" name = "place_id" class = "form-control" style="width:260px;">
								@foreach ($places as $place)
								<option value = "{{$place->id}}"> {{$place->place_name}} </option>
								@endforeach
							</select>
						</div><!-- /input-group -->
					</div><!-- /.col-lg-6 -->
					<div class="col-lg-6">
						<div class="input-group" style= "background-color: white; padding-left: 5%;">
							<label for="jam_value">Jam Level</label>
							<input type="text" name = "jam_value" class="span2" value="" data-slider-min="1" data-slider-max="6" data-slider-step="1" data-slider-value="3" data-slider-orientation="horizontal" data-slider-selection="after" data-slider-tooltip="show">
						</div><!-- /input-group -->
					</div><!-- /.col-lg-6 -->
				</div><!-- /.row -->
				<button type = "submit" class = "btn btn-primary">
					Share
				</button>
				{{Form::close()}}

			</div>

			<div class = "panel-body">
				<div id = "posts">
					@foreach($posts as $post)
					<div class = "well">
						<div class = "row">
							<div class = "col-md-8">
								<p>
									<?php
									$email = trim($post->email);
										        $email = strtolower( $email ); // "myemailaddress@example.com"
										        $email = md5( $email );
										        ?>
										        <div class = "row">
										        	<div class = "col-md-6">
										        		<img src="http://www.gravatar.com/avatar/{{$email}}?s=50" alt="" class="img-rounded img-responsive" />
										        	</div>
										        	<div class = "col-md-6" style = "margin-left: -30%;">
										        		<a href = "{{URL::to('profile/'.$post->username)}}"><h3>{{$post->username}} </h3></a>
										        	</div>
										        </div>
										        <a href = "{{URL::to('post/'.$post->post_id)}}">{{Post::find($post->post_id)->created_at()}} </a>
										    </p>
										    <blockquote>
										    	<p>{{$post->post_body}}</p>
										    </blockquote>

										</div>
										<div class = "col-md-4 text-center">
											<div class = "panel panel-success">
												<div class = "panel-heading">
													<h4>{{$post->place_name}}</h4>
												</div>

												<div class = "panel-body">
													<h3>
														<span class="label

														@if($post->jam_value <= 2)
														{{'label-success'}} 
														@elsif(@post->jam_value <= 4)
														{{'label-warning'}}
														@else
														{{'label-danger'}}
														@endif
														">
														{{$post->jam_value}}
													</span>
												</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>

					</div>

				</div>



			</div>
			<div class="col-md-4"><h1> Map </h1></div>
		</div>

		@stop


		@section('scripts')
		<script>

		//callback handler for form submit
		$("#status").submit(function(e)
		{
			var postData = $(this).serializeArray();
			var formURL = $(this).attr("action");
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : postData,
				success:function(data, textStatus, jqXHR) 
				{
					console.log(data);

					$( "#posts" ).prepend(data);
					$("#post_body").val("");
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					console.log('Failed');		
				}
			});
		    e.preventDefault();	//STOP default action
		    e.unbind(); //unbind. to stop multiple form submit.
		});
		$("#place_id").select2();
		$('.span2').slider()
		</script>
		@stop