@include('header.header')

<div style="padding-top:50px;" class="container-main">
    <form onSubmit=" return confirm('Deseja excluir os registros selecionados?')" method="post" action="{{route('delete-matricula')}}">
        @csrf
        @method('delete')
        <table id="listar" class="display" style="width:100%;">
            <thead>
                <tr>
                    <th>Selecionar</th>
                    <th>Ano</th>
                    <th>Aluno</th>
                    <th>Turma</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($matriculas as $matricula)
                <tr>
                    <td style="text-align:center;">
                        <input type="checkbox" name="matricula[]" value="{{$matricula->id}}"/>
                    </td>
                    <td>{{$matricula->ano}}</td>
                    @foreach($matricula->aluno()->get() as $aluno)
                    <td>{{$aluno->nome}}</td>
                    @endforeach
                    @foreach($matricula->turma()->get() as $turma)
                    <td>{{$turma->serie}} - {{$turma->nome_escola}}</td>
                    @endforeach
                    <td style="display:flex;">
                        <a class="btn-link" href="{{route('edit-matricula', $matricula->id)}}">Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="menu-table">
            <a href="{{route('create-matricula')}}" class="btn-link-add">Adicionar novo</a>
            <button type="submit" class="btn">Excluir registro selecionado</button>
        </div>
    </form>
</div>

@include('footer.footer')