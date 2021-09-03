<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyParticipant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function survey() {
        return $this->belongsTo(Survey::class);
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }

    public function responses() {
        return $this->hasMany(SurveyResponse::class);
    }

    public function sectionOneResponse() {
        return $this->hasOne(SectionOneResponse::class);
    }
}
