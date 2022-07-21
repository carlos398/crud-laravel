@extends('app')

    @section('content')
        <div class="container w-25 border p-4 mt-4 rounded border ">
            <form action="{{route('categories.update', [$category -> id]) }}" method="POST">
                @method('PATCH')
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

                <div class="form-group mb-2">
                    <label for="name">Nombre de la categoria</label>
                    <input type="text" class="form-control" name="name" id="title" placeholder="Titulo" value="{{$category -> name}}" >
                </div>
                <div class="form-group mb-2">
                    <label for="color">Color de categoria</label>
                    <input type="color" class="form-control" name="color" id="color" placeholder="color" value="{{$category -> color}}">
                </div>
                <button type="submit" class="btn btn-primary mt-4">Guardar categoria</button>
            </form>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                @if ($category->todos->count() > 0)
                    @foreach ($category->todos as $todo)
                        <div class="card mx-4 my-4 text-center col-sm-4" >
                            <a href="{{ route('todos.show', [$todo -> id]) }} " class='card m-4' style="background-color:{{ $category -> color}}">
                                <div class="card-header" >
                                    <h4>{{ $todo -> title}}</h4>
                                </div>
                                <div class="card-body" >
                                    <h4>{{ $todo -> description}}</h4>
                                </div>
                            </a>
                            <div class="card-footer">
                                <form action="{{ route('categories.destroy', [$category -> id]) }}" method="POST" >
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-info">
                        No hay todos para esta categoria
                    </div>
                @endif
            </div>
        </div>
    @endsection
