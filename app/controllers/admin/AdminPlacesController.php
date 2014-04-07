<?php

class AdminPlacesController extends AdminController
{
    public function index(){
        $title = "Place Management";
        return View::make('admin/places/index', compact('title'));
    }

    public function create(){
        $title = "Place Management";
        return View::make('admin/places/create', compact('title'));
    }

    public function store(){

        $place = new Place;
        $place->place_name = Input::get('place_name');
        $place->place_description = Input::get('place_description');
        $place->place_latitude = Input::get('place_latitude');
        $place->place_longitude = Input::get('place_longitude');

        if($place->save()){
            return Redirect::to('admin/places/'.$place->id.'/edit');
        }else{
            $error = $place->errors()->all();
            return Redirect::to('admin/places/create')
                    ->withInput(Input::all())
                    ->with( 'error', $error );
        }
    }


    public function edit($id){
        $place = Place::find($id);
        $title = "Place Management";
        return View::make('admin/places/edit', compact('place','title'));
    }


    public function update($id){
        $place = Place::find($id);
        $place->place_name = Input::get('place_name');
        $place->place_description = Input::get('place_description');
        $place->place_latitude = Input::get('place_latitude');
        $place->place_longitude = Input::get('place_longitude');
        if($place->save()){
            $success = 'Updated';
            return Redirect::to('admin/places/'.$place->id.'/edit')->with('success',$success);
        }else{
            $error = $place->errors()->all();
            return Redirect::to('admin/places/'.$place->id.'/edit')
                    ->withInput(Input::all())
                    ->with( 'error', $error );
        }
    }
    public function destroy(){

    }

    /**
     * Show a list of all the comments formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function getData()
    {
        $places = Place::select(array('places.id', 'places.place_name', 'places.place_description'));

        return Datatables::of($places)
        ->add_column('actions', '<a href="{{{ URL::to(\'admin/places/\' . $id . \'/edit\' ) }}}" class="btn btn-default btn-xs iframe" >{{{ Lang::get(\'button.edit\') }}}</a>
                <a href="{{{ URL::to(\'admin/places/\' . $id . \'/delete\' ) }}}" class="btn btn-xs btn-danger iframe">{{{ Lang::get(\'button.delete\') }}}</a>
            ')

        ->remove_column('id')

        ->make();
    }

}
