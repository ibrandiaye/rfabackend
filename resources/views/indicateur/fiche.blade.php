@extends('layout')
@section('title', '| indicateur')


@section('content')

<div class="content-wrapper">
        <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-info">Suivi des indicateurs</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ route('go.menu',['projet_id'=>$projet_id]) }}" role="button" class="btn btn-primary">Menu</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('indicateur.create') }}" role="button" class="btn btn-primary">ENREGISTRER indicateur</a></li>
                                </ol>
                            </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
            </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="col-12">
        <div class="row">
            @foreach ($indicateurs as $key=> $indicateur)
                <div class="col-4">
                    <p>{{ $indicateur->indicateur }}</p>
                    <canvas id="myChart{{ $key }}" width="400" height="400"></canvas>
                </div>
            @endforeach
        </div>
    <div class="card border-danger border-0">
        <div class="card-header bg-info text-center">LISTE D'ENREGISTREMENT DES indicateurS</div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>

                            <th>Indicateur</th>
                            <th>Valeur Cible</th>
                            <th>Valeur atteinte</th>
                            <th>Ecart</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($indicateurs as $indicateur)
                        <tr>
                            <td>{{ $indicateur->indicateur }}</td>
                            <td>{{ $indicateur->donneeref }}</td>
                            <td>{{ $indicateur->sum ?  $indicateur->sum  : 0}}</td>
                            <td>{{$indicateur->donneeref - $indicateur->sum }}</td>
                            <td>
                                <a href="{{ route('indicateur.edit', $indicateur->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['indicateur.destroy', $indicateur->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                {!! Form::close() !!}
                                <a href="{{ route('indicateur.resultat', ['indicateur'=>$indicateur->id]) }}" class="btn btn-info">Résultats</a>


                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>



            </div>

        </div>


    </div>
</div>

@endsection
@section('script')
<script>
    @foreach ( $indicateurs as $key=> $indicateur )


const ctx{{ $key }} = document.getElementById('myChart{{ $key }}').getContext('2d');
const myChart{{ $key }} = new Chart(ctx{{ $key }}, {
    type: 'bar',
    data: {
        labels: ['Valeur Cible', 'Valeur atteinte', 'Ecart'],
        datasets: [{
            label: 'Indicateur',
            data: ['{{ $indicateur->donneeref }}', '{{ $indicateur->sum ?  $indicateur->sum  : 0}}', '{{$indicateur->donneeref - $indicateur->sum }}'],
            backgroundColor: [
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
@endforeach
</script>

@endsection
