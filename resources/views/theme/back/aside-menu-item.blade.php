@if ($item["submenu"] == [])
    <li class="sidebar-item">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route($item["url"])}}" aria-expanded="false">
            <i class="{{$item["icono"]}}"></i><span class="hide-menu">{{$item["name"]}}</span>
        </a>
    </li>
@else
<li class="sidebar-item">
    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
        <i class="{{$item["icono"]}}"></i><span class="hide-menu">{{$item["name"]}}</span>
    </a>
    <ul aria-expanded="false" class="collapse first-level">
        @include('theme.back.aside-menu-item-sub', ["item" => $item])
    </ul>
</li>
@endif
