@extends('layouts.main')

@section('title', 'Cadastrar Novo Álbum - Discografia de Tião Carreiro e Pardinho')
@section('titleH1', 'Cadastrar Álbum')

@section('content')
    <div class="container">

        @if($errors->any())
            <ul class="errors">
                @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('store.album') }}" method="POST">
            @csrf

            <div class="label-float">
                <input type="text" name="albumName" value="{{ old('albumName') }}" placeholder=" " required maxlength="50">
                <label>Nome do Álbum</label>
            </div>

            <div class="label-float">
                <input type="number" name="releaseYear" value="{{ old('releaseYear') }}" placeholder=" " required min="1900" max="{{ date('Y') }}">
                <label>Ano de Lançamento</label>
            </div>

            <div class="label-float">
                <input type="number" name="numberTracks" value="{{ old('numberTracks') }}" placeholder=" " required min="1" max="99">
                <label>Número de Faixas</label>
            </div>

            <input type="submit" value="Cadastrar" class="btn btn-secondary mt-4 mb-4">
        </form>
        
    </div>
@endsection