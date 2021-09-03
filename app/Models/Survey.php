<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function section() {
    //     return $this->belongsTo(Section::class);
    // }

    public function responses() {
        return $this->hasMany(SurveyResponse::class);
    }

    public function participants() {
        return $this->hasMany(SurveyParticipant::class);
    }

    public function section() {
        return $this->hasMany(Section::class);
    }

    public function user() {
        return $this->hasOne(User::class);
    }
}
