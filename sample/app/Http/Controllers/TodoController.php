<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todo_list;
use App\Models\todo_category;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {

      // $todolist = todo_list::all();
      $todolist = todo_list::orderBy('created_at', 'desc')->get();
       return view('todolist', ['todolists' => $todolist]);

     }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
      $user_id = Auth::user()->id;

      $validatedData = $request->validate([
        'text' => 'required', 'string', 'max:50']);
        // $validatedDatar->validate();
        // $todo->todoStore($user->id, $data);
        todo_list::create($validatedData,$user_id);
        return redirect('todolist');

      }
      /**
      * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
