<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        return view('Questionnaire.create');
    }

    public function store(){
        $data = request()->validate([
           'title' => 'required',
           'purpose' => 'required'
        ]);

        //typical way
        //$data['user_id'] = auth()->user()->id;
        //$questionnaire = Questionnaire::create($data);

        //using mass assignment
        $questionnaire = auth()->user()->questionnaires()->create($data);

        return redirect()->route('questionnaire.show', $questionnaire->id);
    }

    public function show(Questionnaire $questionnaire){
        $questionnaire->load('questions.answers');
        //dd($questionnaire);
        return view('questionnaire.show', compact('questionnaire'));
    }
}
