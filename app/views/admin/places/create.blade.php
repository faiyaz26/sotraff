@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	{{-- Edit Blog Form --}}
	{{Form::open(array('url' => 'admin/places', 'method' => 'post', 'class' => 'form-horizontal'))}}

		<div class = "form-group">
			<div class = "col-md-12">
				<label class = "control-label" for = "place_name"> Place Name </label>
				<input class = "form-control" type = "text" name = "place_name">
			</div>
		</div>

		<div class = "form-group">
			<div class = "col-md-12">
				<label class = "control-label" for = "place_name"> Place Description</label>
				<textarea class = "form-control" name = "place_description">
				</textarea>
			</div>
		</div>
		<div class = "form-group">
			<div class = "col-md-12">
				<label class = "control-label" for = "place_longitude"> Place  Longitude </label>
				<input class = "form-control" type = "text" name = "place_longitude">
			</div>
		</div>
		<div class = "form-group">
			<div class = "col-md-12">
				<label class = "control-label" for = "place_latitude"> Place Latitude </label>
				<input class = "form-control" type = "text" name = "place_latitude">
			</div>
		</div>


		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-md-12">
				
				<button type="submit" class="btn btn-success">Create</button>
				<element class="btn-cancel close_popup">Cancel</element>
				<button type="reset" class="btn btn-default">Reset</button>
			</div>
		</div>
		<!-- ./ form actions -->
	{{Form::close()}}
@stop
