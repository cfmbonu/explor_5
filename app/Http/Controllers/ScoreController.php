<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\SurveyParticipant;


class ScoreController extends Controller
{
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
