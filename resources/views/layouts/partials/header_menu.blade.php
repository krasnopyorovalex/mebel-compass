<ul class="rd-navbar-nav">
    @foreach($menu->get('menu_main') as $item)
        <li>
            @if ($item->image)
                <img src="{{ asset($item->image->path) }}" alt="{{ asset($item->image->alt) }}" title="{{ asset($item->image->title) }}">
            @endif
            <a href="{{ $item->link }}">{{ $item->name }}</a>
            @if (count($item->menuItems))
                <ul class="rd-navbar-dropdown">
                    @foreach ($item->menuItems as $subItem)
                        <li>
                            @if ($subItem->image)
                                <img src="{{ asset($subItem->image->path) }}" alt="{{ asset($subItem->image->alt) }}" title="{{ asset($subItem->image->title) }}">
                            @endif
                            <a href="{{ $subItem->link }}">{{ $subItem->name }}</a>
                            @if (count($subItem->menuItems))
                                <ul class="rd-navbar-dropdown">
                                    @foreach ($subItem->menuItems as $subSubItem)
                                        <li><a href="{{ $subSubItem->link }}">{{ $subSubItem->name }}</a></li>
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