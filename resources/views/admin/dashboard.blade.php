
@include('header.header')
    <div class="container-main">
        <div class="main-card">
            <div class="card-info">
                <div class="card-body">
                    {{$matriculas}}
                </div>
                <div class="card-footer">
                    <a href="{{route('matriculas')}}">Matriculas</a>
                </div>
            </div>
            <div class="card-info">
                <div class="card-body">
                    {{$turmas}}
                </div>
                <div class="card-footer">
                    <a href="{{route('turmas')}}">Turmas</a>
                </div>
            </div>
            <div class="card-info">
                <div class="card-body">
                    {{$alunos}}
                </div>
                <div class="card-footer">
                    <a href="{{route('alunos')}}">Alunos</a>
                </div>
            </div>
        </div>
    </div>
@include('footer.footer')