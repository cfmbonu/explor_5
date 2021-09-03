<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Survey;
use Illuminate\Support\Str;
use App\Models\SurveyParticipant;

class SurveyParticipantController extends Controller
{
    //Store the participant data
    public function store() {

        $sections = Section::all();
        $section = $sections[0];

        $data = request()->validate([
            'name' => 'required',
            'email' => 'email',
            //Just in case there are unique email participants in the future
            //'email' => 'email|unique:survey_participants,email',
            'age' => 'required|numeric',
            'gender' => 'required'
        ]);

        $participant = SurveyParticipant::create($data);



       // $participant->create($data);
        return redirect('/explor5/'.$section->id.'-'.Str::slug($section->title))->with(['participant' => $participant]);
    }
}