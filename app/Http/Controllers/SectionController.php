<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Section;
use App\Models\SurveyResponse;

class SectionController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function create() {
        return view('section.create');
    }

    public function store() {
        $data = request()->validate([
            'title' => 'required',
            'hasOptions'=> 'required',
            'purpose' => 'required'
        ]);

        // $data['user_id'] = auth()->user()->id;

        // $questionnaire = Questionnaire::create($data);

        if(auth()->user()) {
            $section = Section::create($data);

            return redirect('/sections/'.$section->id);
        }
        else {
            return redirect('/home');
        }

        
    }

    public function show(Section $section) {

        $section->load('questions.answers.responses');

        return view('section.show', compact('section'));

    }
}
