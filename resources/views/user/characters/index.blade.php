<div class="uk-grid-small uk-flex-center" uk-grid>
  <div class="uk-width-1-2">
    <div class="uk-card uk-card-default uk-padding-remove">
      <div class="uk-card-header uk-background-primary-dark uk-text-white">
        Characters
      </div>
      <div class="uk-card-body uk-padding-remove">
        <table class="uk-table uk-table-divider uk-table-hover">
          <thead>
            <tr>
              <th><strong>Profession</strong></th>
              <th><strong>Character</strong></th>
              <th><strong>Level</strong></th>
              <th><strong>Play Time</strong></th>
              <th><strong>Deaths</strong></th>
              <th><strong>Created</strong></th>
            </tr>
          </thead>
          <tbody>
            @forelse($characters as $character)
              <tr>
                <td class="uk-table-link">
                  <a href="{{ route('user.character.show', $character->id) }}">{!! $character->image !!}</a>
                </td>
                <td class="uk-table-link">
                  <a href="{{ route('user.character.show', $character->id) }}" class="uk-link-reset">{{ $character->name }}</a>
                </td>
                <td class="uk-table-link">
                  <a href="{{ route('user.character.show', $character->id) }}" class="uk-link-reset">{{ $character->level }}</a>
                </td>
                <td class="uk-table-link">
                  <a href="{{ route('user.character.show', $character->id) }}" class="uk-link-reset">
                    <small>{{ secondsToReadable($character->age) }}</small>
                  </a>
                </td>
                <td class="uk-table-link">
                  <a href="{{ route('user.character.show', $character->id) }}" class="uk-link-reset">{{ $character->deaths }}</a>
                </td>
                <td class="uk-table-link">
                  <a href="{{ route('user.character.show', $character->id) }}" class="uk-link-reset">
                    <small>{{ $character->created_at->format('F jS, Y g:ia') }}</small>
                  </a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6">You do not have any characters.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
