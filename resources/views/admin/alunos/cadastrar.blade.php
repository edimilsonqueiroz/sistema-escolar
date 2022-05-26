@include('header.header')

<div class="container-main">
        <div class="mensagem">
            @if(session()->has('sucesso'))
                <div class="alert">{{ session('sucesso') }}</div>  
            @endif                     
        </div>
        <form method="post" class="form" action="{{route('store-aluno')}}">
            @csrf
            <div class="form-control">
                <input type="text" name="nome" placeholder="Nome completo" value="{{old('nome')}}" />
                @error('nome')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <input type="date" name="data_nascimento" value="{{old('data_nascimento')}}" />
                @error('data_nascimento')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <input type="text" name="cpf" placeholder="CPF" value="{{old('cpf')}}"/>
                @error('cpf')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <select name="sexo">
                    <option value="">Selecione o sexo</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                </select>
                @error('sexo')
                    <sapn class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <input type="submit" value="Cadastrar">
                <a href="{{route('alunos')}}">Voltar</a>
            </div>
        </form>
</div>

@include('footer.footer')