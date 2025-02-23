<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class BaseController extends Controller
{
    protected $model;

    public function index()
    {
        return response()->json($this->model::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->model::create([])->getFillable());
        return response()->json($this->model::create($data), 201);
    }

    public function show($uuid)
    {
        return response()->json($this->model::where('uuid', $uuid)->firstOrFail());
    }

    public function update(Request $request, $uuid)
    {
        $model = $this->model::where('uuid', $uuid)->firstOrFail();
        $data = $request->validate($model->getFillable());
        $model->update($data);
        return response()->json($model);
    }

    public function destroy($uuid)
    {
        $model = $this->model::where('uuid', $uuid)->firstOrFail();
        $model->delete();
        return response()->json(null, 204);
    }
}