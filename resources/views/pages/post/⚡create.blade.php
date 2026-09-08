<?php

use Livewire\Component;

new class extends Component {
    public string $title = '';

    public string $content = '';

    public function save()
    {
        $this->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        dd($this->title, $this->content);
    }
};
?>

<div class="max-w-2xl mx-auto p-6">
    <flux:card class="space-y-6">
        <div>
            <flux:heading size="lg">Create Post</flux:heading>
            <flux:subheading>Fill in the details below to publish a new post.</flux:subheading>
        </div>

        <flux:separator />

        <form wire:submit="save" class="space-y-6">
            <flux:input
                wire:model="title"
                label="Title"
                placeholder="Enter post title"
                :invalid="$errors->has('title')"
            />
            @error('title')
                <flux:error>{{ $message }}</flux:error>
            @enderror

            <flux:textarea
                wire:model="content"
                label="Content"
                placeholder="Write your post content..."
                rows="6"
                :invalid="$errors->has('content')"
            />
            @error('content')
                <flux:error>{{ $message }}</flux:error>
            @enderror

            <div class="flex justify-end gap-3 pt-2">
                <flux:button variant="ghost" type="button">
                    Cancel
                </flux:button>
                <flux:button variant="primary" type="submit">
                    Save Post
                </flux:button>
            </div>

        </form>
    </flux:card>
</div>

@layout('layouts.app')