@extends('layouts.admin')

@section('content')
    <div class="container m-5">

        <h1>Projects</h1>



        <table class="table project-table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Img</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td class="">
                            <form id="form-{{ $project->id }}" action="{{ route('admin.projects.update', $project) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <p value="" type="text" name="title">{{ $project->title }}</p>
                            </form>
                        </td>

                        <td>
                            <p>{{ $project->description }}</p>
                        </td>

                        <td>
                            @if ($project->img)
                                <img class="w-100" src="{{ asset('storage/' . $project->img) }}" alt="">
                            @else
                                <img class="w-100" src="/img/no-img.jpg" alt="">
                            @endif
                        </td>

                        <td class="d-flex h-100">
                            <button onclick="submitform({{ $project->id }})" class="btn btn-warning mx-2"><i
                                    class="fa-solid fa-pencil"></i></button>
                            <form onsubmit="return confirm('Sei sicuro di voler eliminare il progietto=')"
                                action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger "><i class="fa-solid fa-trash"></i></button>
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
