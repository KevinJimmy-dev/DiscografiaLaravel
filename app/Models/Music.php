<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model{
    
    use HasFactory;

    protected $fillable = [
        'trackName',
        'songDuration',
        'trackNumber',
        'album_id'
    ];

    // Relacao 1:N com as faixas
    public function album(){
        return $this->belongsTo('App\Models\Album');
    }

    // Retorna o resultado da pesquisa da faixa pelo nome dela
    public static function searchMusics($trackName, $album_id){
        $music = Music::select('trackName')
                ->where('trackName', $trackName)
                ->where('album_id', $album_id)
                ->first();

        return $music;
    }

    // Retorna a maior track que contem X album
    public static function searchBiggerTrack($album_id){
        $biggerTrack = Music::where('album_id', $album_id)
                       ->max('trackNumber');
                       
        return $biggerTrack;
    }
}
