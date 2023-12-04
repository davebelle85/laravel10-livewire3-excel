<?php

namespace Tests\Feature;

use App\Livewire\HistoryTable;
use App\Livewire\TodoTable;
use App\Models\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DownloadTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_we_can_export_todos(): void
    {
        Todo::factory()->count(10)->create();

        $component = Livewire::test(TodoTable::class)
            ->set('selectAll', true)
            ->call('export');
        $component->assertOk();
        $component->assertFileDownloaded('todos.xlsx');
    }
}
