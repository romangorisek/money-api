<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


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

    public function create(Request $request)
    {
        if (($this->model)::create($request->all())) {
            return ["Item crated"];
        }
        return ["Item could not be created"];
    }

    public function update(Request $request, $id)
    {
        $element = ($this->model)::find($id);

        if (!$element) {
            // throw item not found exception
        }

        if ($element->update($request->all())) {
            return ["Item updated"];
        }
        return ["Item could not be updated"];
    }
    
    public function delete($id)
    {
        $element = ($this->model)::find($id);

        if ($element && $element->delete()) {
            return ["Item deleted"];
        }
        return ["Item could not be deleted"];
    }
}