@include('header.header')

<div style="padding-top:50px;" class="container-main">
    <form onSubmit=" return confirm('Deseja excluir os registros selecionados?')" method="post" action="{{route('delete-turma')}}">
        @csrf
        @method('delete')
        <table id="listar" class="display" style="width:100%;">
            <thead>
                <tr>
                    <th>Selecionar</th>
                    <th>Nome da turma</th>
                    <th>Nome da escola</th>
                    <th>Série/Ano</th>
                    <th>Ano da turma</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($turmas as $turma)
                <tr>
                    <td style="text-align:center;">
                        <input type="checkbox" name="id[]" value="{{$turma->id}}"/>
                    </td>
                    <td>{{$turma->nome}}</td>
                    <td>{{$turma->nome_escola}}</td>
                    <td>{{$turma->serie}}</td>
                    <td>{{$turma->ano}}</td>
                    <td style="display:flex;">
                        <a class="btn-link" href="{{route('edit-turma', $turma->id)}}">Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="menu-table">
            <a href="{{route('create-turma')}}" class="btn-link-add">Adicionar novo</a>
            <button type="submit" class="btn">Excluir registro selecionado</button>
        </div>
    </form>
</div>

@include('footer.footer')