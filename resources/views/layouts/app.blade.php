<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @fluxAppearance

        @livewireStyles
    </head>

<body class="min-h-screen bg-white dark:bg-zinc-800 antialiased flex flex-col md:flex-row">
    <flux:sidebar sticky collapsible class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.header>
            <flux:sidebar.brand
                href="#"
                logo="https://fluxui.dev/img/demo/logo.png"
                logo:dark="https://fluxui.dev/img/demo/dark-mode-logo.png"
                name="IP Threat Monitoring"
            />

            <flux:sidebar.collapse class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2" />
        </flux:sidebar.header>

        {{-- Sidebar --}}
        <flux:sidebar.nav>
            <flux:sidebar.item icon="home" href="{{ url('/dashboard') }}">Dashboard</flux:sidebar.item>

            {{-- Maps --}}
            <flux:sidebar.group
                expandable
                expanded="false"
                icon="map"
                heading="Maps"
                class="grid"
            >
                <flux:sidebar.item href="#">Informant Map</flux:sidebar.item>
                <flux:sidebar.item href="{{ url('/dashboard/soimap') }}">SOI Map</flux:sidebar.item>
            </flux:sidebar.group>

            {{-- ITA --}}
             <flux:sidebar.group
                expandable
                expanded="false"
                icon="table-cells"
                heading="ITA"
                class="grid"
            >
                <flux:sidebar.item href="#">Cell Mapping</flux:sidebar.item>
                <flux:sidebar.item href="#">Liaising</flux:sidebar.item>
                <flux:sidebar.item href="#">After Operation Report</flux:sidebar.item>
            </flux:sidebar.group>

            {{-- Records --}}
             <flux:sidebar.group
                expandable
                expanded="false"
                icon="list-bullet"
                heading="Records"
                class="grid"
            >
                <flux:sidebar.item href="#">Source of Information</flux:sidebar.item>
                <flux:sidebar.item href="#">Informant</flux:sidebar.item>
                <flux:sidebar.item href="#">Intelligence Specialist</flux:sidebar.item>
                <flux:sidebar.item href="#">COP/OIP</flux:sidebar.item>
            </flux:sidebar.group>

            {{-- Message --}}
            <flux:sidebar.group
                expandable
                expanded="false"
                icon="inbox-arrow-down"
                heading="Message"
                class="grid"
            >
                <flux:sidebar.item href="#">Inbox</flux:sidebar.item>
                <flux:sidebar.item href="#">Sent</flux:sidebar.item>
            </flux:sidebar.group>

            {{-- Encoding --}}
            <flux:sidebar.group
                expandable~
                expanded="false"
                icon="document-text"
                heading="Encoding"
                class="grid"
            >
                <flux:sidebar.item href="#">Informants</flux:sidebar.item>
                <flux:sidebar.item href="#">FFB</flux:sidebar.item>
                <flux:sidebar.item href="#">After Operation Report</flux:sidebar.item>
            </flux:sidebar.group>

            {{-- Periodic Status Report --}}
            <flux:sidebar.group
                expandable
                expanded="false"
                icon="chart-bar-square"
                heading="Periodic Status Report"
                class="grid"
            >
                <flux:sidebar.item href="#">Threat Groups</flux:sidebar.item>
                <flux:sidebar.item href="#">Sub Threat Groups</flux:sidebar.item>
                <flux:sidebar.item href="#">Sub Region</flux:sidebar.item>
                <flux:sidebar.item href="#">Sub Threat Units</flux:sidebar.item>
                <flux:sidebar.item href="#">Sub-Activities</flux:sidebar.item>
                <flux:sidebar.item href="#">Boat</flux:sidebar.item>
            </flux:sidebar.group>

            {{-- Security --}}
            <flux:sidebar.group
                expandable
                expanded="false"
                icon="lock-closed"
                heading="Security"
                class="grid"
            >
                <flux:sidebar.item href="#">Change Password</flux:sidebar.item>
            </flux:sidebar.group>

        </flux:sidebar.nav>

        <flux:sidebar.spacer />

        <flux:sidebar.nav>
            <flux:sidebar.item icon="cog-6-tooth" href="#">Settings</flux:sidebar.item>
            <flux:sidebar.item icon="information-circle" href="#">Help</flux:sidebar.item>
        </flux:sidebar.nav>

        <div class="px-2 py-2 in-data-flux-sidebar-collapsed-desktop:hidden">
            <flux:radio.group x-data variant="segmented" x-model="$flux.appearance" size="sm" class="w-full">
                <flux:radio value="light" icon="sun" class="flex-1" />
                <flux:radio value="dark" icon="moon" class="flex-1" />
                <flux:radio value="system" icon="computer-desktop" class="flex-1" />
            </flux:radio.group>
        </div>

        <flux:dropdown position="top" align="start" class="max-lg:hidden">
            <flux:sidebar.profile avatar="https://fluxui.dev/img/demo/user.png" name="Olivia Martin" />

            <flux:menu>
                <flux:menu.radio.group>
                    <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                    <flux:menu.radio>Truly Delta</flux:menu.radio>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:button x-data x-on:click="$flux.dark = ! $flux.dark" icon="moon" variant="subtle" aria-label="Toggle dark mode" />

        <flux:dropdown position="top" align="start">
            <flux:profile avatar="/img/demo/user.png" />

            <flux:menu>
                <flux:menu.radio.group>
                    <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                    <flux:menu.radio>Truly Delta</flux:menu.radio>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    <flux:main class="flex-1 p-6 lg:p-8">
        {{ $slot }}
    </flux:main>

    @fluxScripts
</body>
</html>