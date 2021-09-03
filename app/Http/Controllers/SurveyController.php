<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Survey;
use App\Models\SurveyParticipant;
use App\Models\SurveyResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SurveyController extends Controller
{

    public function index() {
        $sections = Section::all();

        return view('survey.welcome', compact('sections'));
    }

    public function createParticipant() {

        $sections = Section::all();

        return view('survey.participant_details', compact('sections'));
    }

    public function storeParticipant() {
        $sections = Section::all();
        $section = $sections[0];

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
            'gender' => 'required'
        ]);

        $participant = SurveyParticipant::create($data);
       // $participant->create($data);
        return redirect('/explor5/'.$participant->id.'/'.$section->id.'-'.Str::slug($section->title))->with('participant', $participant);
    }

    public function show(SurveyParticipant $participant, Section $section, $slug) {
        $section->load('questions.answers');

        $data = [
            'section' => $section,
            'participant' => $participant
        ];
        return view('survey.show')->with('data', $data);  
    }

    public function store(SurveyParticipant $participant, Section $section, $slug) {
        $sections = Section::all();

        //Handler for section one of the survey
        if($section->id == 1) {
            $data = request()->validate([
                'days_active' => 'required',
                'mins_active' => 'required',
                'activities' => 'required'
            ]);

            $this->calculateScore($section);

            $participant->sectionOneResponse()->create($data);
        }

        //Handler for other sections of the survey
        else {
            $data = request()->validate([
                'responses.*.answer_id' => 'required',
                'responses.*.question_id' => 'required',
            ]);

            //dd($data['responses']);
            //store the participant choice responses to the database
            $participant->responses()->createMany($data['responses']);
        }


        if($section->id < $sections->count()) {
            $section = $sections[$section->id];
            return redirect('/explor5/'.$participant->id.'/'.$section->id.'-'.Str::slug($section->title));
        }

        else {
            return view('survey.complete');
        }
    }

    public function calculateScore(Section $section) {
        switch($section->id) {
            case 1:

                break;

            case 2:
                break;

            case 3:
                break;

            case 4:
                break;

            case 5:
                break;
        }
    }

    
}
