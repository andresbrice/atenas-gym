<div class="flex md:hidden w-full items-center justify-between">
    <div class="block w-44 border-b-2 py-2 border-gray-700 ">
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 text-base font-medium" aria-current="page">Perfil</a>
    </div>

    <label class="inline-flex items-center px-3 text-md font-bold text-red-900">
        {{ Auth::user()->userName }}
    </label>
</div>