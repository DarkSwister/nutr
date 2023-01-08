<?php

namespace App\Http\Livewire\Tag;

use App\Models\Tag;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Tags extends ModalComponent
{
    use LivewireAlert;

    public $tags;
    public $viewingModal = false;

    public $name;

    public function viewModal(): void
    {
        $this->viewingModal = true;
    }

    public function create()
    {
        $this->validate([
            'name' => 'required|string|unique:tags,name,NULL,id,group_id,' . session('group_id')
        ]);
        \App\Models\Tag::create(['name' => $this->name]);
        $this->loadTags();
        $this->alert('success', __('Saved'), [
            'toast' => false
        ]);
        $this->viewingModal = false;
        $this->reset('name', 'viewingModal');

    }

    public function loadTags()
    {
        $this->tags = Tag::all()->filter(function ($item) {
            return $item->group_id == session('group_id');
        })->groupBy(function ($item, $key) {
            return $item->name[0];     //treats the name string as an array
        })->sortBy(function ($item, $key) {      //sorts A-Z at the top level
            return $key;
        })->toArray();
    }

    public function mount()
    {
        $this->loadTags();
    }

    public function render()
    {
        return view('livewire.tag.tags')->extends('layouts.contentLayoutMaster');
    }
}
