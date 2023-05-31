@include('flash-message')

<x-guest-layout>
    <!-- Session Status -->

    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" enctype="multipart/form-data" action="{{ route('datosFront') }}">
        @csrf
        <!-- Fecha -->
        <span class="justify-content-center">
            {{ __('Horario de Almuerzo de 14:00 a 16:59 y Cena de 20:00 a 23:59 horas. ') }}
        </span>

        <div class="mt-4">
            <x-input-label for="fecha" :value="__('Fecha de la pedido')" />
            <input type="datetime-local" id="res_date" name="fecha_pedido" required autofocus
                min="{{ $min_date->format('Y-m-d\TH:i:s') }}" max="{{ $max_date->format('Y-m-d\TH:i:s') }}"
                class="block mt-1 w-full rounded-md" />

        </div>

        <!-- Comensales -->
        <div class="mt-4">
            <x-input-label for="comensales" :value="__('Comensales')" />
            <x-text-input id="comensales" class="block mt-1 w-full" type="number" name="comensales" required min=1
                max=10 />
            <x-input-error :messages="$errors->get('comensales')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-5">
            <x-primary-button class="justify-content-center">
                {{ __('Continuar con la pedido') }}
            </x-primary-button>
        </div>
              
        <div class="flex items-center justify-end mt-5">
            <span class="justify-content-center">
                {{ __('Para pedidos de más de 10 comensales o con fecha superior a dos semanas contactar con el restaurante.') }}
            </span>
        </div>
    </form>
</x-guest-layout>
