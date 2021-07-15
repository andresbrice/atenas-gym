@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
'class' => 'rounded-md md:w-1/2 lg:w-1/3 h-7 text-center shadow-sm sm:text-sm border border-gray-300 focus:outline-none focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50',
'type' => 'text',
'maxlength' => '2',
'ondrop' => 'return false;',
'onpaste' => 'return false;',
'onkeypress' => 'return event.charCode >= 48 && event.charCode <= 57;'
]) !!}>