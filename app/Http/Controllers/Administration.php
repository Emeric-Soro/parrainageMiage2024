<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Reponses;
use \Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\ajoutQuestionsBd;
class Administration extends Controller
{
    //les vues

    //vue de ajouter question
    public function vueAjouterQuestion(): View
    {
        return view('lesgoatsupremes2xx4.ajouterQuestion');
    }
    //vue de ajouter reponses
    public function vueAjouterReponses(): view
    {
        //je recupere tout de questions
        $questions = Question::all();

        //je retourne la vue avec la variable questions comme données
        return view('lesgoatsupremes2xx4.ajouterReponses', compact('questions'));
    }


    //fin des vues










    //fonction pour ajouter une question dans la base
    public function bdAjouterQuestion(Request $request)
    {
        // Validation des données, incluant l'image
        $request->validate([
            'libelle_question' => 'required|string|max:250',
            'photo_question' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation pour les images
        ]);

        // Insertion dans la base
        $question = new Question();
        $question->libelle_question = $request->input('libelle_question');

        // Gérer l'upload de l'image s'il y en a une
        if ($request->hasFile('photo_question')) { // Utilisation de hasFile() pour vérifier s'il y a un fichier
            $imagePath = $request->file('photo_question')->store('questions', 'public'); // Stocker dans 'public/storage/questions'
            $question->photo_question = $imagePath;
        }

        // Enregistrer les dates de création et mise à jour
        $question->created_at = now();
        $question->updated_at = now();
        $question->save();

        // Redirection avec message de succès
        return redirect()->route('ajouterquestions')->with('success', 'Question ajoutée avec succès !');
    }



    //fonction pour ajouter les reponses dans la base
    public function bdAjouterReponse(Request $request)
    {
        // Validation des données, incluant l'image
        $request->validate([
            'id_question' => 'required|exists:questions,id_question', // Vérifie que l'id_question existe
            'libelle_reponse' => 'required|string|max:250',
            'points' => 'required|integer',
            'photo_reponses' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation pour les images
        ]);

        // Insertion dans la base
        $reponse = new Reponses();
        $reponse->id_question = $request->input('id_question');
        $reponse->libelle_reponse = $request->input('libelle_reponse');
        $reponse->points = $request->input('points');

        // Gérer l'upload de l'image si elle existe
        if ($request->hasFile('photo_reponses')) {
            // Stocker l'image dans le répertoire public/storage/reponses
            $imagePath = $request->file('photo_reponses')->store('reponses', 'public');
            $reponse->photo_reponses = $imagePath;
        }

        // Enregistrer la date de création et mise à jour
        $reponse->created_at = now();
        $reponse->updated_at = now();
        $reponse->save();

        // Redirection avec un message de succès
        return redirect()->route('ajouterreponses')->with('success', 'Réponse ajoutée avec succès.');
    }


}
