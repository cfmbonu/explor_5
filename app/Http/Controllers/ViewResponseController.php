<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\SectionOneResponse;
use App\Models\SurveyParticipant;
use App\Models\Section;
use App\Models\SurveyResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ViewResponseController extends Controller
{
    //

    public function show() {
        return view('view_responses.view');
    }

    public function search(Request $request) {

        $data = request()->validate([
            'emailSearch'=> 'required'
        ]);

        //we fetch a collection since the participants will take the survey twice.
        $result = SurveyParticipant::where('email', $request->query('email', $data['emailSearch']))->get();
        

        return view('view_responses.view')->with('participantsFound', $result);
    }

    public function showAll() {

        //we fetch a collection since the participants will take the survey twice.
        $result = SurveyParticipant::all();
        

        return view('view_responses.view')->with('participantsFound', $result);
    }

    public function showResponse(SurveyParticipant $participant) {
        $data = $this->getParticipantResponse($participant);
        
        return view('view_responses.participant_reponse')-> with('data', $data);
    }


    //This is a helper method for getting a particular participant responses
    public function getParticipantResponse(SurveyParticipant $participant) {
        //Fetch all the sections
        $sections = Section::all();

        //Then fetch all the questions in each section
        foreach($sections as $section) {
            $section['questions'] = Question::where('section_id', $section->id)->get();

            //fetch the response to each question if section id is not 1, fetch SectionOneReponse
            foreach($section['questions'] as $question) {

                if($section->id != 1) {
                    $question['response'] = SurveyResponse::where('survey_participant_id', $participant->id)
                                                                    ->where('question_id', $question->id)
                                                                    ->first();

                    $question['response']['choiceString'] = Answer::where('id', $question['response']->answer_id)->first()->answer;
                }

                else {
                    $question['response'] = SectionOneResponse::where('survey_participant_id', $participant->id)->first();
                }
            }
        
        }
        $data = [
            'participant' => $participant,
            'sections' => $sections,
        ];

        return $data;
    }

    public function processData(SurveyParticipant $participant) {
        $data = $this->getParticipantResponse($participant);

        $columns = array('name', 'email', 'age', 'gender',);
        $rows = array(
            $row['name'] = $participant->name,
            $row['email'] = $participant->email,
            $row['age'] = $participant->age,
            $row['gender'] = $participant->gender,
        );

        foreach($data['sections'] as $section) {
        
            foreach($section['questions'] as $question) {
                array_push($columns, $question->question);

                if($section->id == 1) {

                    if($question->id == 1) {
                        $row[$question->question] = $question['response']->days_active;
                    }
                    else if($question->id == 2) {
                        $row[$question->question] = $question['response']->mins_active;
                    }

                    else {
                        $row[$question->question] = $question['response']->activities;
                    }
                    array_push($rows, $row[$question->question]);
                }

                else {
                    $row[$question->question] = $question['response']->choiceString;
                    array_push($rows, $row[$question->question]);
                }
            }
        }

        $table = [
            'participant' => $participant,
            'columns' => $columns,
            'rows' => $rows
        ];
        return $table;
    }

    public function generateAllCSVReport() {
        $participants = SurveyParticipant::all();


        $fileName = "explor_5_responses_data.csv"; 
        $file = fopen($fileName, 'w+');


        foreach($participants as $key => $participant) {
            $table = $this->processData($participant);

            if($key == 0) {
                fputcsv($file, $table['columns']);             
            }

            fputcsv($file, $table['rows']);
        }

        fclose($file);

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        return response()->download($fileName, $fileName, $headers );

    }

    public function generateCSVReport(SurveyParticipant $participant) {


        $table = $this->processData($participant);

        $fileName =$table['participant']->name."_explor_5_response.csv";

        $file = fopen($fileName, 'w+');
            
        fputcsv($file, $table['columns']);
     
        fputcsv($file, $table['rows']);

        fclose($file);

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        return response()->download($fileName, $fileName, $headers );

    }
}
