<?php

namespace App\Http\Controllers;

use App\Models\Question;
use \Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\ajoutQuestionsBd;
class Administration extends Controller
{
    //vue de ajouter question
    public function vueAjouterQuestion(): View
    {
        return view('lesgoatsupremes2xx4.ajouterQuestion');
    }
    //fonction pour ajouter une question dans la base
    public function bdAjouterQuestion(Request $request)
    {

        //validation des données
        $request->validate([
            'libelle_question' => 'required|string|max:250',
        ]);

        //insertion dans la base
        $question = new Question();
        $question->libelle_question = $request->input('libelle_question');
        $question->created_at = now();
        $question->updated_at = now();
        $question->save();

        //redirection vers la mm page avec un message
        return redirect()->route('ajouterquestions')->with('success', 'questions ajouté !');
        ;
    }
}
