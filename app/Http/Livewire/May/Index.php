<?php

namespace App\Http\Livewire\May;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\May;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new May())->orderable;
    }

    public function render()
    {
        $query = May::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $mays = $query->paginate($this->perPage);

        return view('livewire.may.index', compact('mays', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('may_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        May::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(May $may)
    {
        abort_if(Gate::denies('may_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $may->delete();
    }
}
