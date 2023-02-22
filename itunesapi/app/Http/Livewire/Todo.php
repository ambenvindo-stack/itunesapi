<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TodoModel;

class Todo extends Component
{
    public $title = '';

    public function addTodo()
    {
        $this->validate([
            'title' => 'required',
        ]);

        TodoModel::create([
            'user_id' => auth()->id(),
             'title' => $this->title,
             'completed' => false,        
        ]);

        $this->title = '';
    }

    public function deleteTodo($id)
    {
        TodoModel::find($id)->delete();
    }

    public function toggleTodo($id)
    {
        $todo = TodoModel::find($id);

        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function updateTodo($id, $title)
    {
        $todo = TodoModel::find($id);

        $todo->title = $title;
        $todo->save();
    }

    public function render()
    {
        return view('livewire.todo', [
                        'todos' => auth()->user()->todos()->paginate(5),
                    ]);
    }
}
