@php
    $children = $menu->getRelation('sidebarChildren');
    $hasChildren = $children->isNotEmpty();
    $active = $hasChildren
        ? $children->contains(function ($child) use ($isActive) {
            return $isActive($child->url);
        })
        : $isActive($menu->url);
@endphp

@if(!$hasChildren)
    <li class="{{ $active ? 'mm-active' : '' }}">
        <a href="{{ url('webpanel/' . $menu->url) }}" class="waves-effect {{ $active ? 'active' : '' }}" title="{{ $menu->name }}">
            <i class="{{ $menu->icon }} fs-5"></i>
            <span>{{ $menu->name }}</span>
        </a>
    </li>
@else
    <li id="main_menu_{{ $menu->id }}" class="{{ $active ? 'mm-active' : '' }}">
        <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="{{ $active ? 'true' : 'false' }}" title="{{ $menu->name }}">
            <i class="{{ $menu->icon }} fs-5"></i>
            <span>{{ $menu->name }}</span>
        </a>

        <ul class="sub-menu mm-collapse {{ $active ? 'mm-show' : '' }}">
            @foreach($children as $child)
                @php
                    $childIsActive = $isActive($child->url);
                @endphp

                <li class="{{ $childIsActive ? 'mm-active' : '' }}">
                    <a href="{{ url('webpanel/' . $child->url) }}" class="{{ $childIsActive ? 'active' : '' }}">
                        <i class="bx bx-list-ol"></i>
                        {!! $child->name !!}
                    </a>
                </li>
            @endforeach
        </ul>
    </li>
@endif
