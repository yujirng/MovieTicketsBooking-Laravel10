<div class="row">
    <div class="col-11">
        <nav class="navbar navbar-expand-sm navbar-light bg-light mb-4 rounded"
            style="border-bottom: 1px solid rgb(160 163 167);">
            <ul class="navbar-nav w-100 d-flex justify-content-between font-weight-bold text-capitalize">
                @foreach ([
        'user.booking.history' => 'Booking History',
        'user.information' => 'Personal Information',
        'user.notifications' => 'Notifications',
        'user.gifts' => 'Gifts',
    ] as $route => $label)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs($route) ? 'active' : '' }}"
                            @unless (request()->routeIs($route)) href="{{ route($route) }}" @endunless>
                            {{ $label }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</div>
