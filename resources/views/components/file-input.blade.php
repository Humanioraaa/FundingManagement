@props(['disabled' => false])
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!} aria-describedby="file_input" type="file">
