<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCreateMusicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(){
        return [
            'trackName' => [
                'required',
                'string',
                'min:2',
                'max:100'
            ],
            'songDuration' => [
                'required',
                'string',
                'min:1',
                'max:5'
            ],
            'album_id' => [
                'required'
            ]
        ];
    }

    // Mensagens para o usuario
    public function messages(){
        return [
            'trackName.required' => 'Preencha o campo do nome da Faixa!',
            'trackName.min' => 'O número de caracteres minimo é 2!',
            'trackName.max' => 'O número máximo de caracteres é 100!',
            'songDuration.required' => 'Preencha o campo de duração da Faixa! (Ex: 2:30)',
            'songDuration.min' => 'Preencha o campo de duração da Faixa corretamente! (Ex: 00:30)', 'songDuration.max' => 'Preencha o campo de duração da Faixa corretamente! (Ex: 2:50)',
            'album_id' => 'Selecione um Álbum!'
        ];
    }
}
