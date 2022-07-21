<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

class TodosController extends Controller
{
    /**
     * index para mostrar todos los todos
     * store para guardar los todos
     * update para actualizar los todos
     * destroy para eliminar los todos
     * edit para mostrar el formulario de edicion de todos
     */

    public function store(Request $request)
    {
        $request ->validate([
            'title' => 'required | min:3',
            'description' => 'required | min:3',
        ]);

        $todo = new Todo();
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->category_id = $request->category_id;
        $todo->save();

        return redirect()->route('todos.index')->with('success', 'Todo creado correctamente');
    }

    public function index()
    {
        $todos = Todo::all();
        $categories = Category::all();
        return view('todos.index', ['todos' => $todos, 'categories' => $categories]);
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        return view('todos.show', ['todo' => $todo]);
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->save();

        return redirect()->route('todos.index')->with('success', 'Todo actualizado correctamente');
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'Todo eliminado correctamente');
    }

}
