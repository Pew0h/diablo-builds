@extends('layouts.app')

@section('title')
    Liste des utilisateurs
@endsection

@section('content')
    <h1 style="text-align: center">Liste des utilisateurs</h1>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">Date de création</th>
            <th scope="col">Type de compte</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ date('d/m/Y H:i:s', strtotime($user->created_at)) }}</td>
            <td>{{ $user->is_admin ? 'Administrateur' : 'Membre' }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection
