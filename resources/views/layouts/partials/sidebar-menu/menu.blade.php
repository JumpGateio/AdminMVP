@if ($item->isDropDown() && $item->hasLinks())
  <li class="uk-parent {{ $item->active ? 'active uk-open' : '' }}">
    <a>{{ $item->name }}  <span class="arrow"></span></a>
    <ul class="sub-menu {{ $item->active ? 'uk-open' : '' }}" id="{{ $item->slug }}" uk-nav="multiple: true">
      @each('layouts.partials.sidebar-menu.item', $item->links, 'item')
    </ul>
  </li>
@else
  @include('layouts.partials.sidebar-menu.item')
@endif
