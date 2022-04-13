@extends('layout')




@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Gallery</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('go.menu',['projet_id'=>$projet->id]) }}">Menu</a></li>
                <li class="breadcrumb-item "><a href="{{ route('suiviActivite.create',['projet_id'=>$projet->id]) }}" role="button" class="btn btn-success">Liste des activités</a></li>
                <li class="breadcrumb-item active">Galerie</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
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

    <div class="card border-danger border-0">
        <div class="card-header bg-success text-center">Nom Projet : {{ $projet->nom }}</div>
            <div class="card-body">
                <div class="row">

                    @foreach($images as $key => $image)
                        <div class="col-sm-3">
                            <img src="{{ asset('images/'.$image->chemin) }}"  class="img-fluid mb-2">
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</div>
        </div>
      </section>
</div>

@endsection
