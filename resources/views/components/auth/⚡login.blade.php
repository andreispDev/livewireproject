<?php

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

new class extends Component {
    public string $email = '';

    public string $password = '';

    public bool $remember = false;

    public function login()
    {
        $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ], $this->remember)) {
            $this->addError('email', 'These credentials do not match our records.');

            return;
        }

        session()->regenerate();

        $this->redirectIntended(
            default: route('dashboard')
        );
    }
};
?>

<div class="flex min-h-screen items-center justify-center px-6">

    <flux:card class="w-full max-w-md space-y-6">

        <div>
            <flux:heading size="lg">
                Welcome back
            </flux:heading>

            <flux:subheading>
                Sign in to your account to continue.
            </flux:subheading>
        </div>

        <flux:separator />

        <form wire:submit="login" class="space-y-6">

            <flux:input
                wire:model="email"
                label="Email"
                type="email"
                placeholder="you@example.com"
                autocomplete="email"
                :invalid="$errors->has('email')"
            />

            @error('email')
                <flux:error>{{ $message }}</flux:error>
            @enderror

            <flux:input
                wire:model="password"
                label="Password"
                type="password"
                placeholder="Enter your password"
                autocomplete="current-password"
                :invalid="$errors->has('password')"
            />

            @error('password')
                <flux:error>{{ $message }}</flux:error>
            @enderror

            <flux:checkbox
                wire:model="remember"
                label="Remember me"
            />

            <flux:button
                type="submit"
                variant="primary"
                class="w-full"
            >
                Sign in
            </flux:button>

        </form>

    </flux:card>

</div>

@layout('layouts.auth')
