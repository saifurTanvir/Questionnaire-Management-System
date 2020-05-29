<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function create(Questionnaire $questionnaire, $slug){
        $questionnaire->load('questions.answers');

        return view('Survey.create', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire, $slug){

        $data = request()->validate([
           'response.*.answer_id' => 'required',
           'response.*.question_id' => 'required',
           'survey.name' => 'required',
           'survey.email' => 'required|email'
        ]);

        $survey = $questionnaire->surveys()->create($data['survey']);
        $survey->response()->createMany($data['response']);

        return 'Thank You!';




    }
}
