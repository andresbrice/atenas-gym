<div class=" absolute bg-black bg-opacity-50 top-0 left-0 flex items-center justify-center w-screen h-screen z-0"
  style="display:none" x-show="open">

  <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0"
    @click.away="open = false">
    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
      <h3 class="text-lg font-medium leading-6 text-gray-900">
        {{ $title }}
      </h3>

      <div class="mt-2">
        <p class="text-sm leading-5 text-gray-500">
          {{ $body }}
        </p>
      </div>
    </div>

    <div class="mt-5 sm:mt-6">
      <span class="flex w-full rounded-md shadow-sm">
        {{ $footer }}
      </span>
    </div>

  </div>
</div>

{{-- 
  BOTON FOOTER MODAL

  <button @click="open = false"
    class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
    Close this modal!
  </button> 
--}}