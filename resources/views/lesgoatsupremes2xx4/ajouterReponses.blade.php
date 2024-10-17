@extends('base')

@section('contenu')
    <h1>Ajouter une réponse</h1>

    @if (session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <form action="{{ route('ajouterreponse.post') }}" method="POST">
        @csrf

        <div>
            <label for="id_question">Choisissez une question :</label>
            <select name="id_question" id="id_question" required>
                <option value="">-- Sélectionnez une question --</option>
                @foreach ($questions as $question)
                    <option value="{{ $question->id_question }}">{{ $question->libelle_question }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="libelle_reponse">Libellé de la réponse :</label>
            <input type="text" name="libelle_reponse" id="libelle_reponse" value="{{ old('libelle_reponse') }}" required>
        </div>

        <div>
            <label for="points">Points :</label>
            <input type="number" name="points" id="points" value="{{ old('points') }}" required>
        </div>

        <button type="submit">Enregistrer la réponse</button>
    </form>
@endsection
