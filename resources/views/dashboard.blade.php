@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <form method="Post" action="{{ route('dashboard.search') }}">
        @csrf
        <center>
            <div class="shadow-sm p-3 mb-5 bg-white rounded">
                <div class="form-group">
                    <h2> Recherche par joueur </h2>
                </div>
                    <div class="form-group w-50 text-center">
                        <input type="text" class="form-control text-center" id="pseudo" name="pseudo" placeholder="Exemple : Pewoh#2673">
                    </div>
                    @error('pseudo')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    @if(isset($user_error))
                        <p class="text-danger">{{ $user_error }}</p>
                    @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success">Rechercher</button>
                </div>
            </div>
        </center>
    </form>

@endsection
