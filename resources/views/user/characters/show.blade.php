@foreach ($details->equipment as $equip)
  <div data-armory-embed="items" data-armory-ids="{{ $equip->id }}"></div>
@endforeach
