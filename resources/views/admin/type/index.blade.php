@extends('layouts.admin')

@section('content')
    <div class="container m-5">

        <h1>Types</h1>

        @if ($errors->any())
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
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





        <form action="{{ route('admin.types.store') }}" class="d-flex" method="POST">
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
                @foreach ($types as $type)
                    <tr>
                        <td class="">
                            <form id="form-{{ $type->id }}" action="{{ route('admin.types.update', $type) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <input value="{{ $type->title }}" type="text" name="title">
                            </form>
                        </td>

                        <td class="d-flex">
                            <button onclick="submitform({{ $type->id }})" class="btn btn-warning mx-2"><i
                                    class="fa-solid fa-pencil"></i></button>
                        <form onsubmit="return confirm('Sei sicuro di voler eliminare il progietto=')" action="{{route('admin.types.destroy', $type)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger "><i class="fa-solid fa-trash"></i></button>
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
