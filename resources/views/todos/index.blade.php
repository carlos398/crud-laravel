@extends('app')

    @section('content')
        <div class="container w-25 border p-4 mt-4 rounded border ">
            <form action="{{route('todos.store')}}" method="POST">
                @csrf
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ (session('success')) }}
                    </div>
                @endif

                @error('title')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-group mb-4">
                    <label for="">Titulo</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Titulo">
                </div>
                <div class="form-group mb-4">
                    <label for="">Descripcion</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="">Categoria</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>


        </div>

        <div class="container ">
            <div class="row justify-content-center">
                @foreach ($todos as $todo)
                    <div class="card mx-4 my-4 text-center col-sm-4">
                        <a href="{{ route('todos.show', [$todo -> id]) }} " class='card'>
                            <div class="card-header">
                                <h4>{{ $todo -> title}}</h4>
                            </div>
                            <div  class="card-body">
                                <p>{{ $todo -> description}}</p>
                            </div>
                        </a>
                        <div class="card-footer">
                            <form action="{{ route('todos.destroy', [$todo -> id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
