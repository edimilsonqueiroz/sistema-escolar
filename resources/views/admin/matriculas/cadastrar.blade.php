@include('header.header')

<div class="container-main">
        <div class="mensagem">
            @if(session()->has('sucesso'))
                <div class="alert">{{ session('sucesso') }}</div>  
            @endif 
            @if(session()->has('error'))
                <div style="color:brown;">{{ session('error') }}</div>  
            @endif
        </div>
        <form method="post" class="form" action="{{route('store-matricula')}}">
            @csrf
            <div class="form-control">
                <select name="aluno">
                    <option value="">Selecione o aluno</option>
                    @foreach($alunos as $aluno)
                        <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
                    @endforeach
                </select>
                @error('aluno')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <select name="turma">
                    <option value="">Selecione a turma</option>
                    @foreach($turmas as $turma)
                        <option value="{{$turma->id}}">{{$turma->serie}} - {{$turma->nome_escola}}</option>
                    @endforeach
                </select>
                @error('turma')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <input type="number" name="ano" placeholder="Ano da matricula" value="{{old('ano')}}"/>
                @error('ano')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <h3>Selecionar disciplina</h3>
            <hr>
            <div class="checkbox">
                @foreach($disciplinas as $disciplina)
                    <div class="wrapper">
                        <input type="checkbox" name="disciplina[]" value="{{$disciplina->id}}">
                        <p>{{$disciplina->nome}}</p>
                    </div>
                @endforeach
            </div>
            <div class="form-control">
                @error('disciplina')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <input type="submit" value="Cadastrar">
                <a href="{{route('matriculas')}}">Voltar</a>
            </div>
        </form>
</div>

@include('footer.footer')