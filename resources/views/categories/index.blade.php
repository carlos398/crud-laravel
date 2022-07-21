@extends('app')

    @section('content')
        <div class="container w-25 border p-4 my-4">
            <div class="row mx-auto">
                <form action="{{route('categories.store') }}" method="POST">
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
                        <input type="text" class="form-control" name="name" id="title" placeholder="Titulo" >
                    </div>
                    <div class="form-group mb-2">
                        <label for="color">Color de categoria</label>
                        <input type="color" class="form-control" name="color" id="color" placeholder="color" >
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Guardar categoria</button>
                </form>
            </div>

            <div class="row justify-content-center">
                @foreach ($categories as $category)
                    <div class="card mx-4 my-4 text-center col-sm-6" style="background-color:{{ $category -> color}}">
                        <a href="{{ route('categories.show', [$category -> id]) }} " class='card m-4' style="background-color:{{ $category -> color}}">
                            <div class="card-header" >
                                <h4>{{ $category -> name}}</h4>
                            </div>
                        </a>
                        <form action="{{ route('categories.destroy', [$category -> id]) }}" method="POST" >
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>

                    </div>
                @endforeach
            </div>

        </div>
    @endsection
