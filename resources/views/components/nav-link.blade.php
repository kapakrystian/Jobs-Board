@props(['active' => false, 'type'])

@if ($type === 'a')
    <a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}}
    rounded-md px-3 py-2 text-sm font-medium text-white"
    aria-current="{{ $active ? 'page' : 'false'}}"
    {{$attributes}}
    >{{$slot}}
    </a>
@else
    <button class="btn {{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}}
    px-3 py-2 text-sm font-medium text-white" type="submit"
    aria-current="{{ $active ? 'page' : 'false'}}"
    {{$attributes}}
    >{{$slot}}
    </button>
@endif
