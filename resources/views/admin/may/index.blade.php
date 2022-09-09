@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.may.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('may_create')
                    <a class="btn btn-indigo" href="{{ route('admin.mays.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.may.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('may.index')

    </div>
</div>
@endsection