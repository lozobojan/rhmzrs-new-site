<li @class(['nav-item', 'dropdown' => count($link->children) > 0, 'dropdown-submenu' => !$isRoot, 'dropend' => !$isRoot]) >
    <a
        @class(['nav-link' => $isRoot, 'dropdown-toggle' => count($link->children) > 0, 'dropdown-item' => !$isRoot])
        href="#"
        @if(count($link->children) > 0) data-bs-toggle="dropdown" @endif
    >
        {{ $link->title }}
    </a>

    @if(count($link->children) > 0)
        <ul class="dropdown-menu">
            @foreach($link->children as $childLink)
                <x-navbar.link is-root="0" :link="$childLink"></x-navbar.link>
            @endforeach
        </ul>
    @endif
</li>
