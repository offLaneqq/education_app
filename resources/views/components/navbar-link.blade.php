@props(['active' => false])

<li>
    <a {{ $attributes }} @class([
    'block py-2 px-3 rounded  md:p-0 ',
    'text-white bg-blue-700 md:bg-transparent md:text-blue-700 dark:text-white md:dark:text-blue-500' => $active,
    'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' => !$active,
]) class="" aria-current="page">{{ $slot }}</a>
</li>