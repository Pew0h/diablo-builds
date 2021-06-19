@extends('layouts.app')

@section('title')
    Mes builds enregistrés
@endsection
@section('content')
    <div id="cards_landscape_wrap-2">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-light bg-light w-100 mb-2">
                    <form class="form-inline w-100">
                        <input class="form-control col-8" type="search" name="search" placeholder="Recherche tes builds" aria-label="Search">
                        <button class="col-2 btn btn-outline-success my-2 my-sm-0 ml-2" type="submit">Rechercher</button>
                    </form>

                    @if(request()->has('search') && request()->get('search'))
                        <p class="mt-3 px-2"> Recherche en cours : <span class="font-weight-bold">{{ request()->get('search') }}</span></p>
                    @endif

                </nav>
        @foreach($builds as $build)
                <div class="col-4">
                    <a href="{{ route('hero.show', ['pseudo' => \App\Http\Controllers\Controller::parsePseudo($build->pseudo), 'heroId' =>$build->heroId]) }}">
                        <div class="card-flyer">
                            <div class="text-box">
                                <div class="image-box">
                                    <img src="{{'/images/'.$build->classe.'.jpg'}}" alt="classe" />
                                </div>
                                <div class="text-container">
                                    <h6>{{ $build->nom }}</h6>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <form method="GET" action="{{ route('build.edit', ['build' => $build]) }}">
                                                <button class="btn btn-outline-warning">Modifier</button>
                                            </form>
                                        </div>
                                        <div class="col">
                                            <form method="POST" action="{{ route('build.delete', ['build' => $build]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
        @endforeach
            </div>
            {{ $builds->links() }}
        </div>
    </div>

@endsection

<style>
    /*----  Main Style  ----*/
    #cards_landscape_wrap-2{
        text-align: center;
    }
    #cards_landscape_wrap-2 .container{
        padding-bottom: 100px;
    }
    #cards_landscape_wrap-2 a{
        text-decoration: none;
        outline: none;
    }
    #cards_landscape_wrap-2 .card-flyer {
        border-radius: 5px;
        margin-bottom: 25px;
    }
    #cards_landscape_wrap-2 .card-flyer .image-box{
        background: #ffffff;
        overflow: hidden;
        box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.50);
        border-radius: 5px;
    }
    #cards_landscape_wrap-2 .card-flyer .image-box img{
        -webkit-transition:all .9s ease;
        -moz-transition:all .9s ease;
        -o-transition:all .9s ease;
        -ms-transition:all .9s ease;
        width: 100%;
        height: 200px;
    }
    #cards_landscape_wrap-2 .card-flyer:hover .image-box img{
        opacity: 0.7;
        -webkit-transform:scale(1.15);
        -moz-transform:scale(1.15);
        -ms-transform:scale(1.15);
        -o-transform:scale(1.15);
        transform:scale(1.15);
    }
    #cards_landscape_wrap-2 .card-flyer .text-box{
        text-align: center;
    }
    #cards_landscape_wrap-2 .card-flyer .text-box .text-container{
        padding: 30px 18px;
    }
    #cards_landscape_wrap-2 .card-flyer{
        background: #FFFFFF;
        -webkit-transition: all 0.2s ease-in;
        -moz-transition: all 0.2s ease-in;
        -ms-transition: all 0.2s ease-in;
        -o-transition: all 0.2s ease-in;
        transition: all 0.2s ease-in;
        box-shadow: 0px 3px 4px rgba(0, 0, 0, 0.40);
    }
    #cards_landscape_wrap-2 .card-flyer:hover{
        background: #fff;
        box-shadow: 0px 15px 26px rgba(0, 0, 0, 0.25);
        -webkit-transition: all 0.2s ease-in;
        -moz-transition: all 0.2s ease-in;
        -ms-transition: all 0.2s ease-in;
        -o-transition: all 0.2s ease-in;
        transition: all 0.2s ease-in;
        margin-top: 10px;
    }
    #cards_landscape_wrap-2 .card-flyer .text-box p{
        margin-top: 10px;
        margin-bottom: 0px;
        padding-bottom: 0px;
        font-size: 14px;
        letter-spacing: 1px;
        color: #000000;
    }
    #cards_landscape_wrap-2 .card-flyer .text-box h6{
        margin-top: 0px;
        margin-bottom: 4px;
        font-size: 18px;
        font-weight: bold;
        text-transform: uppercase;
        font-family: 'Roboto Black', sans-serif;
        letter-spacing: 1px;
        color: #00acc1;
    }
</style>
