@include('header.header')

<div class="container-main">
        <div class="mensagem">
            @if(session()->has('sucesso'))
                <div class="alert">{{ session('sucesso') }}</div>  
            @endif                     
        </div>
        <form method="post" class="form" action="{{route('store-turma')}}">
            @csrf
            <div class="form-control">
                <input type="text" name="nome" placeholder="Nome da turma" value="{{old('nome')}}" />
                @error('nome')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <input type="text" placeholder="Nome da escola" name="nome_escola" value="{{old('nome_escola')}}" />
                @error('nome_escola')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <input type="text" name="serie" placeholder="Série" value="{{old('serie')}}"/>
                @error('serie')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <input type="number" name="ano" placeholder="Ano da turma" value="{{old('ano')}}"/>
                @error('ano')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <input type="submit" value="Cadastrar">
                <a href="{{route('turmas')}}">Voltar</a>
            </div>
        </form>
</div>

@include('footer.footer')