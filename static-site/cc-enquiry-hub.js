/* ============================================================================
   CC-ENQUIRY-HUB · engine  ·  cc-enquiry-hub.js  ·  v1.0
   ----------------------------------------------------------------------------
   Reads window.CC_ENQUIRY_HUB (config) and renders the form into any element
   with [data-cc-enquiry-hub]. Config-driven: never hard-code types/fields here.

   Mounts on: /contact (inline) · collaborate page (inline).
   Recording is mountMode:"external" (Path B) — engine exposes it in the
   dropdown and, when chosen, triggers the page's own booking popup; it does
   NOT render recording fields itself (folds in at Stage C).

   Contracts honoured (see CC-ENQUIRY-HUB-CONTRACT.md):
     - client carries routeKey only; submit is a placeholder stub (no network).
     - 4 statuses: active/paused/closed/hidden.
     - https-no-shortener validation on link fields.
     - reveal animation respects prefers-reduced-motion.
     - programmatic scroll uses window.__lenis when present.
     - no native validation popups (form is novalidate; JS validates).
   ============================================================================ */
(function () {
  'use strict';

  var CFG = window.CC_ENQUIRY_HUB;
  if (!CFG) { console.warn('[CC-ENQUIRY-HUB] config not found'); return; }

  var SHORTENERS = [
    'bit.ly','tinyurl.com','t.co','goo.gl','ow.ly','is.gd','buff.ly',
    'rebrand.ly','cutt.ly','shorturl.at','rb.gy','lnkd.in'
  ];

  /* ── helpers ────────────────────────────────────────────────────────────── */
  function el(tag, cls, attrs) {
    var n = document.createElement(tag);
    if (cls) n.className = cls;
    if (attrs) for (var k in attrs) { if (attrs[k] != null) n.setAttribute(k, attrs[k]); }
    return n;
  }
  function copy(key, fallback) { return (CFG.copy && CFG.copy[key]) || fallback || ''; }
  function reducedMotion() {
    return window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  }
  function scrollToEl(node) {
    if (!node) return;
    if (window.__lenis && typeof window.__lenis.scrollTo === 'function') {
      window.__lenis.scrollTo(node, { offset: -80 });
    } else {
      node.scrollIntoView({ behavior: reducedMotion() ? 'auto' : 'smooth', block: 'start' });
    }
  }
  function findType(id) {
    var found = null;
    (CFG.enquiryTypes || []).forEach(function (t) {
      if (t.id === id) found = t;
      (t.children || []).forEach(function (c) { if (c.id === id) found = c; });
    });
    return found;
  }
  function parentOf(childId) {
    var p = null;
    (CFG.enquiryTypes || []).forEach(function (t) {
      (t.children || []).forEach(function (c) { if (c.id === childId) p = t; });
    });
    return p;
  }
  function resolveFieldSet(type) {
    // child inherits parent's fieldSet unless it sets fieldSetOverride
    if (type.fieldSetOverride) return CFG.fieldSets[type.fieldSetOverride] || [];
    if (type.fieldSet) return CFG.fieldSets[type.fieldSet] || [];
    var par = parentOf(type.id);
    if (par && par.fieldSet) return CFG.fieldSets[par.fieldSet] || [];
    return [];
  }
  function resolveAgree(type) {
    if (type.agreePoints && type.agreePoints.length) return type.agreePoints;
    var par = parentOf(type.id);
    if (par && par.agreePoints && par.agreePoints.length) return par.agreePoints;
    return [];
  }
  function resolveRouteKey(type) {
    return type.routeKey || CFG.meta.routeDefault || 'general';
  }
  function resolveAck(type) {
    if (type.ackMessage) return type.ackMessage;
    var par = parentOf(type.id);
    return (par && par.ackMessage) || 'Received. Thanks for reaching out.';
  }

  /* ── validation ─────────────────────────────────────────────────────────── */
  function isHttpsNoShortener(val) {
    if (!val) return false;
    var u;
    try { u = new URL(val); } catch (e) { return false; }
    if (u.protocol !== 'https:') return false;
    var host = u.hostname.replace(/^www\./, '').toLowerCase();
    for (var i = 0; i < SHORTENERS.length; i++) if (host === SHORTENERS[i]) return false;
    return true;
  }
  function validEmail(val) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val); }

  /* ── field rendering ────────────────────────────────────────────────────── */
  // Build a single control (input/select/textarea) — reused by simple + multi fields.
  function buildControl(f, idSuffix) {
    var id = 'cchub-' + f.key + (idSuffix != null ? '-' + idSuffix : '');
    var input;
    if (f.type === 'textarea') {
      input = el('textarea', 'cchub__input cchub__input--textarea', {
        id: id, 'data-key': f.key, 'data-required': f.required ? 'true' : 'false',
        placeholder: f.placeholder || '', maxlength: f.maxlength || null, rows: f.rows || 4
      });
    } else if (f.type === 'select') {
      input = el('select', 'cchub__input cchub__input--select', {
        id: id, 'data-key': f.key, 'data-required': f.required ? 'true' : 'false'
      });
      var ph = el('option', null, { value: '' }); ph.textContent = f.placeholder || 'Select…';
      input.appendChild(ph);
      (f.options || []).forEach(function (o) { var op = el('option'); op.textContent = o; input.appendChild(op); });
    } else {
      var t = f.type === 'email' ? 'email' : (f.type === 'url' ? 'url' : (f.type === 'date' ? 'date' : 'text'));
      input = el('input', 'cchub__input', {
        id: id, 'data-key': f.key, 'data-required': f.required ? 'true' : 'false', type: t,
        inputmode: f.type === 'email' ? 'email' : null,
        autocomplete: f.autocomplete || null,
        placeholder: f.placeholder || '', maxlength: f.maxlength || null
      });
    }
    if (f.validate) input.setAttribute('data-validate', f.validate);
    return input;
  }

  function renderField(f) {
    var wrap = el('div', 'cchub__field' + (f.type === 'consent' ? ' cchub__field--consent' : ''));
    var id = 'cchub-' + f.key;

    // consent / single acknowledgement checkbox
    if (f.type === 'consent' || f.type === 'ack') {
      var lab = el('label', 'cchub__consent', { 'for': id });
      var cb = el('input', 'cchub__consent-input', { type: 'checkbox', id: id, 'data-key': f.key, 'data-required': f.required ? 'true' : 'false' });
      var span = el('span', 'cchub__consent-text');
      span.textContent = f.label || copy('consentLabel');
      lab.appendChild(cb); lab.appendChild(span);
      wrap.appendChild(lab);
      return wrap;
    }

    // toggle (NDA / social-ok style on/off)
    if (f.type === 'toggle') {
      wrap.className = 'cchub__field cchub__field--toggle';
      var tl = el('div', 'cchub__toggle-text');
      var tlab = el('div', 'cchub__toggle-label'); tlab.textContent = f.label;
      tl.appendChild(tlab);
      if (f.note) { var tn = el('div', 'cchub__toggle-note'); tn.textContent = f.note; tl.appendChild(tn); }
      var tbtn = el('button', 'cchub__toggle', { type: 'button', id: id, 'data-key': f.key, 'data-on': 'false', role: 'switch', 'aria-checked': 'false', 'aria-label': f.label });
      tbtn.addEventListener('click', function () {
        var on = tbtn.getAttribute('data-on') === 'true';
        tbtn.setAttribute('data-on', on ? 'false' : 'true');
        tbtn.setAttribute('aria-checked', on ? 'false' : 'true');
      });
      wrap.appendChild(tl); wrap.appendChild(tbtn);
      return wrap;
    }

    var label = el('label', 'cchub__label', { 'for': id });
    label.textContent = f.label;
    if (f.optional) {
      var opt = el('span', 'cchub__label-opt'); opt.textContent = ' (optional)';
      label.appendChild(opt);
    }
    wrap.appendChild(label);

    // multi — repeatable rows with add/remove
    if (f.multi) {
      var list = el('div', 'cchub__multi', { 'data-multi-for': f.key });
      function addRow(first) {
        var row = el('div', 'cchub__multi-row');
        var control = buildControl(f);            // shares data-key (collected as array)
        row.appendChild(control);
        var rm = el('button', 'cchub__multi-remove', { type: 'button', 'aria-label': 'Remove' });
        rm.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"><line x1="6" y1="6" x2="18" y2="18"/><line x1="6" y1="18" x2="18" y2="6"/></svg>';
        rm.addEventListener('click', function () {
          if (list.querySelectorAll('.cchub__multi-row').length > 1) row.remove();
          else control.value = '';
        });
        row.appendChild(rm);
        list.appendChild(row);
      }
      addRow(true);
      wrap.appendChild(list);
      var add = el('button', 'cchub__multi-add', { type: 'button' });
      add.textContent = f.addLabel || '+ Add another';
      add.addEventListener('click', function () { addRow(false); });
      wrap.appendChild(add);
      if (f.helper) { var h2 = el('p', 'cchub__help'); h2.textContent = copy(f.helper); wrap.appendChild(h2); }
      return wrap;
    }

    // simple single control
    wrap.appendChild(buildControl(f));
    if (f.helper) { var help = el('p', 'cchub__help'); help.textContent = copy(f.helper); wrap.appendChild(help); }
    return wrap;
  }

  /* ── collapsible "How we work" policy block ─────────────────────────────── */
  function renderPolicy(f) {
    var wrap = el('div', 'cchub__policy');
    var head = el('button', 'cchub__policy-head', { type: 'button', 'aria-expanded': 'false' });
    head.innerHTML = '<span>' + (f.label || 'How we work — please read') + '</span><span class="cchub__policy-chev" aria-hidden="true">▸</span>';
    var body = el('div', 'cchub__policy-body', { hidden: 'hidden' });
    (f.paragraphs || []).forEach(function (p) { var para = el('p'); para.textContent = p; body.appendChild(para); });
    head.addEventListener('click', function () {
      var open = head.getAttribute('aria-expanded') === 'true';
      head.setAttribute('aria-expanded', open ? 'false' : 'true');
      if (open) body.setAttribute('hidden', 'hidden'); else body.removeAttribute('hidden');
    });
    wrap.appendChild(head); wrap.appendChild(body);
    return wrap;
  }

  /* ── reveal animation ───────────────────────────────────────────────────── */
  function reveal(node) {
    node.classList.add('cchub-reveal');
    requestAnimationFrame(function () { node.classList.add('is-shown'); });
  }

  /* ── engine instance per mount ──────────────────────────────────────────── */
  function mount(root) {
    root.innerHTML = '';
    root.classList.add('cchub');

    // Eyebrow + H1 — per-mount overrides (data-eyebrow / data-heading) fall back to config.
    var eyebrowText = root.getAttribute('data-eyebrow');
    if (eyebrowText) {
      var eb = el('span', 'cchub__eyebrow'); eb.textContent = eyebrowText;
      root.appendChild(eb);
    }
    var headingText = root.getAttribute('data-heading') || CFG.meta.heading;
    if (headingText) {
      var h = el('h1', 'cchub__heading'); h.textContent = headingText;
      root.appendChild(h);
    }

    var card = el('div', 'cchub__card'); root.appendChild(card);
    var formArea = el('div', 'cchub__formarea'); card.appendChild(formArea);
    var ackArea = el('div', 'cchub__ack', { hidden: 'hidden', role: 'status', 'aria-live': 'polite' });
    card.appendChild(ackArea);

    // Per-mount type filter: data-types="collaborator,general" exposes only those.
    // Omitted = all configured top-level types.
    var allowAttr = root.getAttribute('data-types');
    var allow = allowAttr ? allowAttr.split(',').map(function (s) { return s.trim(); }) : null;
    function isAllowed(t) { return !allow || allow.indexOf(t.id) !== -1; }
    var visibleTypes = (CFG.enquiryTypes || []).filter(function (t) { return t.status !== 'hidden' && isAllowed(t); });

    // Level 1 container + (optional) select
    var l1wrap = el('div', 'cchub__field');
    var l1 = el('select', 'cchub__input cchub__input--select', { id: 'cchub-l1' });

    if (visibleTypes.length > 1) {
      var l1lab = el('label', 'cchub__label', { 'for': 'cchub-l1' }); l1lab.textContent = copy('level1Label', 'What brings you here?');
      var l1ph = el('option', null, { value: '' }); l1ph.textContent = copy('level1Placeholder', 'Select…'); l1.appendChild(l1ph);
      visibleTypes.forEach(function (t) {
        var o = el('option', null, { value: t.id });
        var note = t.status === 'paused' ? ' — ' + copy('pausedNote') : (t.status === 'closed' ? ' — ' + copy('closedNote') : '');
        o.textContent = t.label + note;
        if (t.status === 'paused' || t.status === 'closed') o.disabled = true;
        l1.appendChild(o);
      });
      l1wrap.appendChild(l1lab); l1wrap.appendChild(l1);
      formArea.appendChild(l1wrap);
    }
    // (single allowed type → no L1 dropdown; auto-rendered after handlers wire below)

    // Level 2 container (collaborator)
    var l2host = el('div'); formArea.appendChild(l2host);
    // Fields container
    var fieldsHost = el('div'); formArea.appendChild(fieldsHost);

    var state = { type: null, programme: null };

    function clearBelow(node) { while (node.firstChild) node.removeChild(node.firstChild); }

    function buildFields(typeObj) {
      clearBelow(fieldsHost);
      if (!typeObj) return;

      // external mount (recording, Path B)
      if (typeObj.mountMode === 'external') {
        var ext = el('div', 'cchub-reveal cchub__external');
        var msg = el('p', 'cchub__external-note');
        msg.textContent = 'Opens the recording brief form.';
        var btn = el('button', 'cchub__btn', { type: 'button' });
        btn.textContent = 'Open recording brief';
        btn.addEventListener('click', function () {
          var trigger = document.querySelector(typeObj.externalTrigger || '[data-open-booking]');
          if (trigger) trigger.click();
        });
        ext.appendChild(msg); ext.appendChild(btn);
        fieldsHost.appendChild(ext);
        reveal(ext);
        return;
      }

      var fields = resolveFieldSet(typeObj);
      if (!fields.length) return;

      var box = el('div', 'cchub-reveal');

      // honest line for collaborator paths
      var par = parentOf(typeObj.id);
      var isCollab = typeObj.id === 'collaborator' || (par && par.id === 'collaborator');
      if (isCollab && copy('honestLine')) {
        var honest = el('p', 'cchub__honest'); honest.textContent = copy('honestLine');
        box.appendChild(honest);
      }

      // per-programme instructions note (string or array of lines)
      var note = typeObj.note;
      if (note) {
        var noteBox = el('div', 'cchub__note');
        var lines = Array.isArray(note) ? note : [note];
        lines.forEach(function (ln) { var pNote = el('p'); pNote.textContent = ln; noteBox.appendChild(pNote); });
        box.appendChild(noteBox);
      }

      fields.forEach(function (f) {
        if (f.type === 'policy') box.appendChild(renderPolicy(f));
        else box.appendChild(renderField(f));
      });

      // agree-gate
      var agree = resolveAgree(typeObj);
      var agreeBox = null;
      if (agree.length) {
        agreeBox = el('div', 'cchub__agree');
        agree.forEach(function (pt, i) {
          var lab = el('label', 'cchub__agree-item', { 'for': 'cchub-agree-' + i });
          var cb = el('input', 'cchub__agree-input', { type: 'checkbox', id: 'cchub-agree-' + i });
          var sp = el('span'); sp.textContent = pt;
          lab.appendChild(cb); lab.appendChild(sp);
          agreeBox.appendChild(lab);
        });
        box.appendChild(agreeBox);
      }

      // expectation line
      var exp = el('p', 'cchub__expect');
      exp.textContent = isCollab ? copy('expectationCollab') : copy('expectationGeneral');
      box.appendChild(exp);

      // submit
      var submit = el('button', 'cchub__btn cchub__submit', { type: 'button' });
      submit.innerHTML = copy('submitLabel', 'Send') + ' <span aria-hidden="true">→</span>';
      box.appendChild(submit);

      var statusLine = el('p', 'cchub__status', { 'data-status': '', 'aria-live': 'polite' });
      box.appendChild(statusLine);

      fieldsHost.appendChild(box);
      reveal(box);

      submit.addEventListener('click', function () {
        handleSubmit(typeObj, box, agreeBox, statusLine);
      });
    }

    function handleSubmit(typeObj, box, agreeBox, statusLine) {
      var invalid = null;

      // group nodes by data-key (multi fields share a key across rows)
      var groups = {};
      box.querySelectorAll('[data-key]').forEach(function (node) {
        var k = node.getAttribute('data-key');
        (groups[k] = groups[k] || []).push(node);
      });

      Object.keys(groups).forEach(function (key) {
        var nodes = groups[key];
        var isToggle = nodes[0].tagName === 'BUTTON';        // toggle switch
        if (isToggle) return;                                 // toggles never invalid
        var req = nodes[0].getAttribute('data-required') === 'true';
        var v = nodes[0].getAttribute('data-validate');
        var isCheckbox = nodes[0].type === 'checkbox';

        nodes.forEach(function (n) { n.classList.remove('is-invalid'); });

        if (isCheckbox) {
          if (req && !nodes[0].checked) { nodes[0].classList.add('is-invalid'); if (!invalid) invalid = nodes[0]; }
          return;
        }

        // text/url/select/textarea — multi or single
        var anyFilled = false;
        nodes.forEach(function (n) {
          var val = (n.value || '').trim();
          if (val) anyFilled = true;
          // per-filled-row format validation
          if (val && n.type === 'email' && !validEmail(val)) { n.classList.add('is-invalid'); if (!invalid) invalid = n; }
          if (val && v === 'https-no-shortener' && !isHttpsNoShortener(val)) { n.classList.add('is-invalid'); if (!invalid) invalid = n; }
        });
        if (req && !anyFilled) { nodes[0].classList.add('is-invalid'); if (!invalid) invalid = nodes[0]; }
      });

      // agree-gate
      if (agreeBox) {
        var unchecked = false;
        agreeBox.querySelectorAll('input[type=checkbox]').forEach(function (cb) {
          if (!cb.checked) { unchecked = true; cb.closest('.cchub__agree-item').classList.add('is-invalid'); }
          else cb.closest('.cchub__agree-item').classList.remove('is-invalid');
        });
        if (unchecked && !invalid) invalid = agreeBox.querySelector('input');
      }

      if (invalid) {
        statusLine.textContent = 'Please complete the highlighted fields.';
        statusLine.setAttribute('data-status', 'error');
        if (invalid.focus) invalid.focus();
        return;
      }

      // build payload (Stage-C shape) — placeholder stub, no network
      var fieldsOut = {};
      Object.keys(groups).forEach(function (key) {
        var nodes = groups[key];
        if (nodes[0].tagName === 'BUTTON') {                  // toggle
          fieldsOut[key] = nodes[0].getAttribute('data-on') === 'true';
        } else if (nodes[0].type === 'checkbox') {
          fieldsOut[key] = nodes[0].checked;
        } else if (nodes.length > 1) {                        // multi -> array
          fieldsOut[key] = nodes.map(function (n) { return n.value.trim(); }).filter(Boolean);
        } else {
          fieldsOut[key] = nodes[0].value.trim();
        }
      });
      var par = parentOf(typeObj.id);
      var payload = {
        hub: 'CC-ENQUIRY-HUB', version: CFG.meta.version,
        type: par ? par.id : typeObj.id,
        programme: par ? typeObj.id : null,
        routeKey: resolveRouteKey(typeObj),
        fields: fieldsOut,
        agree: !!agreeBox,
        meta: { submittedAt: new Date().toISOString(), ua: navigator.userAgent, surface: location.pathname }
      };
      // STAGE-C: replace this stub with real POST to server endpoint.
      console.log('[CC-ENQUIRY-HUB] payload (stub):', payload);

      showAck(resolveAck(typeObj));
    }

    function showAck(message) {
      formArea.hidden = true;
      ackArea.hidden = false;
      ackArea.innerHTML = '';
      var tick = el('div', 'cchub__ack-tick', { 'aria-hidden': 'true' });
      tick.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>';
      var title = el('h2', 'cchub__ack-title'); title.textContent = 'Thanks — it\u2019s with us.';
      var body = el('p', 'cchub__ack-body'); body.textContent = message;
      var again = el('button', 'cchub__btn cchub__btn--ghost', { type: 'button' });
      again.textContent = 'Send another';
      again.addEventListener('click', function () {
        ackArea.hidden = true; formArea.hidden = false;
        l1.value = ''; clearBelow(l2host); clearBelow(fieldsHost);
        state = { type: null, programme: null };
        if (visibleTypes.length === 1) renderSingle(visibleTypes[0]);  // no dropdown to pick from
        scrollToEl(root);
      });
      ackArea.appendChild(tick); ackArea.appendChild(title); ackArea.appendChild(body); ackArea.appendChild(again);
      scrollToEl(root);
    }

    function buildLevel2(parentType) {
      clearBelow(l2host);
      clearBelow(fieldsHost);
      var box = el('div', 'cchub-reveal');
      var lab = el('label', 'cchub__label', { 'for': 'cchub-l2' }); lab.textContent = copy('level2Label', 'Which programme?');
      var sel = el('select', 'cchub__input cchub__input--select', { id: 'cchub-l2' });
      var ph = el('option', null, { value: '' }); ph.textContent = copy('level2Placeholder', 'Select a programme…'); sel.appendChild(ph);
      // Render <optgroup> when children carry a `group`; flat list otherwise.
      function makeOption(c) {
        var o = el('option', null, { value: c.id });
        var note = c.status === 'paused' ? ' — ' + copy('pausedNote') : (c.status === 'closed' ? ' — ' + copy('closedNote') : '');
        o.textContent = c.label + note;
        if (c.status === 'paused' || c.status === 'closed') o.disabled = true;
        return o;
      }
      var kids = (parentType.children || []).filter(function (c) { return c.status !== 'hidden'; });
      var anyGroup = kids.some(function (c) { return !!c.group; });
      if (anyGroup) {
        var order = [], buckets = {};
        kids.forEach(function (c) {
          var g = c.group || 'Other';
          if (!buckets[g]) { buckets[g] = []; order.push(g); }
          buckets[g].push(c);
        });
        order.forEach(function (g) {
          var og = el('optgroup', null, { label: g });
          buckets[g].forEach(function (c) { og.appendChild(makeOption(c)); });
          sel.appendChild(og);
        });
      } else {
        kids.forEach(function (c) { sel.appendChild(makeOption(c)); });
      }
      var fieldWrap = el('div', 'cchub__field'); fieldWrap.appendChild(lab); fieldWrap.appendChild(sel);
      box.appendChild(fieldWrap);
      l2host.appendChild(box);
      reveal(box);

      sel.addEventListener('change', function () {
        state.programme = sel.value;
        var child = findType(sel.value);
        buildFields(child);
      });
      return sel;
    }

    l1.addEventListener('change', function () {
      state.type = l1.value; state.programme = null;
      clearBelow(l2host); clearBelow(fieldsHost);
      var t = findType(l1.value);
      if (!t) return;
      if (t.children && t.children.length) { buildLevel2(t); }
      else { buildFields(t); }
    });

    /* Single allowed type → render it directly (no L1 dropdown shown). */
    function renderSingle(t) {
      state.type = t.id; state.programme = null;
      clearBelow(l2host); clearBelow(fieldsHost);
      if (t.children && t.children.length) buildLevel2(t);
      else buildFields(t);
    }

    /* deep-link preselect: ?type=&programme= (respects per-mount filter) */
    function preselect() {
      var q = new URLSearchParams(location.search);
      var type = q.get('type'), prog = q.get('programme');
      if (!type) return;
      var t = findType(type);
      if (!t || t.status === 'hidden' || t.status === 'closed') return;
      // top-level type must be allowed on this mount
      var top = parentOf(t.id) || t;
      if (!isAllowed(top)) return;
      if (visibleTypes.length > 1) { l1.value = type; l1.dispatchEvent(new Event('change')); }
      if (prog) {
        var c = findType(prog);
        if (c && c.status !== 'hidden' && c.status !== 'closed') {
          var l2 = l2host.querySelector('#cchub-l2');
          if (l2) { l2.value = prog; l2.dispatchEvent(new Event('change')); }
        }
      }
    }

    if (visibleTypes.length === 1) {
      renderSingle(visibleTypes[0]);
    } else {
      preselect();
    }
  }

  function init() {
    var roots = document.querySelectorAll('[data-cc-enquiry-hub]');
    roots.forEach(mount);
  }
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init);
  else init();
})();
