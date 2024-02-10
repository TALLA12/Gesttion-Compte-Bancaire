@extends('layout.main')

@section('content')
    <h3 class="text-center text-primary">Modifier le Compte</h3>

    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('compte.update', $compte->id) }}">
        @csrf
        @method('post')

        <div class="form-group">
            <label for="solde">Solde Initial:</label>
            <input type="text" class="form-control" id="solde" name="solde" value="{{ $compte->solde }}">
        </div>

        <div class="form-group">
            <label for="client">Client:</label>
            <select class="form-control" id="client" name="client_id">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $compte->client_id ? 'selected' : '' }}>
                        {{ $client->nom }} {{ $client->prenom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="accountType">Type de Compte:</label>
            <select class="form-control" id="accountType" name="account_type_id">
                @foreach($accountTypes as $accountType)
                    <option value="{{ $accountType->id }}" {{ $accountType->id == $compte->account_type_id ? 'selected' : '' }}>
                        {{ $accountType->label }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    </form>
@endsection
