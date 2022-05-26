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
        <form method="post" class="form" action="{{route('update-matricula', $matricula->id)}}">
            @csrf
            @method('put')
            <div class="form-control">
                <select name="aluno">
                    @foreach($matricula->aluno()->get() as $aluno)
                        <option selected value="{{$aluno->id}}">{{$aluno->nome}}</option>
                    @endforeach
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
                    @foreach($matricula->turma()->get() as $turma)
                        <option selected value="{{$turma->id}}">{{$turma->serie}} - {{$turma->nome_escola}}</option>
                    @endforeach
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
                <input type="number" name="ano" placeholder="Ano da matricula" value="{{$matricula->ano}}"/>
                @error('ano')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <h3>Selecionar disciplina</h3>
            <hr>
            <div class="checkbox">
                @foreach($matricula->disciplinas()->get() as $disciplinaMatricula)
                    <div class="wrapper">
                        <input checked type="checkbox" name="disciplina[]" value="{{$disciplinaMatricula->id}}">
                        <p>{{$disciplinaMatricula->nome}}</p>
                    </div>
                @endforeach
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
                <input type="submit" value="Editar">
                <a href="{{route('matriculas')}}">Voltar</a>
            </div>
        </form>
</div>

@include('footer.footer')