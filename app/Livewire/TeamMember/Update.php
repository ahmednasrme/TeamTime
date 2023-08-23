<?php
 
namespace App\Livewire\TeamMember;
 
use App\Models\TeamMember;
use Livewire\Component;
use Livewire\Features\SupportValidation\Rule;
 
class Update extends Component
{
    public TeamMember $teamMember;
 
    #[Rule(['required','min:3', 'string'])]
    public $name;
 
    #[Rule(['required','string'])]
    public $timezone;
 
    public function mount(TeamMember $teamMember)
    {
        $this->teamMember = $teamMember;
        $this->name = $teamMember->name;
        $this->timezone = $teamMember->timezone;
    }
 
    public function saveMember()
    {
        $this->teamMember->name = $this->name;
        $this->teamMember->timezone = $this->timezone;
        $this->teamMember->save();
 
        $this->redirectRoute('Index');
    }
 
    public function render()
    {
        return view('livewire.team-member.update');
    }
}