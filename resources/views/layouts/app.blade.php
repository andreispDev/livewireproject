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
    <body class="min-h-screen bg-zinc-50 dark:bg-zinc-900 flex">

        <flux:sidebar sticky stashable class="border-r border-zinc-200 bg-white dark:bg-zinc-900 dark:border-zinc-700">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <flux:brand href="/" logo="/img/logo.png" name="Acme Inc." class="px-2" />

            <flux:navlist variant="outline">
                <flux:navlist.group heading="Content" class="grid">
                    <flux:navlist.item icon="document-text" href="#">Posts</flux:navlist.item>
                    <flux:navlist.item icon="folder" href="#">Categories</flux:navlist.item>
                    <flux:navlist.item icon="tag" href="#">Tags</flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group heading="Manage" class="grid">
                    <flux:navlist.item icon="users" href="#">Users</flux:navlist.item>
                    <flux:navlist.item icon="cog-6-tooth" href="#">Settings</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <flux:dropdown position="top" align="start" class="max-lg:hidden">
                <flux:profile
                    name="Jane Doe"
                    avatar="https://i.pravatar.cc/150?img=5"
                    :chevron="true"
                />
                <flux:menu>
                    <flux:menu.item icon="user">Profile</flux:menu.item>
                    <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <flux:header sticky class="lg:hidden bg-white border-b border-zinc-200 dark:bg-zinc-900 dark:border-zinc-700">
            <flux:sidebar.toggle icon="bars-2" inset="left" />
            <flux:spacer />
            <flux:profile avatar="https://i.pravatar.cc/150?img=5" />
        </flux:header>

        <flux:main container>
            {{ $slot }}
        </flux:main>

        @livewireScripts

        @fluxScripts
    </body>
</html>