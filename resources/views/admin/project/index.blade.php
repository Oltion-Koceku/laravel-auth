@extends('layouts.admin')

@section('content')
    <div class="container">

        <h1>Projects</h1>

        @if (session('error'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <div>
                    {{ session('error') }}
                </div>
            </div>
        @endif

        @if (session('good'))
            <div class="alert alert-primary d-flex align-items-center" role="alert">
                <div>
                    {{ session('good') }}
                </div>
            </div>
        @endif





        <form action="{{ route('admin.projects.store') }}" class="d-flex" method="POST">
            @csrf
            <input name="title" class="form-control me-2" type="search" placeholder="Aggiungi il tuo Progetto"
                aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Aggiungi</button>
        </form>



        <table class="table project-table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td class="">
                            <form
                            id="form-{{$project->id}}" action="{{ route('admin.projects.update', $project) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input value="{{ $project->title }}" type="text" name="title">
                            </form>
                        </td>

                        <td>
                            <button onclick="submitform({{$project->id}})" class="btn btn-warning "><i class="fa-solid fa-pencil"></i></button>
                            <button class="btn btn-danger "><i class="fa-solid fa-trash"></i></button>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>

        <script>

            function submitform(id){

                const form = document.getElementById(`form-${id}`)
                 form.submit();
            }

        </script>

    </div>
@endsection
