<a href="{{ route('wishlists.index') }}" class="d-flex align-items-center text-reset">
    <i class="las la-heart heart mt-1 la-2x ml-4"></i>
    <span class="flex-grow-1 ml-1">
        @if(Auth::check())
            <span class=" d-flex left-badge badge badge-primary badge-inline badge-pill">{{ count(Auth::user()->wishlists)}}</span>
        @else
        <span class="d-flex left-badge badge badge-primary badge-inline badge-pill"  >0</span>
        @endif
        <span class="nav-box-text d-none d-xl-block opacity-70"></span>
    </span>
</a>
