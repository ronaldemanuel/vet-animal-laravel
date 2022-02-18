<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Consultas') }}
            </h2>
            <x-link-button style="background-color: #17ad44" :href="route('consults.create')">
                {{__('Realizar consulta')}}
            </x-link-button>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($consults as $consult)
                <div class="p-6 bg-white border-b border-gray-200 w-full">
                    <div class="flex justify-between">
                        <h3>
                            {{ $consult->animal->name }}
                        </h3>

                        @switch($consult->status)
                            @case('PENDING')
                                <h3 style="color: #b4c00e">
                                    PENDENTE
                                </h3>
                                @break
                            @case('CANCELED')
                                <h3 style="color: #c91616">
                                    CANCELADA
                                </h3>
                                @break
                            @case('REFUSED')
                                <h3 style="color: #c91616">
                                    RECUSADA
                                </h3>
                                @break
                            @case('PERFORMED')
                                <h3 style="color: #21b10e">
                                    REALIZADA
                                </h3>
                                @break
                            @default

                        @endswitch
                        <div class="flex">
                            <x-link-button :href="route('consults.edit', ['consult'=>$consult->id])">
                                {{__('Editar')}}
                            </x-link-button>
                            @if ($consult->status == 'CANCELED')
                                <form action="{{ url("consults/$consult->id") }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-button class="ml-3 bg-red-700" type="submit">
                                        {{ __('Excluir') }}
                                    </x-button>
                                </form>
                            @else
                                <form action="{{ url("consults/$consult->id/cancel") }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <x-button class="ml-3 bg-red-700" type="submit">
                                        {{ __('Cancelar') }}
                                    </x-button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
