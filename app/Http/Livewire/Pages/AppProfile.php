<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Filament\Forms;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class AppProfile extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public User $user;

    public $data;

    public function mount(): void
    {
        $this->user = auth()->user();

        /** @noinspection PhpUndefinedFieldInspection */
        $this->form->fill([
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,
            'email' => $this->user->email,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('first_name')
                ->required(),

            Forms\Components\TextInput::make('last_name')
                ->required(),

            Forms\Components\TextInput::make('email')
                ->email()
                ->disabled(),
        ];
    }

    protected function getFormModel(): Model|string|null
    {
        return $this->user;
    }

    protected function getFormStatePath(): ?string
    {
        return 'data';
    }

    /** @noinspection PhpUndefinedFieldInspection */
    public function submit(): void
    {
        $this->user->update($this->form->getState());

        Notification::make()
            ->title('saved')
            ->success()
            ->send();

        session()->flash('success');
    }

    public function render(): View
    {
        return view('livewire.pages.app-profile');
    }
}
