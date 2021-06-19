@extends('layouts.app')

@section('title')
    Listes des heroes
@endsection

@section('content')
    <center>
        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <div class="form-group">
                <h2 class="text-danger"> {{ $perso['battleTag'] }} </h2>
                <hr>
                <h5 class="text-info">Information générales</h5>
                    <p class="m-0">Nom du compte : {{ $perso['battleTag'] }}</p>
                    <p class="m-0">Nom de la guilde : @if($perso['guildName'] == '') Aucune @else {{ $perso['guildName'] }} @endif</p>
                    <p class="m-0">Nombre de personnages : {{ count($perso['heroes']) }}</p>
                <hr>
                <h5 class="text-info">Information paragon</h5>
                    <p class="m-0">Niveau de paragon : {{ $perso['paragonLevel'] }}</p>
                    <p class="m-0">Niveau de paragon Hardcore : {{ $perso['paragonLevelHardcore'] }}</p>
                    <p class="m-0">Niveau de paragon de la saison : {{ $perso['paragonLevelSeason'] }}</p>
                    <p class="m-0">Niveau de paragon de la saison Hardcore: {{ $perso['paragonLevelSeasonHardcore'] }}</p>
                <hr>
                <h5 class="text-info">Information monstres</h5>
                    <p class="m-0">Nombre de monstres tués : {{ $perso['kills']['monsters']}}</p>
                    <p class="m-0">Nombre de monstres tués en Hardcore : {{ $perso['kills']['hardcoreMonsters']}}</p>
                    <p class="m-0">Nombre de monstres élites tués  : {{ $perso['kills']['elites'] }}</p>
            </div>
        </div>
        <h2 class="text-info">Listes des personnages</h2>
            <div class="table-responsive" style="max-height: 800px;">
                <table class="table table-hover overflow-auto" style="width: 800px;">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Niveau</th>
                    <th scope="col">Pseudo</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($perso['heroes'] as $heroe)
                    <tr>
                        <td><img src="{{ '/images/'.$heroe['classSlug'].'.png' }}"></td>
                        <td>{{ ucwords($heroe['class'])}}</td>
                        <th style="width: 90px;" scope="row">{{ $heroe['level'] }}</th>
                        <td>{{ $heroe['name'] }}</td>
                        <td style="width:150px;"><a class="btn btn-warning" href="{{ route('hero.show', ['pseudo' => \App\Http\Controllers\Controller::parsePseudo($perso['battleTag']), 'heroId' =>$heroe['id'] ]) }}"> Voir le build </a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </center>
@endsection
