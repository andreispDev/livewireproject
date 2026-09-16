<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

new #[Layout('layouts.app')] class extends Component {
    #[Computed]
    public function revenueTrend(): array
    {
        return [
            'labels' => ['Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
            'values' => [7200, 8100, 7800, 9600, 11200, 12450],
        ];
    }

    #[Computed]
    public function stats(): array
    {
        return [    
            [
                'label' => 'Dolphine',
                'value' => '1,234',
                'change' => 12,
                'icon' => 'users',
            ],
            [
                'label' => 'Stingray',
                'value' => '532',
                'change' => 8,
                'icon' => 'shopping-bag',
            ],
            [
                'label' => 'Manta',
                'value' => '$12,450',
                'change' => 15,
                'icon' => 'currency-dollar',
            ],
            [
                'label' => 'Barracuda',
                'value' => '18',
                'change' => -4,
                'icon' => 'arrow-uturn-left',
            ],
            [
                'label' => 'Seahawk',
                'value' => '89',
                'change' => 3,
                'icon' => 'signal',
            ],
            [
                'label' => 'Seasnake',
                'value' => '2.1%',
                'change' => -6,
                'icon' => 'chart-bar',
            ],
            [
                'label' => 'Dolphine',
                'value' => '1,234',
                'change' => 12,
                'icon' => 'users',
            ],
            [
                'label' => 'Stingray',
                'value' => '532',
                'change' => 8,
                'icon' => 'shopping-bag',
            ],
            [
                'label' => 'Manta',
                'value' => '$12,450',
                'change' => 15,
                'icon' => 'currency-dollar',
            ],
            [
                'label' => 'Barracuda',
                'value' => '18',
                'change' => -4,
                'icon' => 'arrow-uturn-left',
            ],
            [
                'label' => 'Seahawk',
                'value' => '89',
                'change' => 3,
                'icon' => 'signal',
            ],
            [
                'label' => 'Seasnake',
                'value' => '2.1%',
                'change' => -6,
                'icon' => 'chart-bar',
            ],
        ];
    }
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

    <div class="grid gap-4 md:grid-cols-3 lg:grid-cols-6">
        @foreach ($this->stats as $stat)
            <flux:card>
                <div class="flex items-center justify-between">
                    <flux:heading size="sm ">
                        {{ $stat['label'] }}
                    </flux:heading>

                    <flux:icon :name="$stat['icon']" class="size-4 text-zinc-400" />
                </div>

                <flux:heading size="xl" class="mt-2">
                    {{ $stat['value'] }}
                </flux:heading>

                <flux:text class="text-xs mt-1 flex items-center gap-1 {{ $stat['change'] >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                    <flux:icon
                        :name="$stat['change'] >= 0 ? 'arrow-trending-up' : 'arrow-trending-down'"
                        class="size-3"
                    />
                    {{ $stat['change'] >= 0 ? '+' : '' }}{{ $stat['change'] }}% from last month
                </flux:text>
            </flux:card>
        @endforeach
    </div>

    <flux:card
        x-data="revenueChart(@js($this->revenueTrend))"
        x-init="init()"
        wire:ignore
    >
        <flux:heading size="sm">
            Revenue Trend
        </flux:heading>

        <flux:text class="mt-1">
            Last 6 months
        </flux:text>

        <div class="mt-4 h-64">
            <canvas x-ref="canvas"></canvas>
        </div>
    </flux:card>

</div>

@once
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4"></script>

        <script>
            function revenueChart({ labels, values }) {
                return {
                    chart: null,
                    init() {
                        this.chart = new Chart(this.$refs.canvas, {
                            type: 'line',
                            data: {
                                labels,
                                datasets: [{
                                    label: 'Revenue',
                                    data: values,
                                    borderColor: '#6366f1',
                                    backgroundColor: 'rgba(99, 102, 241, 0.1)',
                                    borderWidth: 2,
                                    tension: 0.35,
                                    fill: true,
                                    pointRadius: 3,
                                }],
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: { legend: { display: false } },
                                scales: {
                                    y: {
                                        ticks: { callback: (value) => '$' + value.toLocaleString() },
                                    },
                                },
                            },
                        });
                    },
                    destroy() {
                        this.chart?.destroy();
                    },
                };
            }
        </script>
    @endpush
@endonce