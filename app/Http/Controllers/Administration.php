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

        //validation des données
        $request->validate([
            'libelle_question' => 'required|string|max:250',
        ]);

        //insertion des quest dans la base
        $question = new Question();
        $question->libelle_question = $request->input('libelle_question');
        $question->created_at = now();
        $question->updated_at = now();
        $question->save();

        //redirection vers la mm page avec un message
        return redirect()->route('ajouterquestions')->with('success', 'questions ajouté !');
        ;
    }


    //fonction pour ajouter les reponses dans la base
    public function bdAjouterReponse(Request $request)
    {
        // Validation des données
        $request->validate([
            'id_question' => 'required|exists:questions,id_question', // Vérifie que l'ID de la question existe
            'libelle_reponse' => 'required|string|max:250',
            'points' => 'required|integer',
        ]);

        // Insertion des réponses dans la base de données
        $reponse = new Reponses();
        $reponse->id_question = $request->input('id_question');
        $reponse->libelle_reponse = $request->input('libelle_reponse');
        $reponse->points = $request->input('points');
        $reponse->created_at = now();
        $reponse->updated_at = now();
        $reponse->save();

        // Redirection avec message de succès
        return redirect()->route('ajouterreponses')->with('success', 'Réponse ajoutée avec succès');
    }

}
