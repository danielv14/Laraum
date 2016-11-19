@unless (Auth::guest())
  @if (Auth::user()->bookmarks->contains($post->id))
    <bookmark :state="true" :post="{{ $post }}"></bookmark>
  @else
    <bookmark :state="false" :post="{{ $post }}"></bookmark>
  @endif
@endunless
