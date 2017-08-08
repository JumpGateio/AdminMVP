<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

<div class="menu-list">

  <ul id="menu-content" class="menu-content" uk-nav="multiple: true">
    @each('layouts.partials.sidebar-menu.menu', $menu->links, 'item')
  </ul>
</div>
