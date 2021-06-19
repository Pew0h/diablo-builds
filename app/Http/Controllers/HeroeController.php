<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Notifications\UserBuild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HeroeController extends Controller
{
    public function showAction(Request $request)
    {
        $access_token = Controller::generateToken();
        $pseudo = Controller::parsePseudo($request->pseudo);
        $heroId = $request->heroId;
        $response = Http::get('https://eu.api.blizzard.com/d3/profile/'.$pseudo.'/hero/'.$heroId.'?locale=fr_FR&access_token='.$access_token)->json();
        return view('perso.heroBuild', ['hero' => $response, 'pseudo' => $pseudo]);
    }

    public function create($pseudo, $heroId, $classe)
    {
        return view('perso.create', ['heroId' => $heroId, 'pseudo' => $pseudo, 'classe' => $classe]);
    }

    public function store(Request $request){
        //dd($request->all());
        $this->validate($request, [
            'name'=> 'required',
            'heroId'=> 'required',
            'pseudo'=> 'required',
        ]);
        $build = new Build();
        $build->nom = $request->get('name');
        $build->heroId = $request->get('heroId');
        $build->pseudo = $request->get('pseudo');
        $build->classe = $request->get('classe');
        $build->user_id = auth()->user()->id;
        $build->save();
        auth()->user()->notify(new UserBuild($build)); // Envoyer un email de confirmation
        return redirect()->route('build.index');
    }

    public function index()
    {
        if (request()->has('search'))
        {
            $search = request()->get('search');
            $builds = auth()->user()->builds()->where('nom', 'like', '%' . $search . '%')->paginate(6);
        }
        else
        {
            $builds = auth()->user()->builds()->paginate(6);
        }

        return view('perso.index', ['builds' => $builds]);
    }

    public function edit(Build $build)
    {
        return view('perso.edit', ['build' => $build]);
    }

    public function update(Build $build, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $build->nom = $request->get('name');
        $build->save();
        return redirect()->route('build.index');
    }

    public function delete(Build $build)
    {
        $build->delete();
        return redirect()->route('build.index');
    }
}
