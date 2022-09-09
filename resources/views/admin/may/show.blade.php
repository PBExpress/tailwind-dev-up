@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.may.title_singular') }}:
                    {{ trans('cruds.may.fields.id') }}
                    {{ $may->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.may.fields.id') }}
                            </th>
                            <td>
                                {{ $may->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.may.fields.month') }}
                            </th>
                            <td>
                                {{ $may->month }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.may.fields.description') }}
                            </th>
                            <td>
                                {{ $may->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.may.fields.amount') }}
                            </th>
                            <td>
                                {{ $may->amount }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('may_edit')
                    <a href="{{ route('admin.mays.edit', $may) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.mays.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection