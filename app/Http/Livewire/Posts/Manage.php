<?php

namespace App\Http\Livewire\Posts;

use App\Http\Livewire\ModelManager;
use App\Models\Post;
use Livewire\Component;

class Manage extends Component
{
    use ModelManager;

    public static $modelName = Post::class;

    public function mount(Post $model = null)
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
        return view('livewire.posts.manage');
    }

    protected function store()
    {
        $this->validate();
        $this->model->save();

        $this->saved();

        return redirect()->route('posts.index');
    }

    protected function update()
    {
        $this->validate();

        $this->model->save();

        $this->saved();

        return redirect($this->previousUrl);
    }
}
