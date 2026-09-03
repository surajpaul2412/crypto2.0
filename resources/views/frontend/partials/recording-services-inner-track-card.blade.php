{{-- Shared by §1B "Listen" demos and §4 "Articulations" — both render the
     same track-card component against one $track (RecordingInstrumentTrack).
     data-src empty/data-peaks missing degrade gracefully in cc-demo-player.js
     (non-playable row / blank waveform) — no audio upload required to ship. --}}
<article class="track-card player__row"
         data-track="track-{{ $track->id }}"
         @if ($track->art_id) data-art-id="{{ $track->art_id }}" @endif
         data-src="{{ $track->audioUrl() }}"
         @if ($track->peaksUrl()) data-peaks="{{ $track->peaksUrl() }}" @endif
         data-reveal>
  <div class="track-card__top">
    <span class="track-card__tag">
      <span class="track-card__tag-dot" aria-hidden="true"></span>
      {{ $track->tag_label }}
    </span>
  </div>

  <h3 class="track-card__title">{{ $track->title }}</h3>
  <p class="track-card__desc">
    {{ $track->description }}
  </p>

  <div class="track-card__player">
    <button class="track-card__play player__play" type="button" aria-label="Play {{ $track->title }} demo">
      <svg class="track-card__icon-play" viewBox="0 0 24 24" aria-hidden="true">
        <polygon points="6 4 20 12 6 20"/>
      </svg>
      <svg class="track-card__icon-pause" viewBox="0 0 24 24" aria-hidden="true">
        <rect x="6" y="4" width="4" height="16" rx="1"/>
        <rect x="14" y="4" width="4" height="16" rx="1"/>
      </svg>
      <svg class="track-card__icon-loading" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true">
        <path d="M21 12a9 9 0 1 1-6.219-8.56"/>
      </svg>
    </button>
    <div class="track-card__wave player__wave">
      <div class="track-card__wave-skeleton" aria-hidden="true"></div>
    </div>
  </div>

  <div class="track-card__time" aria-hidden="true">
    <span class="track-card__time-current player__elapsed" data-time-current>0:00</span>
    <span class="track-card__time-total player__duration" data-time-total></span>
  </div>
</article>
