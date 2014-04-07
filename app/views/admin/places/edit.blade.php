@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	{{-- Edit Blog Form --}}
	<h2> Edit Contest </h2>
	@if ($errors->all())
		<div class="alert alert-danger">
			{{  HTML::ul($errors->all()) }}
		</div>
	@endif
	@if (isset($success))
		<div class = "alert alert-success">
			{{$success}}
		</div>
	@endif
	{{ Form::model($place, array('route' => array('admin.places.update', $place->id), 'method' => 'PUT', 'class' => "form-horizontal")) }}
		<div class = "form-group">
			<div class = "col-md-12">
				<label class = "control-label" for = "place_name"> Place Name </label>
				{{form::text('place_name', null, array('class' => "form-control"))}}
			</div>
		</div>

		<div class = "form-group">
			<div class = "col-md-12">
				<label class = "control-label" for = "place_description"> Place Description</label>
				{{form::textarea('place_description', null, array('class' => "form-control"))}}
			</div>
		</div>
		<div class = "form-group">
			<div class = "col-md-12">
				<label class = "control-label" for = "place_longitude"> Place  Longitude </label>
				{{form::text('place_longitude', null, array('class' => "form-control"))}}
			</div>
		</div>
		<div class = "form-group">
			<div class = "col-md-12">
				<label class = "control-label" for = "place_latitude"> Place Latitude </label>
				{{form::text('place_latitude', null, array('class' => "form-control"))}}
			</div>
		</div>


		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-md-12">
				
				<button type="submit" class="btn btn-success">Update</button>
				<element class="btn-cancel close_popup">Cancel</element>
				<button type="reset" class="btn btn-default">Reset</button>
			</div>
		</div>
		<!-- ./ form actions -->
	{{Form::close()}}
@stop
