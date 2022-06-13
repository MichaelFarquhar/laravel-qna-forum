<div class="flex flex-col w-fit space-y-2 sticky">
    <div class="text-gray-500 text-sm font-bold mb-3">{{__('Admin Menu')}}</div>
    <a href={{route('dashboard')}} class="flex items-center space-x-5 py-2.5 px-6 rounded-3xl transition-all cursor-pointer {{request()->route()->uri == 'dashboard' ? 'text-white bg-red-400 py-2.5' : 'text-slate-500 hover:bg-neutral-100'}}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <div>{{__('Dashboard')}}</div>
    </a>
    <a href={{route('bookmarks.index')}} class="flex items-center space-x-5 py-2.5 px-6 rounded-3xl transition-all cursor-pointer {{request()->route()->uri == 'bookmarks' ? 'text-white bg-red-400 py-2.5' : 'text-slate-500 hover:bg-neutral-100'}}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
        </svg>
        <div>{{__('Bookmarks')}}</div>
    </a>
    <a href={{route('profile.edit')}} class="flex items-center space-x-5 py-2.5 px-6 rounded-3xl transition-all cursor-pointer {{request()->route()->uri == 'profile/edit' ? 'text-white bg-red-400 py-2.5' : 'text-slate-500 hover:bg-neutral-100'}}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div>{{__('Profile')}}</div>
    </a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <div class="flex items-center space-x-5 py-3 px-6 rounded-3xl transition-all cursor-pointer text-slate-500 hover:bg-neutral-100"
            onclick="event.preventDefault();
            this.closest('form').submit();"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <div>{{__('Logout')}}</div>
        </div>
    </form>
</div>
  