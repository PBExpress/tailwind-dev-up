<?php

namespace App\Http\Livewire\May;

use App\Models\May;
use Livewire\Component;

class Edit extends Component
{
    public May $may;

    public function mount(May $may)
    {
        $this->may = $may;
    }

    public function render()
    {
        return view('livewire.may.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->may->save();

        return redirect()->route('admin.mays.index');
    }

    protected function rules(): array
    {
        return [
            'may.month' => [
                'string',
                'min:1',
                'max:8',
                'nullable',
            ],
            'may.description' => [
                'string',
                'min:1',
                'max:80',
                'nullable',
            ],
            'may.amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
