<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar consulta') }}
        </h2>
    </x-slot>

    <div class="flex flex-col sm:justify-center items-center pt-12 sm:pt-0 bg-gray-100" style="margin-top: 60px">
        <form action="{{ route('consults.store') }}" method="POST">
            @csrf

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
                            <option value={{ $animal->id }}>
                                {{$animal->name}}
                            </option>
                          @endforeach
                      </select>
                    </div>
                </div>
            </div>

            <!-- Symptoms -->
            <div class="mt-4">
                <x-label for="symptoms" :value="__('Sintomas')" />

                <x-textarea id="symptoms" class="block mt-1 w-full" type="textarea" name="symptoms" :value="old('symptoms')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Cadastrar') }}
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>
