<?php

namespace App\Http\Livewire\Flights;

use App\Http\Livewire\ModelManager;
use App\Models\Flight;
use Livewire\Component;

class Manage extends Component
{
    use ModelManager;

     public static $modelName = Flight::class;

    public function mount(Flight $model = null)
    {
        $this->model = $model;
        $this->previousUrl = url()->previous();
    }

    protected $rules = [
        'model.title' => ['required', 'string', 'max:255'],
    ];

    protected $validationAttributes = [
        'model.title' => 'title',
    ];

    public function render()
    {
        return view('livewire.flights.manage');
    }

    protected function store()
    {
        $this->validate();
        $this->model->save();

        $this->saved();

        return redirect()->route('flights.index');
    }

    protected function update()
    {
        $this->validate();

        $this->model->save();

        $this->saved();

        return redirect($this->previousUrl);
    }
}
