<ul class="rd-navbar-nav">
    @foreach($menu->get('menu_main') as $item)
        <li>
            <a target="_blank" href="{{ $item->link }}">{{ $item->name }}</a>
            @if (count($item->menuItems))
                <ul class="rd-navbar-dropdown">
                    @foreach ($item->menuItems as $subItem)
                        <li>
                            <a target="_blank" href="{{ $subItem->link }}">{{ $subItem->name }}</a>
                            @if (count($subItem->menuItems))
                                <ul class="rd-navbar-dropdown">
                                    @foreach ($subItem->menuItems as $subSubItem)
                                        <li><a target="_blank"  href="{{ $subSubItem->link }}">{{ $subSubItem->name }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>