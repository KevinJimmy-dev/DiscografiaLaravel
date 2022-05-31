<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model{

    use HasFactory;

    protected $fillable = [
        'albumName',
        'releaseYear',
        'numberTracks'
    ];

    // Relacao N:1 com as faixas
    public function musics(){
        return $this->hasMany('App\Models\Music');
    }

    // Retorna todos os albums cadastrados
    public static function allAlbums(){
        $albums = Album::all();

        return $albums;
    }

    // Retorna o resultado da busca do album
    public static function searchAlbum($albumName){
        $album = Album::where([
            ['albumName', $albumName]
        ])->get()->first();

        return $album;
    }

    // Retorna o(s) album(s) e suas faixas encontradas 
    public static function searchAlbumsMusic($title){
        if($title != null){
            $albums = Album::where([
                ['albumName', 'like', '%' . $title . '%']
            ])->with('musics')->get();
            
        } else{
            $albums = Album::all();
        }

        return $albums;
    }

    // Retorna o o numero de faixas que contem X album 
    public static function searchTracks($id){
        $tracks = Album::select('numberTracks')
                  ->where('id', $id)
                  ->get()->first();

        return $tracks;
    }

    // Verifica se e possivel cadastrar uma nova faixa em X album
    public static function verifyTrack($quantityTracks, $biggerTrack){
        $trackNumber = $biggerTrack + 1;

        if($quantityTracks->numberTracks >= $trackNumber){
            return $trackNumber;
        } else{
            return false;
        }
    }
    
}
