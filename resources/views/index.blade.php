@extends('layouts.main')

@section('title', 'Discografia de Tião Carreiro e Pardinho')

@section('titleH1', 'Discografia')

@section('content')
    
        <p>Digite uma palavra chave</p>

        <form action="/" method="GET">
            <div class="input-group mb-3">
                <input type="search" name="search" value="{{ $search }}" class="form-control rounded-pill" placeholder="">
                <input type="submit" value="Procurar" class="btn btn-primary rounded-pill ms-3 px-5 py-3">
            </div>
        </form>

        <div class="results pb-3">
            @if (count($albums) > 0)
                @foreach ($albums as $album)

                    <strong>
                        <p class="mb-0">
                            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal{{$album->releaseYear}}">
                                <i class="fa-solid fa-trash-can"></i>
                            </a> 
                            Álbum: {{ $album->albumName }}, {{ $album->releaseYear }}
                        </p>
                    </strong>

                    <!-- Modal -->
                    <form action="{{route('delete.album', $album->id)}}" method="POST">
                        @csrf
                        @method('delete')

                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="modal fade" id="exampleModal{{$album->releaseYear}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Excluir Álbum</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Deseja realmente excluir o Álbum <strong>{{ $album->albumName }}</strong>, com todas as suas faixas?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <input type="submit" class="btn btn-danger" value="Excluir">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <table class="table table-borderless mb-5">
                        <thead>
                            <tr>
                                <th scope="col" class="col1">N°</th>
                                <th scope="col" class="pe-5 ms-0">Faixa</th>
                                <th scope="col" class="right align">Duração</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($album->musics as $music)
                                <tr>
                                    <td>{{$music->trackNumber}}</td>
                                    <td>{{$music->trackName}}</td>
                                    <td class="right">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal{{$music->id}}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                    <td class="right align">{{$music->songDuration}}</td>
                                </tr>

                                <!-- Modal -->
                                <form action="{{route('delete.music', $music->id)}}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                                    <div class="modal fade" id="exampleModal{{$music->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Excluir Faixa</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Deseja realmente excluir a faixa <strong>{{ $music->trackName }}</strong> do álbum <strong>{{ $album->albumName }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <input type="submit" class="btn btn-danger" value="Excluir">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            @endforeach
                        </tbody>

                        <a href="{{ route('create.music', $album->id) }}">
                            <p class="right">
                                <i class="fa-solid fa-plus"></i> 
                                Adicionar nova faixa ao Álbum {{ $album->albumName }}
                            </p>
                        </a>

                    </table>
                    
                @endforeach

                <a href="{{ route('create.album') }}">Clique aqui para cadastrar um novo álbum!</a>
            @else
                <strong>
                    <p>Nenhum álbum encontrado... 
                        <a href="{{ route('create.album') }}">Clique aqui para cadastrar um novo álbum!</a>
                    </p>
                </strong>
            @endif
        </div>
        
@endsection