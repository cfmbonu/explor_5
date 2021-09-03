<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Section;

class QuestionController extends Controller
{
    public function create(Section $section) {
        return view('question.create', compact('section'));
    }

    public function store(Section $section) {

        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required',
        ]);

        $question = $section->questions()->create($data['question']);

        if($section->hasOptions == 'Yes') {
            $question->answers()->createMany($data['answers']);
        }

        return redirect('/sections/'.$section->id);
    }

    public function destroy(Section $section, Question $question) {
        
        $question->answers()->delete();
        $question->delete();

        return redirect($section->path());
    }
}
