<div class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
        Convidado
    @endif
</div>
