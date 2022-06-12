<div class="flex items-center space-x-3 py-3">
    <div class="w-8 h-8 bg-slate-400 rounded-full bg-[url('https://i.pravatar.cc/32')]"></div>
    <div>
        <div class="text-md font-semibold text-slate-700">{{ $question->user->name }}</div>
        <div class="text-xs text-neutral-500">asked {{ $question->created_at->diffForHumans() }}</div>
    </div>
</div>