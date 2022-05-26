@include('header.header')

<div class="container-main">
        <div class="mensagem">
            @if(session()->has('sucesso'))
                <div class="alert">{{ session('sucesso') }}</div>  
            @endif                     
        </div>
        <form method="post" class="form" action="{{route('update-turma', $turma->id)}}">
            @csrf
            @method('put')
            <div class="form-control">
                <input type="text" name="nome" value="{{$turma->nome}}" placeholder="Nome da turma"/>
                @error('nome')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <input type="text" value="{{$turma->nome_escola}}" placeholder="Nome da escola" name="nome_escola" />
                @error('nome_escola')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <input type="text" value="{{$turma->serie}}" name="serie" placeholder="Série"/>
                @error('serie')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <input type="number" value="{{$turma->ano}}" name="ano" placeholder="Ano da turma"/>
                @error('ano')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <input type="submit" value="Editar">
                <a href="{{route('turmas')}}">Voltar</a>
            </div>
        </form>
</div>

@include('footer.footer')