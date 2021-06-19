@extends('layouts.app')

@section('title')
    {{$hero['name']}}
@endsection

@section('content')
    <style>
        .table td, .table th{
            vertical-align: middle !important;
        }
    </style>
    <h1 class="text-danger text-center"> <img src="{{ asset('/images/'.$hero['class'].'.png') }}"> {{ $hero['name'] }} <small style="color: cornflowerblue">{{ $hero['paragonLevel'] }}</small> </h1>
    <center><a href="{{route('perso.create', ['heroId' => $hero['id'], 'pseudo' => $pseudo, 'classe' => $hero['class']])}}" type="button" class="btn btn-dark mb-3">Ajouter le build</a></center>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="text-info text-center">Pouvoirs actifs</h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Rune</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hero['skills']['active'] as $skill)
                            <tr>
                                <td><img src="http://media.blizzard.com/d3/icons/skills/42/{{ $skill['skill']['icon'] }}.png"></td>
                                <td><a href="https://eu.diablo3.com/fr-fr{{$skill['skill']['tooltipUrl']}}">{{ $skill['skill']['name'] }}</a></td>
                                <td>
                                    @if(isset($skill['rune']['name']))
                                        {{ $skill['rune']['name'] }}
                                    @else
                                        Aucune
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-6">
                <h3 class="text-info text-center">Pouvoirs passifs</h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th>Image</th>
                            <th>Nom</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hero['skills']['passive'] as $skill)
                            <tr>
                                <td><img src="http://media.blizzard.com/d3/icons/skills/42/{{ $skill['skill']['icon'] }}.png"></td>
                                <td><a href="https://eu.diablo3.com/fr-fr{{$skill['skill']['tooltipUrl']}}">{{ $skill['skill']['name'] }}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <center>
            <h3 class="text-info text-center">Équipements</h3>
            <div class="table-responsive">
                <table class="table table-hover" style="width: 70%;">
                    <thead class="thead-dark">
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hero['items'] as $item)
                        <?php
                        if(isset($item['tooltipParams'])) // Pour éviter tous conflits
                            $link = 'https://eu.diablo3.com/fr-fr'.$item["tooltipParams"].'';
                        else
                            $link = '#';
                        ?>
                        <tr>
                            <td><img src="http://media.blizzard.com/d3/icons/items/small/{{ $item['icon'] }}.png"></td>
                            <td><a style="color: {{$item['displayColor']}}" href="{{$link}}">{{ $item['name'] }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </center>
    </div>

@endsection
