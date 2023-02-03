<div class="navbar bg-base-100 rounded-box shadow-xl">
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/>
                </svg>
            </label>

            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="{{ route('app.dashboard') }}">Dashboard</a></li>
            </ul>
        </div>

        <a href="{{ route('public.landing') }}" class="btn btn-ghost normal-case text-xl">{{ config('app.name') }}</a>
    </div>

    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a href="{{ route('app.dashboard') }}">Dashboard</a></li>
        </ul>
    </div>

    <div class="navbar-end space-x-2">
        <button class="btn btn-ghost btn-circle">
            <span class="indicator">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                <span class="badge badge-xs badge-primary indicator-item"></span>
            </span>
        </button>

        <div class="dropdown dropdown-end">
            <button class="btn gap-2 btn-ghost">
                <span v-text="auth.user.first_name"/>

                <div class="avatar">
                    <div class="w-8 rounded-full">
                        <x-avatar :user="auth()->user()"/>
                    </div>
                </div>
            </button>

            <ul class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                <li>
                    <a href="{{ route('app.profile') }}" class="justify-between">Profile</a>
                </li>
                <li><a>Settings</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="post" class="hover:bg-accent/10">
                        @csrf
                        <button type="submit" class="text-accent">Sign out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
