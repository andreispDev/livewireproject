<?php

use Livewire\Component;

new class extends Component {
};
?>

<div class="space-y-6">

    <div>
        <flux:heading size="xl">
            Dashboard
        </flux:heading>

        <flux:subheading>
            Welcome back,
             {{-- {{ auth()->user()->name }}. --}}
        </flux:subheading>
    </div>

    <flux:separator />

    <div class="grid gap-4 md:grid-cols-3">

        <flux:card>
            <flux:heading size="sm">
                Total Users
            </flux:heading>

            <flux:heading size="xl" class="mt-2">
                1,234
            </flux:heading>

            <flux:text class="mt-1">
                +12% from last month
            </flux:text>
        </flux:card>

        <flux:card>
            <flux:heading size="sm">
                Orders
            </flux:heading>

            <flux:heading size="xl" class="mt-2">
                532
            </flux:heading>

            <flux:text class="mt-1">
                +8% from last month
            </flux:text>
        </flux:card>

        <flux:card>
            <flux:heading size="sm">
                Revenue
            </flux:heading>

            <flux:heading size="xl" class="mt-2">
                $12,450
            </flux:heading>

            <flux:text class="mt-1">
                +15% from last month
            </flux:text>
        </flux:card>

    </div>

</div>

@layout('layouts.app')
