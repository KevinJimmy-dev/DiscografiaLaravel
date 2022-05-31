<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCreateAlbumRequest;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller{

    // Redireciona o usuario para a view da criacao do album
    public function create(){
        return view('album.create');
    }

    // Faz o cadastro de um novo album
    public function store(StoreCreateAlbumRequest $request){
        $info = $request->all();

        $searchAlbum = Album::searchAlbum($request->albumName);

        if($searchAlbum == null){
            Album::create($info);

            return redirect()->route('index.discography')->with('success', 'Novo álbum ' . $request->albumName . ' cadastrado com sucesso!');

        } else{
            return redirect()->back()->with('error', 'Já existe um álbum com esse nome!');
        }
    }

    // Exclui X album
    public function delete(Request $request){
        $id = $request['id'];

        $album = Album::find($id);

        $delete = $album->delete();

        if($delete){
            return redirect()->route('index.discography')->with('success', 'O álbum e todas as suas faixas foram excluidas com sucesso!');
        } else{
            return redirect()->route('index.discography')->with('error', 'Erro ao excluir o álbum e suas faixas!');
        }
    }
}
