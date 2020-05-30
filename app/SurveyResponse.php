<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    protected $guarded = [];
    public function survey(){
        return $this->belongsTo(Survey::class);
    }

    public function questionnaire(){
        return $this->belongsTo(Questionnaire::class);
    }

    public function answer(){
        return $this->belongsTo(Answer::class);
    }

    public function question(){
        return $this->belongsTo(Answer::class);
    }
}
