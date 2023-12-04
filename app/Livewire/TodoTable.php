<?php

namespace App\Livewire;

use App\Exports\TodosExport;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Todo;

class TodoTable extends DataTableComponent
{
    protected $model = Todo::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Title", "title")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function bulkActions(): array
    {
        return [
            'export' => 'Export as Excel',
        ];
    }

    public function export()
    {
        $todos = $this->getSelected();

        $this->clearSelected();

        return Excel::download(new TodosExport($todos), 'todos.xlsx');
    }
}
