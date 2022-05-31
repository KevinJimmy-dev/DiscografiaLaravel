<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCreateMusicRequest;
use App\Models\{
    Album,
    Music
};
use Exception;
use Illuminate\Http\Request;

class MusicController extends Controller{
    
    // Redireciona o usuario para a view da criacao da faixa
    public function create($id){
        $albums = Album::allAlbums();

        return view('music.create', compact('albums', 'id'));
    }

    // Faz o cadastro de uma nova faixa
    public function store(StoreCreateMusicRequest $request){
        $info = $request->all();

        $quantityTracks = Album::searchTracks($request->album_id);

        $biggerTrack = Music::searchBiggerTrack($request->album_id);

        $verifyTrack = Album::verifyTrack($quantityTracks, $biggerTrack);

        $existsTrack = Music::searchMusics($request->trackName, $request->album_id);

        if($existsTrack == null){
            if($verifyTrack == true){
                $info['trackNumber'] = $verifyTrack;
            } else{
                return redirect()->back()->with('error', 'Já foi cadastrado o número máximo de faixas nesse Álbum!');
            }
        } else{
            return redirect()->back()->with('error', 'Já existe uma faixa cadastrada com esse nome!');
        }
        
        Music::create($info);

        return redirect()->route('index.discography')->with('success', 'Nova faixa cadastrada com sucesso!');
    }

    // Exclui X faixa de X album
    public function delete(Request $request){
        $id = $request['id'];

        $music = Music::find($id);

        $delete = $music->delete();

        if($delete){
            return redirect()->route('index.discography')->with('success', 'Faixa excluida com sucesso!');
        } else{
            return redirect()->route('index.discography')->with('error', 'Erro ao excluir a faixa!');
        }
    }
}
