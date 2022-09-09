<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMayRequest;
use App\Http\Requests\UpdateMayRequest;
use App\Http\Resources\Admin\MayResource;
use App\Models\May;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MayApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('may_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MayResource(May::all());
    }

    public function store(StoreMayRequest $request)
    {
        $may = May::create($request->validated());

        return (new MayResource($may))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(May $may)
    {
        abort_if(Gate::denies('may_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MayResource($may);
    }

    public function update(UpdateMayRequest $request, May $may)
    {
        $may->update($request->validated());

        return (new MayResource($may))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(May $may)
    {
        abort_if(Gate::denies('may_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $may->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
