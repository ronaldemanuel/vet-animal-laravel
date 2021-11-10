<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar animal') }}
        </h2>
    </x-slot>

    <div class="flex flex-col sm:justify-center items-center pt-12 sm:pt-0 bg-gray-100" style="margin-top: 60px">
        <form action="{{ route('animals.store') }}" method="POST">
            @csrf

             <!-- Name -->
             <div>
                <x-label for="name" :value="__('Nome')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Race -->
            <div class="mt-4">
                <x-label for="race" :value="__('Raça')" />

                <x-input id="race" class="block mt-1 w-full" type="text" name="race" :value="old('race')" required autofocus />
            </div>

            <!-- Age -->
            <div class="mt-4">
                <x-label for="age" :value="__('Idade')" />

                <x-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Cadastrar') }}
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>
