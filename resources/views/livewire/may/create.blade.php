<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('may.month') ? 'invalid' : '' }}">
        <label class="form-label" for="month">{{ trans('cruds.may.fields.month') }}</label>
        <input class="form-control" type="text" name="month" id="month" wire:model.defer="may.month">
        <div class="validation-message">
            {{ $errors->first('may.month') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.may.fields.month_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('may.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.may.fields.description') }}</label>
        <input class="form-control" type="text" name="description" id="description" wire:model.defer="may.description">
        <div class="validation-message">
            {{ $errors->first('may.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.may.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('may.amount') ? 'invalid' : '' }}">
        <label class="form-label" for="amount">{{ trans('cruds.may.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" wire:model.defer="may.amount" step="1">
        <div class="validation-message">
            {{ $errors->first('may.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.may.fields.amount_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.mays.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>