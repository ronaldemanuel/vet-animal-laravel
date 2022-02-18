<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar animal') }}
        </h2>
    </x-slot>

    <div class="flex flex-col sm:justify-center items-center pt-12 sm:pt-0 bg-gray-100" style="margin-top: 60px">
        <form action="/consults/{{ $consult->id }}" method="POST">
            @csrf
            @method('PUT')
             <!-- Animal -->
             <div>
                <x-label for="animal" :value="__('Animal')" />

                <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">
                      <select  class="form-select appearance-none
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding bg-no-repeat
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="animal"
                        name="animal">
                            @foreach ($animals as $animal)
                                @if ($animal->id == $consult->animal->id)
                                    <option selected value={{ $animal->id }}>
                                        {{$animal->name}}
                                    </option>
                                @else
                                    <option value={{ $animal->id }}>
                                        {{$animal->name}}
                                    </option>

                                @endif
                            @endforeach
                      </select>
                    </div>
                </div>
            </div>

            <!-- Symptoms -->
            <div class="mt-4">
                <x-label for="symptoms" :value="__('Sintomas')" />

                <x-textarea id="symptoms" class="block mt-1 w-full" type="textarea" name="symptoms" value="{{ $consult->symptoms }}" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4" type="submit">
                    {{ __('Editar') }}
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>
