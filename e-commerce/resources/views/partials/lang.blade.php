<div class="flex justify-center pt-1 sm:justify-start sm:pt-0">
    <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('img/en.png') }}" alt="" style="height: 16px;">
           <span>English</span>
        </button>
        <ul class="dropdown-menu">
            @foreach ($available_locales as $locale_name => $available_locale)
                @if ($available_locale === $current_locale)
                    <li>
                        <a class="dropdown-item">
                            <img src="{{ asset('img/en.png') }}" alt="" style="height: 16px;">
                            <span>English</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a class="dropdown-item" href="language/{{ $available_locale }}">
                            <img src="{{ asset('img/mm.png') }}" alt="" style="height: 16px;">
                            <span>မြန်မာ</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
