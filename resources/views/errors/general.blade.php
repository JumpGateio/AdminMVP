@extends('layouts.error')

<div class="uk-section uk-height-1-1 uk-background-gray-lighter uk-flex uk-flex-center uk-flex-middle">
  <div class="uk-text-center">
    @if ($error->getCode() !== 0)
    <h1 class="uk-text-center uk-text-gray-light uk-margin-remove-bottom">
      Error {{ $error->getCode() }}
    </h1>
    <div class="uk-text-center uk-text-gray-light">
      {{ $error->getMessage() }}
    </div>
    @elseif ($error->getMessage())
      <h1 class="uk-text-center uk-text-gray-light">
        {{ $error->getMessage() }}
      </h1>
    @else
      <h1 class="uk-text-center uk-text-gray-light">
        Something went wrong
      </h1>
    @endif
      <a href="{{ route('home') }}" class="uk-button uk-button-text uk-margin-small-top">
        <i class="fa fa-fw fa-long-arrow-left"></i>&nbsp;Back to site
      </a>
  </div>
</div>
