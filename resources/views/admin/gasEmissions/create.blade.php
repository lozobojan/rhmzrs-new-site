@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.gasEmission.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.gas-emissions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.gasEmission.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\GasEmission::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', 'direct') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.gasEmission.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="gas">{{ trans('cruds.gasEmission.fields.gas') }}</label>
                <input class="form-control {{ $errors->has('gas') ? 'is-invalid' : '' }}" type="text" name="gas" id="gas" value="{{ old('gas', '') }}" required>
                @if($errors->has('gas'))
                    <span class="text-danger">{{ $errors->first('gas') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.gasEmission.fields.gas_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="year">{{ trans('cruds.gasEmission.fields.year') }}</label>
                <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" type="number" name="year" id="year" value="{{ old('year', '') }}" step="1" required>
                @if($errors->has('year'))
                    <span class="text-danger">{{ $errors->first('year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.gasEmission.fields.year_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="value">{{ trans('cruds.gasEmission.fields.value') }}</label>
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="text" name="value" id="value" value="{{ old('value', '') }}" required>
                @if($errors->has('value'))
                    <span class="text-danger">{{ $errors->first('value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.gasEmission.fields.value_helper') }}</span>
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