<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function survey() {
        return $this->belongsTo(Survey::class);
    }

    public function participant() {
        return $this->belongsTo(SurveyParticipant::class);
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }
}
