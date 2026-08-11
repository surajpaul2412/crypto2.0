<div class="booking-modal" id="bookingModal" role="dialog" aria-modal="true" aria-labelledby="bookingModalTitle" aria-hidden="true">
  <div class="booking-modal__backdrop" data-close-booking aria-hidden="true"></div>

  <div class="booking-modal__sheet" role="document">

    <button type="button" class="booking-modal__close" data-close-booking aria-label="Close booking form">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>

    <header class="booking-modal__head">
      <span class="booking-modal__eyebrow">Book a session</span>
      <h2 class="booking-modal__title" id="bookingModalTitle">
        Tell us about your <span class="booking-modal__title-accent">cue</span>
      </h2>
      <p class="booking-modal__sub">
        Five minutes. Honest brief. We confirm artist, studio date, and price within 24 hours.
      </p>
    </header>

    <form class="booking-form" id="bookingForm" autocomplete="on">

      <div class="booking-form__row">
        <label class="booking-form__field">
          <span class="booking-form__label">Your name</span>
          <input type="text" name="name" class="booking-form__input" placeholder="Composer name" required>
        </label>
        <label class="booking-form__field">
          <span class="booking-form__label">Email</span>
          <input type="email" name="email" class="booking-form__input" placeholder="you@studio.com" required>
        </label>
      </div>

      <div class="booking-form__row">
        <label class="booking-form__field">
          <span class="booking-form__label">Project name</span>
          <input type="text" name="project_name" class="booking-form__input" placeholder="The one project this recording is for" required>
        </label>
        <label class="booking-form__field">
          <span class="booking-form__label">Project type</span>
          <select name="project_type" class="booking-form__input booking-form__input--select" required>
            <option value="" disabled selected>Select project type</option>
            <option>Film score</option>
            <option>OTT / TV series</option>
            <option>Game audio</option>
            <option>Advertisement</option>
            <option>Album / single</option>
            <option>Trailer</option>
            <option>Documentary</option>
            <option>Other</option>
          </select>
        </label>
      </div>

      <div class="booking-form__field booking-form__field--full">
        <span class="booking-form__label">Instrument(s) requested</span>
        <div class="booking-form__multi" data-multi="instrument">
          <div class="booking-form__multi-row">
            <select name="instrument[]" class="booking-form__input booking-form__input--select" required>
              <option value="" disabled selected>Select an instrument</option>
              <optgroup label="Strings">
                <option>Sarangi</option><option>Sitar</option><option>Sarod</option>
                <option>Veena</option><option>Santoor</option><option>Esraj</option>
              </optgroup>
              <optgroup label="Winds">
                <option>Bansuri</option><option>Shehnai</option><option>Algoza</option>
              </optgroup>
              <optgroup label="Percussion">
                <option>Tabla</option><option>Dholak</option><option>Pakhawaj</option><option>Folk Percussion</option>
              </optgroup>
              <optgroup label="Vocals">
                <option>Hindustani Vocals</option><option>Folk Vocals</option>
              </optgroup>
            </select>
            <button type="button" class="booking-form__multi-remove" data-multi-remove aria-label="Remove instrument" hidden>&times;</button>
          </div>
        </div>
        <button type="button" class="booking-form__multi-add" data-multi-add="instrument">+ Add another instrument</button>
      </div>

      <div class="booking-form__row">
        <label class="booking-form__field">
          <span class="booking-form__label">Tempo / BPM</span>
          <input type="text" name="bpm" class="booking-form__input" placeholder="e.g. 90 BPM, free time, rubato">
        </label>
        <label class="booking-form__field">
          <span class="booking-form__label">Raga / scale / key</span>
          <input type="text" name="raga" class="booking-form__input" placeholder="e.g. Yaman, D minor, Phrygian">
        </label>
      </div>

      <label class="booking-form__field booking-form__field--full">
        <span class="booking-form__label">Brief · mood, role of the cue, what it must do</span>
        <textarea name="brief" class="booking-form__input booking-form__input--textarea" rows="4" placeholder="Tell us what your composition needs. Length, mood, dramatic role, any references."></textarea>
      </label>

      <div class="booking-form__row">
        <div class="booking-form__field">
          <span class="booking-form__label">Reference link(s)</span>
          <div class="booking-form__multi" data-multi="reference">
            <div class="booking-form__multi-row">
              <input type="url" name="reference[]" class="booking-form__input" placeholder="Dropbox · Drive · YouTube">
              <button type="button" class="booking-form__multi-remove" data-multi-remove aria-label="Remove link" hidden>&times;</button>
            </div>
          </div>
          <button type="button" class="booking-form__multi-add" data-multi-add="reference">+ Add another link</button>
        </div>
        <label class="booking-form__field">
          <span class="booking-form__label">Deadline</span>
          <input type="date" name="deadline" class="booking-form__input">
        </label>
      </div>

      <!-- How we work · collapsed on mobile, the trust + terms layer -->
      <details class="booking-form__how">
        <summary class="booking-form__how-summary">
          <span>How we work — please read before requesting</span>
          <span class="booking-form__how-chev" aria-hidden="true">▸</span>
        </summary>
        <div class="booking-form__how-body">
          <p><strong>This is a custom session, not a sample pack.</strong> A recording director and your chosen artist block dedicated studio time for your project alone. That focus is why the result feels composed <em>for</em> you — and why we take only one project into the room at a time.</p>
          <p><strong>We plan for 3–4 days from cleared payment.</strong> We've recorded for the industry for 15+ years and have never broken trust. We plan tightly and deliver our best — but live recording with real artists is human work. On rare occasions a session needs more time. When that happens, we tell you early. We'd rather protect the result than rush it.</p>
          <p><strong>A 50% advance opens the session.</strong> Work begins once it clears; the balance is due before final files are released.</p>
          <p><strong>One clear brief, no mid-project changes.</strong> We don't run revision rounds — we do one focused, properly planned session built around your brief. A settled vision is what lets the director deliver. If the brief shifts mid-way, the session can't. So tell us everything up front, and ask anything before we start. We're easy to talk to, and we'll push to make your project succeed.</p>
          <p><strong>What you can do with the recording.</strong> It's licensed for the one project you name above. You're free to use it within that composition — edit, arrange, mix, place it in your song or score — and <strong>sync rights are included</strong>, so you're cleared for film, TV, games, or ads for that project without chasing separate sync clearance. You may <strong>not</strong> resell the recording, raw or manipulated, as samples, stems, or a library, or reuse it in a different project. One recording, one project.</p>
          <p><strong>We love sharing the work.</strong> Crediting on release rests with you and your project — but our artists pour themselves into every session, and we're always glad when their contribution is acknowledged. When a project can be shared, seeing our artists' names travel with your success is the best part of what we do.</p>
          <p><strong>NDA if you need it — but the best projects love daylight.</strong> Tick the box below and we'll keep everything private. Honestly, though, our artists light up talking about the music they make, and sharing the craft is part of the joy here. If your project allows it, let it breathe.</p>
          <p class="booking-form__how-foot">Full licensing terms accompany your quote. Questions before you send? Just ask — we'd rather talk it through than have you guess.</p>

          <label class="booking-form__ack booking-form__ack--inhow" data-ack-row>
            <input type="checkbox" class="booking-form__ack-input" data-ack>
            <span class="booking-form__nda-box" aria-hidden="true"></span>
            <span class="booking-form__ack-label">I've read <strong>how Crypto Cipher works</strong>, and my brief reflects a clear, settled vision.</span>
          </label>
        </div>
      </details>

      <label class="booking-form__nda">
        <input type="checkbox" name="nda" class="booking-form__nda-input">
        <span class="booking-form__nda-box" aria-hidden="true"></span>
        <span class="booking-form__nda-label">
          Request an NDA for this project.
          <span class="booking-form__nda-note">Tick this only if your project is under wraps or you're bound by confidentiality.</span>
        </span>
      </label>

      <label class="booking-form__nda">
        <input type="checkbox" name="social_ok" class="booking-form__nda-input">
        <span class="booking-form__nda-box" aria-hidden="true"></span>
        <span class="booking-form__nda-label">
          You're welcome to share moments from my session on social media.
          <span class="booking-form__nda-note">We love posting the magic as it happens in the studio — the craft and the artists at work, never your unreleased composition.</span>
        </span>
      </label>

      <!-- Term acknowledgements · gate the submit (third tick lives inside How-we-work) -->
      <div class="booking-form__acks">
        <label class="booking-form__ack" data-ack-row>
          <input type="checkbox" class="booking-form__ack-input" data-ack>
          <span class="booking-form__nda-box" aria-hidden="true"></span>
          <span class="booking-form__ack-label">I understand work begins on a <strong>50% advance</strong>, with the balance due before final files are released.</span>
        </label>
        <label class="booking-form__ack" data-ack-row>
          <input type="checkbox" class="booking-form__ack-input" data-ack>
          <span class="booking-form__nda-box" aria-hidden="true"></span>
          <span class="booking-form__ack-label">I understand this recording is <strong>licensed for one named project</strong> — sync included — and may not be resold or reused in other projects.</span>
        </label>
      </div>

      <div class="booking-form__footer">
        <p class="booking-form__sr-status sr-only" data-sr-status role="status" aria-live="polite"></p>
        <p class="booking-form__gate" data-gate hidden>Please confirm the acknowledgements below — including reading <strong>How we work</strong> — before sending.</p>
        <p class="booking-form__note">
          We reply within 24 hours with a complete plan: artist, session director, studio date, delivery timeline, total cost.
        </p>
        <button type="submit" class="booking-form__submit" data-submit aria-disabled="true">
          <span>Send brief</span>
          <span class="booking-form__submit-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span>
        </button>
      </div>

    </form>

    <div class="booking-confirm" data-confirm hidden>
      <div class="booking-confirm__check" aria-hidden="true">
        <svg viewBox="0 0 52 52">
          <circle class="booking-confirm__check-ring" cx="26" cy="26" r="24" fill="none"/>
          <path class="booking-confirm__check-tick" fill="none" d="M14 27 l8 8 l16 -18"/>
        </svg>
      </div>
      <h2 class="booking-confirm__title">Brief received.</h2>
      <p class="booking-confirm__body">
        Thank you — we've got your project. You'll hear from us within 24 hours with a complete plan: artist, session director, studio date, delivery timeline, and total cost.
      </p>
      <p class="booking-confirm__hint">Check your inbox (and spam, just in case).</p>
      <button type="button" class="booking-form__submit booking-confirm__done" data-confirm-done>
        <span>Done</span>
      </button>
    </div>

  </div>
</div>
