<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
      <a href="/">
        <x-application-logo class="w-65 h-40 fill-current text-gray-500" />
      </a>
    </x-slot>

    <div class="mb-4 text-sm text-gray-600">
      {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <!-- Validation Errors -->
    <x-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('password.confirm') }}">
      @csrf

      <!-- Password -->
      <div>
        <x-label for="password" :value="__('Password')" />

        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
          autocomplete="current-password" />
      </div>

      <div class="flex justify-end mt-4">
        <x-button class="bg-red-800 hover:bg-red-700">
          {{ __('Confirm') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout>