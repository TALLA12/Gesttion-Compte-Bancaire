@extends('layout.main')

@section('content')
    <a href="{{route('compte.create')}}" class="btn btn-primary mt-3">Nouveau Compte</a>
    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{session('success')}}
        </div>
    @endif

    <h3 class="text-center text-primary">Liste des clients</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Solde Initial</th>
                <th scope="col">Nom complet</th>
                <th scope="col">Type compte</th>
                <th scope="col">Actions</th> {{-- Ajout de la colonne Actions --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($comptes as $compte)
                <tr>
                    <td>{{$compte->solde}}</td>
                    <td>{{$compte->client->nom}} {{$compte->client->prenom}}</td>
                    <td>{{$compte->accountType->label}}</td>
                    <td>
                        {{-- Liens de modification et de suppression ici --}}
                        <a href="{{route('compte.edit',$compte->id)}}" class="btn btn-info">Modifier</a>
                        <a href="{{route('compte.delete',$compte->id)}}" onclick="return confirm('Are you sure')" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
