@if ($type == 'error')
    <div class="bg-red-200 text-rose-700 w-full py-3 px-6 rounded-lg font-semibold">{{ $text }}</div>
@elseif($type == 'success')
    <div class="bg-green-200 text-green-600 w-full py-3 px-6 rounded-lg font-semibold">{{ $text }}</div>
@endif