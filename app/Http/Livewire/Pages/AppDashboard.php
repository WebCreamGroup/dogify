<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;

class AppDashboard extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder|Relation
    {
        return User::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('first_name')->searchable(),
            Tables\Columns\TextColumn::make('last_name')->searchable(),
            Tables\Columns\TextColumn::make('email')->searchable(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\EditAction::make()
                ->action(fn() => dd('a'))
                ->form([
                    TextInput::make('first_name'),
                ]),
        ];
    }

    public function render(): View
    {
        return view('livewire.pages.app-dashboard');
    }
}
