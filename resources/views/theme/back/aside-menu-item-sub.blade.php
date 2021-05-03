@foreach ($item["submenu"] as $submenu)
    @if ($submenu["submenu"] == [])
        <li class="sidebar-item">
            <a href="{{route($submenu["url"])}}" class="sidebar-link">
                <i class="{{$submenu["icono"]}}"></i><span class="hide-menu">{{$submenu["name"]}}</span>
            </a>
        </li>
    @else
    <li class="sidebar-item">
        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
            <i class="{{$submenu["icono"]}}"></i><span class="hide-menu">{{$submenu["name"]}}</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
            @include('theme.back.aside-menu-item-sub', ["item" => $submenu])
        </ul>
    </li>
    @endif
@endforeach
