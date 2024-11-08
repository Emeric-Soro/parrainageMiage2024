@extends('base')

@section('contenu')
    <h1>Ajouter une question</h1>
    @if (session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif
    <form action="{{ route('ajouterquestions.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="libelle_question" value="{{ old('libelle_question') }}" required>
        @error('libelle_question')
            <p class="error-message">{{ $message }}</p>
        @enderror

        <!-- Champ pour uploader une image -->
        <input type="file" name="photo_question" accept="image/*">
        @error('photo_question')
            <p class="error-message">{{ $message }}</p>
        @enderror

        <button type="submit">Enregistrer</button>
    </form>
@endsection
