<?php

namespace Tests\Feature;

use App\Livewire\UsersTable;
use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;

class DownloadTest extends TestCase
{
    public function test_we_can_export_todos(): void
    {
        User::factory()->count(10)->create();

        $component = Livewire::test(UsersTable::class)
            ->set('selectAll', true)
            ->call('export');
        $component->assertOk();
        $component->assertFileDownloaded('users.xlsx');
    }
}
