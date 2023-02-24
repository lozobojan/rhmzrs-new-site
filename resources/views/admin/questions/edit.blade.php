@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.question.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.questions.update", [$question->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="text">{{ trans('cruds.question.fields.text') }}</label>
                <input class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}" type="text" name="text" id="text" value="{{ old('text', $question->text) }}" required>
                @if($errors->has('text'))
                    <span class="text-danger">{{ $errors->first('text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.text_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.question.fields.text_answer') }}</label>
                @foreach(App\Models\Question::TEXT_ANSWER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('text_answer') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="text_answer_{{ $key }}" name="text_answer" value="{{ $key }}" {{ old('text_answer', $question->text_answer) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="text_answer_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('text_answer'))
                    <span class="text-danger">{{ $errors->first('text_answer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.text_answer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="questionnaire_id">{{ trans('cruds.question.fields.questionnaire') }}</label>
                <select class="form-control select2 {{ $errors->has('questionnaire') ? 'is-invalid' : '' }}" name="questionnaire_id" id="questionnaire_id" required>
                    @foreach($questionnaires as $id => $entry)
                        <option value="{{ $id }}" {{ (old('questionnaire_id') ? old('questionnaire_id') : $question->questionnaire->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('questionnaire'))
                    <span class="text-danger">{{ $errors->first('questionnaire') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.questionnaire_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection