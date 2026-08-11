/* ============================================================================
   CC-ENQUIRY-HUB · form-config  ·  v1.0
   ----------------------------------------------------------------------------
   SINGLE SOURCE OF TRUTH for the site-wide enquiry form.
   Rendered by cc-enquiry-hub.js on: /contact  ·  collaborate page.
   (Recording popup on page 04 folds into this engine at Stage C — Path B.)

   PATH 1 (now):     THIS FILE is the editor. Edit here, it reflects on every
                     surface that mounts the engine. No layout change needed.
   STAGE C (later):  Filament admin writes to this exact contract shape.
                     Routing (routeKey -> email) + send live server-side.

   HARD RULES (do not break — Stage-C dev relies on these):
     - NO email addresses in this file. Client carries routeKey only.
     - NO money / numbers / contract terms. Benefit TYPE lives on the
       Collaborate PAGE copy, never in the form/config.
     - Adding / pausing / closing / hiding a programme = edit `status` or add
       a child entry here. NEVER edit the engine or page markup for that.
     - Field sets are defined ONCE in `fieldSets` and referenced by id.
       A child may override its parent's fieldSet only via `fieldSetOverride`.

   STATUS VALUES (4):
     active  → selectable in dropdown, form renders normally
     paused  → visible but greyed + disabled; shows `pausedNote` ("check back")
     closed  → visible but greyed + disabled; shows `closedNote` ("not accepting")
     hidden  → absent from the dropdown entirely (as if not configured)
   ============================================================================ */

