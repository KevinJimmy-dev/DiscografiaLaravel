<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCreateAlbumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(){
        return [
            'albumName' => [
                'required',
                'string',
                'min:3',
                'max:50'
            ],
            'releaseYear' => [
                'required',
                'min:4',
                'max:4'
            ],
            'numberTracks' => [
                'required',
                'min:1',
                'max:2'
            ],
        ];
    }

    // Mensagens para o usuario
    public function messages(){
        return [
            'albumName.required' => 'Preencha o campo do Nome do Álbum!',
            'albumName.min' => 'O Nome do Álbum deve conter no minimo 3 caracteres!',
            'albumName.max' => 'O Nome do Álbum deve conter no maximo 50 caracteres!',
            'releaseYear.required' => 'Preencha o campo do Ano de Lançamento!',
            'releaseYear.min' => 'O Ano de Lançamento deve conter 4 digitos! (Ex: 2004)',
            'releaseYear.max' => 'O Ano de Lançamento deve conter 4 digitos! (Ex: 2004)',
            'numberTracks.required' => 'Preencha o campo de quantas Faixas o Álbum possui!',
            'numberTracks.min' => 'O Número de Faixas tem que ser maior do que 1!',
            'numberTracks.max' => 'O Número de Faixas está muito alto!'
        ];
    }
}
