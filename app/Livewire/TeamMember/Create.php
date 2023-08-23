<?php
 
namespace App\Livewire\TeamMember;
 
use App\Models\TeamMember;
use Livewire\Attributes\Rule;
use Livewire\Component;
 
class Create extends Component
{
    #[Rule(['required', 'string', 'min:3'])]
    public string $name;
 
    #[Rule(['required', 'string', 'min:3'])]
    public string $timezone;
 
    public function createMember()
    {
        $this->validate();
        $newMember = new TeamMember;
        $newMember->name = $this->name;
        $newMember->timezone = $this->timezone;
        $newMember->save();
        $this->redirectRoute('Index');
    }
 
    public function render()
    {
        return view('livewire.team-member.create');
    }
}