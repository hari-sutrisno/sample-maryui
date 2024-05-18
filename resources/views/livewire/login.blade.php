<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Layout('components.layouts.empty')]
#[Title('Login')]

class extends Component {
    public LoginForm $form;

    public function mount()
    {
        if (auth()->user()) {
            return redirect('/');
        }
    }

    public function submit()
    {
        $this->validate();
        $this->form->authenticate();
        Session::regenerate();
        return redirect('/');
    }
}; ?>


<div class="md:w-96 mx-auto mt-20">
    <div class="mb-10">Cool image here</div>

    <x-form wire:submit="submit">
        <x-input label="E-mail" wire:model="form.email" icon="o-envelope" inline />
        <x-input label="Password" wire:model="form.password" type="password" icon="o-key" inline />
        <div class="flex justify-end gap-3">
            <x-checkbox label="Remember Me" wire:model="form.remember" inline />
        </div>

        <x-slot:actions>
            <x-button label="Create an account" link="/register" />
            <x-button label="Login" type="submit" icon="o-paper-airplane" class="btn-primary" spinner="login" />
        </x-slot:actions>
    </x-form>
</div>
