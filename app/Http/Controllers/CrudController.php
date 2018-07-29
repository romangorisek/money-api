<?php

namespace App\Http\Controllers;

class CrudController extends Controller {

    public function __construct()
    {
        
    }

    public function all()
    {
        return ($this->model)::all();
    }

    public function get($id)
    {
        return ($this->model)::find($id);
    }
    
    public function delete($id)
    {
        $element = ($this->model)::find($id);

        if ($element && $element->delete()) {
            return ["Item deleted"];
        }
        return ["Item could not be deleted"];
    }
    // create
    // edit
}