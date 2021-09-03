<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Section extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path() {
        return url('/sections/' . $this->id);
    }

    public function publicPath() {
        return url('/explor5/' . $this->id.'-'. Str::slug($this->title));
    }

    // public function user() {
    //     return $this->belongsTo(User::class);
    // }

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function surveys() {
        return $this->belongsTo(Survey::class);
    }

    public function participant() {
        return $this->hasMany(SurveyParticipant::class);
    } 

    public function responses() {
        return $this->hasMany(SurveyResponse::class);
    }
}
