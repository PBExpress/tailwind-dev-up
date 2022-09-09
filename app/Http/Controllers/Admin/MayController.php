<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\May;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MayController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = May::class;
    }

    public function index()
    {
        abort_if(Gate::denies('may_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.may.index');
    }

    public function create()
    {
        abort_if(Gate::denies('may_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.may.create');
    }

    public function edit(May $may)
    {
        abort_if(Gate::denies('may_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.may.edit', compact('may'));
    }

    public function show(May $may)
    {
        abort_if(Gate::denies('may_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.may.show', compact('may'));
    }
}
