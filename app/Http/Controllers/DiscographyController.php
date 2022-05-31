<?php

namespace App\Http\Controllers;

use App\Models\{
    Album,
    Music
};
use Illuminate\Http\Request;

class DiscographyController extends Controller{

    // Redireciona o usuario para a view pagina principal
    public function index(){
        $search = request('search');

        $albums = Album::searchAlbumsMusic($search);
        
        return view('index', ['albums' => $albums, 'search' => $search]);
    }
}
