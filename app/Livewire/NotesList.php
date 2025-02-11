<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Component;

class NotesList extends Component
{
    public bool $isListMode = true;

    public String $title;

    public String $content;

    public function render()
    {
        $notes = [];
        return view('livewire.notes-list', compact('notes'));
    }

    public function addMode(){
        $this->isListMode = false;  
    }
    public function listMode(){
        $this->isListMode = true;
    }

    public function save()
    {
    $this->validate([
        'title'=>'required',
        'content'=>'required'
    ]);
    $note = new Note();
    $note->user_id = auth()->user()->id;
    $note->title = $this->title;
    $note->content = $this->content;
    $note->save();
    $this->isListMode = true;
    return session()->flash('message', 'Note berhasil disimpan');
    }  
}
