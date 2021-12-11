<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Editor extends Component
{

    use WithFileUploads;
    public $content;

    public function render()
    {
        return view('livewire.editor');
    }

    public function store()
    {
        Article::create([
            // 'user_id' => Auth::user()->id,
            'user_id' => 1,
            'title' => '',
            'article' => $this->content,
        ]);

        return 'ok';
    }
}
