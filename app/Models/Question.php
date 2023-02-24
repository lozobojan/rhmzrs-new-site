<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TEXT_ANSWER_RADIO = [
        '0' => 'No',
        '1' => 'Yes',
    ];

    public $table = 'questions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'text',
        'text_answer',
        'questionnaire_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function questionAnswers()
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class, 'questionnaire_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
