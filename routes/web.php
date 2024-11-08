<?php

use App\Http\Controllers\admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration;

Route::get('/', function () {
    return view('welcome');
});

//get

//route vers la vue de ajouter question
Route::get('/ajouterquestions', [Administration::class, 'vueAjouterQuestion'])->name('ajouterquestions');
//route vers la vue de ajouter responses au question
Route::get('/ajouterreponses', [Administration::class, 'vueAjouterReponses'])->name('ajouterreponses');


//fin get



//post

//route pour l'ajout de la questions
Route::post('/ajouterquestions', [Administration::class, 'bdAjouterQuestion'])->name('ajouterquestions.post');
//route pour l'ajout des reponses
Route::post('/ajouterreponses', [Administration::class, 'bdAjouterReponse'])->name('ajouterreponse.post');