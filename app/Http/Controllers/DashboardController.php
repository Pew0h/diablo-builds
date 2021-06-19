<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{

    public function searchAction(Request $request)
    {
        $access_token = Controller::generateToken();
        $this->validate($request, [
            'pseudo' => 'required'
        ]);
        $pseudo = $request->get('pseudo');
        $pseudo = Controller::parsePseudo($pseudo);
        $response = Http::get('https://eu.api.blizzard.com/d3/profile/'.$pseudo.'/?locale=fr_FR&access_token='.$access_token.'');
        if($response->failed())
        {
            return view('dashboard', ['user_error' => 'L\'utilisateur n\'existe pas']);
        }
        return view('perso.listHeroes', ['perso' => $response->json()]);
    }

    public function adminUsers(Request $request)
    {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }
}
