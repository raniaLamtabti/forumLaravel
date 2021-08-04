<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Input;
use App\Models\Question;
use App\Models\Reponse;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class QuestionDisplay extends Component
{
    public $question;
    public $reponse;
    public $content;
    public $question_id;

    /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {

        Reponse::create($this->formData());

        $this->reset();

        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'New Reponse',
            'eventMessage' => 'Another Reponse has been created!',
        ]);
    }

    /**
     * The data for the model mapped
     * in this component.
     *
     * @return void
     */
    public function formData()
    {
        return [
            'content' => $this->content,
            'user_id' => Auth::user()->id,
            'question_id' => $this->question_id,
        ];
    }
    /**
     * The read function.
     *
     * @return void
    **/
    public function mount($id_question)
    {
        $id_question = (int)$id_question;
        $this->question = Question::where('id' , $id_question)->with("user")->get();
        $this->reponse = Reponse::where('question_id' , $id_question)->with("user")->get();
    }


    /**
     * Shows the form modal
     * of the create function.
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }


    public function render()
    {
        return view('livewire.question-display');
    }
}
