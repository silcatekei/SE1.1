<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $model;

    public function index()
    {
        return response()->json($this->model::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate((new $this->model)->getFillable());

        if ($this->model === \App\Models\User::class && isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

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

        if ($this->model === \App\Models\User::class && isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

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