window.CC_ENQUIRY_HUB = {
  meta: {
    id: "CC-ENQUIRY-HUB",
    version: "1.0",
    route: "/contact",            // canonical standalone route (searchable slug)
    heading: "Namaste",           // page H1 — nothing above the dropdown
    routeDefault: "general"       // fallback routeKey if none resolves
  },

  /* Copy that the engine injects (single place to edit tone) ----------------- */
  copy: {
    level1Label: "What brings you here?",
    level1Placeholder: "Select…",
    level2Label: "Which programme?",
    level2Placeholder: "Select a programme…",

    // Collaborator-only, shown above the collaborator fields (visible, warm):
    honestLine:
      "No bar for where you're from — only for what you've built. Show us something real.",

    // Helper under the work-link field:
    linkHelper:
      "Your site, SoundCloud, GitHub, Behance, IMDb, YouTube, or LinkedIn — " +
      "any https link that shows real work. No link shorteners.",

    // Expectation line shown BEFORE submit (sets the no-reply expectation):
    expectationCollab:
      "We don't auto-reply. If it's a fit for what we're building now, you'll hear " +
      "from us — silence is about timing, never a verdict.",
    expectationGeneral:
      "We read every message and reply by hand, usually within a couple of days.",

    // Generic consent label (per-type ack lives on the type entry):
    consentLabel:
      "I agree to be contacted about this enquiry and accept the privacy policy.",

    // Status notes:
    pausedNote: "Currently full — check back soon.",
    closedNote: "Not accepting applications right now.",

    submitLabel: "Send",
    submitDoneLabel: "Sent"
  },

  /* Reusable field-set templates — defined ONCE, referenced by id ------------ */
  /* type: text | email | url | textarea | select | consent                    */
  /* validate: "https-no-shortener" enforces https + rejects known shorteners  */
  fieldSets: {

    general: [
      { key: "name",    label: "Your name",   type: "text",     required: true,  autocomplete: "name",  maxlength: 120 },
      { key: "email",   label: "Email",       type: "email",    required: true,  autocomplete: "email" },
      { key: "message", label: "Your message",type: "textarea", required: true,  maxlength: 1200, placeholder: "How can we help?" },
      { key: "consent", label: null,          type: "consent",  required: true }
    ],

    collaborator: [
      { key: "name",        label: "Your name",            type: "text",     required: true,  autocomplete: "name",  maxlength: 120 },
      { key: "based",       label: "Where are you based?", type: "text",     required: true,  autocomplete: "country-name", placeholder: "City, country" },
      { key: "links",       label: "Your work",            type: "url",      required: true,  multi: true, addLabel: "+ Add another link", validate: "https-no-shortener", placeholder: "https://…", helper: "linkHelper" },
      { key: "why",         label: "Why this interests you",type: "textarea", required: true,  maxlength: 800, placeholder: "A few lines…" },
      { key: "consent",     label: null,                   type: "consent",  required: true }
    ],

    recording: [
      { key: "name",         label: "Your name",     type: "text",  required: true, autocomplete: "name", placeholder: "Composer name" },
      { key: "email",        label: "Email",         type: "email", required: true, autocomplete: "email", placeholder: "you@studio.com" },
      { key: "project_name", label: "Project name",  type: "text",  required: true, placeholder: "The one project this recording is for" },
      { key: "project_type", label: "Project type",  type: "select", required: true, placeholder: "Select project type",
        options: ["Film score","OTT / TV series","Game audio","Advertisement","Album / single","Trailer","Documentary","Other"] },
      { key: "instruments",  label: "Instrument(s) requested", type: "select", required: true, multi: true, addLabel: "+ Add another instrument", placeholder: "Select an instrument",
        options: ["Sarangi","Sitar","Sarod","Veena","Santoor","Esraj","Bansuri","Shehnai","Algoza","Tabla","Dholak","Pakhawaj","Folk Percussion","Hindustani Vocals","Folk Vocals"] },
      { key: "bpm",          label: "Tempo / BPM",   type: "text", required: false, placeholder: "e.g. 90 BPM, free time, rubato" },
      { key: "raga",         label: "Raga / scale / key", type: "text", required: false, placeholder: "e.g. Yaman, D minor, Phrygian" },
      { key: "brief",        label: "Brief \u00b7 mood, role of the cue, what it must do", type: "textarea", required: true, rows: 4, placeholder: "Tell us what your composition needs. Length, mood, dramatic role, any references." },
      { key: "reference",    label: "Reference link(s)", type: "url", required: false, multi: true, addLabel: "+ Add another link", validate: "https-no-shortener", placeholder: "Dropbox \u00b7 Drive \u00b7 YouTube" },
      { key: "deadline",     label: "Deadline", type: "date", required: false },
      { key: "policy",       type: "policy", label: "How we work \u2014 please read before requesting", paragraphs: [
        "This is a custom session, not a sample pack. A recording director and your chosen artist block dedicated studio time for your project alone. That focus is why the result feels composed for you \u2014 and why we take only one project into the room at a time.",
        "We plan for 3\u20134 days from cleared payment. We've recorded for the industry for 15+ years and have never broken trust. We plan tightly and deliver our best \u2014 but live recording with real artists is human work. On rare occasions a session needs more time. When that happens, we tell you early. We'd rather protect the result than rush it.",
        "A 50% advance opens the session. Work begins once it clears; the balance is due before final files are released.",
        "One clear brief, no mid-project changes. We don't run revision rounds \u2014 we do one focused, properly planned session built around your brief. A settled vision is what lets the director deliver. If the brief shifts mid-way, the session can't. So tell us everything up front, and ask anything before we start.",
        "What you can do with the recording. It's licensed for the one project you name above \u2014 edit, arrange, mix, place it in your song or score \u2014 and sync rights are included for film, TV, games, or ads for that project. You may not resell the recording as samples, stems, or a library, or reuse it in a different project. One recording, one project.",
        "NDA if you need it \u2014 but the best projects love daylight. Tick the box below and we'll keep everything private. If your project allows it, let it breathe.",
        "Full licensing terms accompany your quote. Questions before you send? Just ask."
      ] },
      { key: "nda",       label: "Request an NDA for this project.", type: "toggle", note: "Tick this only if your project is under wraps or you're bound by confidentiality." },
      { key: "social_ok", label: "You're welcome to share moments from my session on social media.", type: "toggle", note: "We love posting the craft and the artists at work \u2014 never your unreleased composition." },
      { key: "ack_read",  label: "I've read how Crypto Cipher works, and my brief reflects a clear, settled vision.", type: "ack", required: true },
      { key: "ack_pay",   label: "I understand work begins on a 50% advance, with the balance due before final files are released.", type: "ack", required: true },
      { key: "ack_lic",   label: "I understand this recording is licensed for one named project \u2014 sync included \u2014 and may not be resold or reused in other projects.", type: "ack", required: true }
    ],

    // recording: NOT a generated fieldSet (Path B). The page-04 booking-form
    // popup mounts as-is and is engine-controlled for routing/status/ack only.
    // At Stage C this becomes `fieldSets.recording` and the engine renders it.
  },

  /* The dropdown tree -------------------------------------------------------- */
  enquiryTypes: [

    {
      id: "general",
      label: "General enquiry",
      status: "active",
      parent: null,
      fieldSet: "general",
      routeKey: "general",
      ackMessage:
        "Got it — this is with us. We read every message and reply by hand. " +
        "Thanks for reaching out.",
      agreePoints: []
    },

    {
      id: "recording",
      label: "Recording services",
      status: "active",
      parent: null,
      // Renders inline (full fidelity) wherever the mount allows it (contact).
      // Locked service pages keep their own popup, untouched (separate markup).
      fieldSet: "recording",
      routeKey: "recording",
      ackMessage:
        "Brief received. We'll read it and reply by hand within 24 hours.",
      agreePoints: []
    },

    {
      id: "collaborator",
      label: "Collaborate with us",
      status: "active",
      parent: null,
      fieldSet: "collaborator",     // children inherit this set
      routeKey: null,               // never submitted alone — must pick a programme
      ackMessage: null,
      // Collaborator paths all share the same minimal field set; they differ
      // only by label / status / routeKey / ackMessage. Backend-scalable later.
      agreePoints: [
        "I built the work I'm sharing, or have the right to share it.",
        "I understand collaboration terms are set by Crypto Cipher and shared in full on acceptance."
      ],
      children: [
        /* ── Creative ── */
        { id: "artists", group: "Creative", label: "Artists / instrumentalists", status: "active", routeKey: "collab-artists", ackMessage: "Received. Quiet doesn't mean no — timing and fit change, and you're always welcome back." },
        { id: "composers", group: "Creative", label: "Composers", status: "active", routeKey: "collab-composers", ackMessage: "Received. Quiet doesn't mean no — timing and fit change, and you're always welcome back." },
        { id: "sound", group: "Creative", label: "Sound designers", status: "active", routeKey: "collab-sound", ackMessage: "Received. Quiet doesn't mean no — timing and fit change, and you're always welcome back." },
        { id: "content", group: "Creative", label: "Content creators", status: "active", routeKey: "collab-content", ackMessage: "Received. Quiet doesn't mean no — timing and fit change, and you're always welcome back." },
        /* ── Technical ── */
        { id: "producers", group: "Technical", label: "Producers / audio engineers", status: "active", routeKey: "collab-producers", ackMessage: "Received. Quiet doesn't mean no — timing and fit change, and you're always welcome back." },
        { id: "ksp", group: "Technical", label: "Kontakt script programmers", status: "active", routeKey: "collab-ksp", ackMessage: "Received. Quiet doesn't mean no — timing and fit change, and you're always welcome back." },
        { id: "web", group: "Technical", label: "Web / platform developers", status: "closed", routeKey: "collab-web", ackMessage: "Received. Quiet doesn't mean no — timing and fit change, and you're always welcome back." },
        { id: "designers", group: "Technical", label: "UI / graphic designers", status: "closed", routeKey: "collab-design", ackMessage: "Received. Quiet doesn't mean no — timing and fit change, and you're always welcome back." },
        /* ── Reach ── */
        { id: "affiliates", group: "Reach", label: "Affiliates / ambassadors", status: "active", routeKey: "collab-affiliates", ackMessage: "Received. Quiet doesn't mean no — timing and fit change, and you're always welcome back." }
      ]
    }

  ]
};
