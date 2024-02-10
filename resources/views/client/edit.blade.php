@extends('layout.main')

@section('content')

    <h3>New client</h3>
    <form method="POST" action="{{route('client.update',$client->id)}}" >
        @csrf
        <div class="form-group">
            <label>Nom :</label>
            <input class="form-control" value="{{ $client->nom }}" type="text" name="nom">
        </div>
        @error('nom')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <div class="form-group">
            <label>Prenom:</label>
            <input class="form-control" value="{{ $client->prenom }}" type="text" name="prenom">
        </div>
        <div class="form-group">
            <label>CNI</label>
            <input class="form-control" value="{{ $client->CNI }}" type="text" name="CNI">
        </div>
        <div class="form-group">
            <label>Adresse</label>
            <input class="form-control" value="{{ $client->adresse }}" type="text" name="adresse">
        </div>
        <div class="form-group">
            <label>Date de naissance</label>
            <input class="form-control" value="{{ $client->date_naissance }}" type="date" name="date_naissance">
        </div>
        <button class="btn btn-success mt-3" type="submit">Modifier</button>
    </form>
@endsection
