<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Log in</title>

        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = { darkMode: 'class' };
        </script>

        {{-- Apply saved theme before paint, to avoid a flash of the wrong theme --}}
        <script>
            (function () {
                const stored = localStorage.getItem('appearance');
                const isDark = stored === 'dark' || (stored !== 'light' && window.matchMedia('(prefers-color-scheme: dark)').matches);
                document.documentElement.classList.toggle('dark', isDark);
            })();
        </script>

        <style>
            html { font-size: 13.5px; }
        </style>
    </head>
    <body class="min-h-screen bg-white antialiased dark:bg-zinc-900">

        <!-- Theme toggle -->
        <div class="absolute top-4 right-4 z-10">
            <button
                type="button"
                onclick="const d=document.documentElement.classList.toggle('dark'); localStorage.setItem('appearance', d ? 'dark' : 'light');"
                class="flex h-9 w-9 items-center justify-center rounded-lg text-zinc-500 transition-colors hover:bg-zinc-100 hover:text-zinc-800 dark:text-zinc-400 dark:hover:bg-white/10 dark:hover:text-white"
                aria-label="Toggle theme"
            >
                <!-- Sun icon (shown in dark mode) -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="hidden size-5 dark:block">
                    <circle cx="12" cy="12" r="4" />
                    <path stroke-linecap="round" d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41" />
                </svg>
                <!-- Moon icon (shown in light mode) -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="size-5 dark:hidden">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1 1 11.21 3a7 7 0 0 0 9.79 9.79Z" />
                </svg>
            </button>
        </div>

        <div class="flex min-h-screen flex-col items-center justify-center gap-6 bg-white p-6 dark:bg-zinc-900 md:p-10">
            <div class="flex w-full max-w-sm flex-col gap-6">

                <a href="#" class="flex flex-col items-center gap-2 font-medium">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-600/10 dark:bg-red-500/10">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 text-red-600 dark:text-red-500">
                            <path fill-rule="evenodd" d="M14.615 1.595a.75.75 0 0 1 .359.852L12.982 9.75h7.268a.75.75 0 0 1 .548 1.262l-10.5 11.25a.75.75 0 0 1-1.272-.71l1.992-7.302H3.75a.75.75 0 0 1-.548-1.262l10.5-11.25a.75.75 0 0 1 .913-.143Z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    <span class="sr-only">App name</span>
                </a>

                <div class="flex flex-col items-center gap-1 text-center">
                    <h1 class="text-xl font-semibold text-zinc-800 dark:text-white">Log in to your account</h1>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">Enter your email and password below to log in</p>
                </div>

                <form class="flex flex-col gap-6" onsubmit="return false;">

                    <div class="flex flex-col gap-2">
                        <label for="email" class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Email address</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            required
                            autofocus
                            autocomplete="email"
                            placeholder="email@example.com"
                            class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-800 placeholder-zinc-400 shadow-xs transition-colors focus:border-red-500 focus:ring-2 focus:ring-red-500/30 focus:outline-none dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:placeholder-zinc-500 dark:focus:border-red-500"
                        >
                    </div>

                    <div class="flex flex-col gap-2">
                        <div class="flex items-center justify-between">
                            <label for="password" class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Password</label>
                            <a href="#" class="text-sm font-medium text-red-600 hover:underline dark:text-red-500">Forgot password?</a>
                        </div>

                        <div class="relative">
                            <input
                                id="password"
                                name="password"
                                type="password"
                                required
                                autocomplete="current-password"
                                placeholder="Password"
                                class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 pr-10 text-sm text-zinc-800 placeholder-zinc-400 shadow-xs transition-colors focus:border-red-500 focus:ring-2 focus:ring-red-500/30 focus:outline-none dark:border-zinc-700 dark:bg-zinc-800 dark:text-white dark:placeholder-zinc-500 dark:focus:border-red-500"
                            >
                            <button
                                type="button"
                                onclick="const i=document.getElementById('password'); i.type = i.type === 'password' ? 'text' : 'password';"
                                class="absolute inset-y-0 end-0 flex w-9 items-center justify-center text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-200"
                                aria-label="Toggle password visibility"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <label class="flex items-center gap-2">
                        <input
                            type="checkbox"
                            name="remember"
                            class="size-4 rounded border-zinc-300 text-red-600 focus:ring-red-500/30 dark:border-zinc-600 dark:bg-zinc-800"
                        >
                        <span class="text-sm text-zinc-600 dark:text-zinc-400">Remember me</span>
                    </label>

                    <button
                        type="submit"
                        class="w-full rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-xs transition-colors hover:bg-red-700 focus:ring-2 focus:ring-red-500/40 focus:outline-none dark:bg-red-600 dark:hover:bg-red-500"
                    >
                        Log in
                    </button>
                </form>

                <p class="text-center text-sm text-zinc-500 dark:text-zinc-400">
                    Don't have an account?
                    <a href="#" class="font-medium text-red-600 hover:underline dark:text-red-500">Sign up</a>
                </p>
            </div>
        </div>
    </body>
</html>