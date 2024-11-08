@extends('base')

@section('contenu')
    <h1>Ajouter une réponse</h1>

    @if (session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <form action="{{ route('ajouterreponse.post') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Sélection de la question -->
        <select name="id_question" required>
            @foreach ($questions as $question)
                <option value="{{ $question->id_question }}">{{ $question->libelle_question }}</option>
            @endforeach
        </select>

        <!-- Champ pour le libellé de la réponse -->
        <input type="text" name="libelle_reponse" value="{{ old('libelle_reponse') }}" required>
        @error('libelle_reponse')
            <p class="error-message">{{ $message }}</p>
        @enderror

        <!-- Champ pour les points -->
        <input type="number" name="points" value="{{ old('points') }}" required>
        @error('points')
            <p class="error-message">{{ $message }}</p>
        @enderror

        <!-- Champ pour uploader une image -->
        <input type="file" name="photo_reponses" accept="image/*">
        @error('photo_reponses')
            <p class="error-message">{{ $message }}</p>
        @enderror

        <!-- Bouton de soumission -->
        <button type="submit">Ajouter la réponse</button>
    </form>
@endsection
