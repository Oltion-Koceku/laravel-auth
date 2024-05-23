@extends('layouts.admin')

@section('content')
    <div class="container m-5">

        <h1>Technologies</h1>

        @if ($errors->any())
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{-- with --}}

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





        <form action="{{ route('admin.technologies.store') }}" class="d-flex" method="POST">
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
                @foreach ($technologies as $technologie)
                    <tr>
                        <td class="">
                            <form id="form-{{ $technologie->id }}"
                                action="{{ route('admin.technologies.update', $technologie) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input value="{{ $technologie->title }}" type="text" name="title">
                            </form>
                        </td>

                        <td class="d-flex">
                            <button onclick="submitform({{ $technologie->id }})" class="btn btn-warning mx-2"><i
                                    class="fa-solid fa-pencil"></i></button>
                            <form onsubmit="return confirm('Sei sicuro di voler eliminare il progetto?')"
                                action="{{ route('admin.technologies.destroy', $technologie) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>

                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>

        <script>
            function submitform(id) {

                const form = document.getElementById(`form-${id}`)
                form.submit();
            }
        </script>

    </div>
@endsection
