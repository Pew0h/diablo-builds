@extends('layouts.app')

@section('title')
    Modification du build
@endsection

@section('content')
    <div class="text-center pb-3">
        <img style="width: 15%" src="{{ asset('/images/build_icon.png') }}">
    </div>

    <div class="row">
        <form class="w-100" method="POST" action="{{ route('build.update', ['build' => $build]) }}}">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="price">Identifiant du personnage</label>
                    <input type="number" class="form-control" name="heroId" id="heroId" placeholder="{{$build->heroId}}" value="{{$build->heroId}}" readonly>
                    @error('heroId')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="price">Pseudo de l'utilisateur</label>
                    <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="{{$build->pseudo}}" value="{{$build->pseudo}}" readonly>
                    @error('pseudo')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group col-md-12">
                    <label for="name">Nom du build</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="{{$build->nom}}" value="{{$build->nom}}">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-outline-success w-12">Modifier le build</button>
            </div>
        </form>
    </div>
@endsection
