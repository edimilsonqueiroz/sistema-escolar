@include('header.header')

<div style="padding-top:50px;" class="container-main">
    <div class="mensagem">
        @if(session()->has('sucesso'))
            <div class="alert">{{ session('sucesso') }}</div>  
        @endif 
        @if(session()->has('error'))
            <div style="color:brown;">{{ session('error') }}</div>  
        @endif
    </div>

    <form onSubmit="return confirm('Deseja excluir os registros selecionados?') " method="post" action="{{route('delete-aluno')}}">
        @csrf
        @method('delete')
        <table id="listar" class="display" style="width:100%;">
            <thead>
                <tr>
                    <th>Selecionar</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>CPF</th>
                    <th>Sexo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($alunos as $aluno)
                <tr>
                    <td style="text-align:center;">
                        <input type="checkbox" name="id[]" value="{{$aluno->id}}"/>
                    </td>
                    <td>{{$aluno->nome}}</td>
                    <td>{{date('d/m/Y',strtotime($aluno->data_nascimento))}}</td>
                    <td>{{$aluno->cpf}}</td>
                    <td>{{$aluno->sexo}}</td>
                    <td style="display:flex;">
                        <a class="btn-link" href="{{route('edit-aluno',$aluno->id)}}">Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="menu-table">
            <a href="{{route('create-aluno')}}" class="btn-link-add">Adicionar novo</a>
            <button type="submit" class="btn">Excluir registro selecionado</button>
        </div>
    </form>
</div>

@include('footer.footer')