<nav>
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="">Home</a>
        </li>

        @foreach ($segments = request()->segments() as $index => $segment )
        <li class="breadcrumb-item">
            {{$segment}}
        {{-- <a href="">{{ title_case($segment)}}</a> --}}
        </li>
        @endforeach
    </ul>
</nav>
