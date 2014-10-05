@extends('layout')

@section('content')

<div class="container">
    <h1>{{ $category->name }}</h1>

    <table class="table table-striped">

        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Descripcion</th>
            <th>Ver</th>
        </tr>

        @foreach($category->candidates as $candidate)

        <tr>

            <td>{{ $candidate->user->full_name }}</td>
            <td>{{ $candidate->job_type }}</td>
            <td>{{ $candidate->description }}</td>
            <td width="50">
                <a class="btn btn-info" href="">
                    Ver
                </a>
            </td>

        </tr>

        @endforeach

    </table>


</div>

@stop