@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.may.title_singular') }}:
                    {{ trans('cruds.may.fields.id') }}
                    {{ $may->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('may.edit', [$may])
        </div>
    </div>
</div>
@endsection