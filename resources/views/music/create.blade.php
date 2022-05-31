@extends('layouts.main')

@section('title', 'Cadastrar Nova Faixa - Discografia de Tião Carreiro e Pardinho')
@section('titleH1', 'Cadastrar Faixa')

@section('content')
    <div class="container">
        @if($errors->any())
            <ul class="errors">
                @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('store.music') }}" method="POST">
            @csrf
            
            <div class="label-float">
                <input type="text" name="trackName" value="{{ old('trackName') }}" placeholder=" " required minlength="2" maxlength="100">
                <label>Nome da Faixa</label>
            </div>

            <div class="label-float">
                <input type="text" name="songDuration" value="{{ old('sondDuration') }}" placeholder=" " required min="1" max="5">
                <label>Duração do Som</label>
            </div>

            <div class="label-float">
                <select class="" aria-label=" " required name="album_id">
                    <option value="">Selecione um Álbum</option>
                    @foreach ($albums as $albumM)
                        <option value="{{ $albumM->id }}" {{ $albumM->id == $id ? 'selected' : ''}}>{{ $albumM->albumName }}</option>
                    @endforeach
                </select>
            </div>
            
            <input type="submit" value="Cadastrar" class="btn btn-secondary mt-4 mb-4">
        </form>

    </div>
@endsection