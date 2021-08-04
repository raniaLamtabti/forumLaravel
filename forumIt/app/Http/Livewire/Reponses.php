<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reponse;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Reponses extends Component
{

    public $modalConfirmDeleteVisible = false;
    public $modelId;
    /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {
        return Reponse::where('user_id' , Auth::user()->id)->paginate(5);
    }
/**
     * Shows the delete confirmation modal.
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }
     /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        Reponse::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;

        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'Deleted Reponse',
            'eventMessage' => 'The Reponse (' . $this->modelId . ') has been deleted!',
        ]);
    }

    public function render()
    {
        return view('livewire.reponses', [
            'data' => $this->read(),
        ]);
    }
}
