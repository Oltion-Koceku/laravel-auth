@extends('layouts.admin')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger text-center w-25 container">
            @foreach ($errors->all() as $error)
                <h3>{{ $error }}</h3>
            @endforeach
        </div>
    @endif


    <form action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" method="POST" class="m-5 w-50 create">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="emailHelp" value="{{ old('title') }}">
            {{-- con @error message funziona --}}
           @error('title')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    <h3>{{ $message }}</h3>
                </div>
            @enderror


        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Immagine</label>
            <input name="img" type="file" class="form-control @error('img') is-invalid @enderror" id="img" value="{{ old('img') }}">
            @error('thumb')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    <h3>{{ $message }}</h3>
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" type="text" class="form-control" id="description">{{ old('description') }}</textarea>
        </div>


        <button type="submit" class="btn btn-primary p-4 ">Invia</button>
    </form>

@endsection
