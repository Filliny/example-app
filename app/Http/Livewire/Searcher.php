<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class Searcher extends Component
{
    public $search = '';
    public function render()
    {
        $result = [];

        if($this->search == '' || strlen($this->search) <3 ){
            $result = ['articles'=>[]];
        }else{
            $result = [
                'articles'=>Article::where('name','LIKE','%'.$this->search.'%')->get(),
            ];
        }

        return view('livewire.searcher',$result);
    }
}
