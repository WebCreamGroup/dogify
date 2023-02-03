@props(['user' => null])

@php
$src = static function () use ($user) {
    $fallback = 'https://eu.ui-avatars.com/api/?name=' . Str::of($user->first_name)->substr(0, 1) . '&color=7DC88E&background=EBF4FF';

    return "https://unavatar.io/$user->email?fallback=" . urlencode($fallback);
};
@endphp

@if($user)
    <img src="{{ $src() }}" alt="{{ $user->first_name }}"/>
@endif
