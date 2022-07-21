@extends('app')

    @section('content')
        <div class="container w-25 border p-4 mt-4 rounded border ">
            <form action="{{route('todos.update', [$todo -> id]) }}" method="POST">
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

                <div class="form-group">
                    <label for="">Titulo</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Titulo" value="{{ $todo->title}}">
                </div>
                <div class="form-group">
                    <label for="">Descripcion</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" >{{ $todo -> description}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    @endsection
