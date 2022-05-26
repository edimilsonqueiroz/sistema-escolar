@include('header.header')

<div class="container-main">
        <div class="mensagem">
            @if(session()->has('sucesso'))
                <div class="alert">{{ session('sucesso') }}</div>  
            @endif                     
        </div>
        <form method="post" class="form" action="{{route('update-aluno', $aluno->id)}}">
            @csrf
            @method('put')
        
            <div class="form-control">
                <input type="text" name="nome" value="{{$aluno->nome}}" placeholder="Nome completo" />
                @error('nome')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <input type="date" value="{{$aluno->data_nascimento}}" name="data_nascimento" />
                @error('data_nascimento')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <input type="text" name="cpf" value="{{$aluno->cpf}}" placeholder="CPF" />
                @error('cpf')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <select name="sexo">
                    @if($aluno->sexo == 'Masculino')
                    <option selected value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    @else
                        <option value="Masculino">Masculino</option>
                        <option selected value="Feminino">Feminino</option>
                    @endif
                </select>
                @error('sexo')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <input type="submit" value="Editar">
                <a href="{{route('alunos')}}">Voltar</a>
            </div>
        </form>
</div>

@include('footer.footer')