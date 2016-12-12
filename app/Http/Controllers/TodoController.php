<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TodoRequest;
use App\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Todo::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Requests\TodoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $Todo = new Todo;
        $Todo->fill($request->all());
        $Todo->save();

        return response()->json([
            'status' => 'success',
            'data' => $Todo,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Todo::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Requests\TodoRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, $id)
    {
        $Todo = Todo::findOrFail($id);
        $Todo->fill($request->all())->save();

        return response()->json([
            'status' => 'success',
            'data' => $Todo,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Todo = Todo::findOrFail($id);
        $Todo->delete();
        $data = [
            'status'  => 'success',
            'code'    => 200
        ];
        return response()->json($data, 200);
    }
}
