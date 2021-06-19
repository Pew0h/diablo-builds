<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Retourne un Token pour accéder à l'API de BATTLE.NET
     */
    public static function generateToken()
    {
        $response = Http::asForm()->post('https://eu.battle.net/oauth/token', [
            'grant_type' => 'client_credentials',
            'client_id' => 'fcbdfa44af6a4500b2f8435a2fc156d7',
            'client_secret' => 'jWBtwUZZCXlZaLloh7kRZpK5t6jOUGQV'
        ])->json();
        return $response['access_token'];
    }

    /**
     * Permet de parse le pseudo, dans l'URL le # est un caractère non accepté
     */
    public static function parsePseudo($pseudo)
    {
        return str_replace("#", "%23", $pseudo);
    }
}
