# PMOlogy Landing Page — Codebase Mapping

> Maps the approved storyboard (`docs/landing-page-storyboard.md`) and implementation spec (`docs/landing-page-implementation-spec.md`) onto the actual current prototype (`site/`). No code changed — this is the pre-build inspection pass that grounds the spec in real file paths, class names, and line numbers so implementation can start directly from this document.

---

## 1. Current homepage sections and their corresponding files/components

All homepage markup lives in one file: `site/index.html` (177 lines). No templating/partials exist — header and footer are duplicated inline (also present, identically, in all 10 other pages). Shared styling: `site/css/styles.css` (571 lines). Shared behavior: `site/js/main.js` (74 lines).

| # | Current section | Lines (`index.html`) | Purpose today |
|---|---|---|---|
| 1 | `.site-header` | 15–43 | Sticky nav, brand mark, mobile toggle — shared across all pages |
| 2 | `.hero` | 47–64 | Headline, plates SVG, CTAs — the only section with bespoke animation |
| 3 | `.section` "Three ways we add intelligence" | 66–109 | Three `.card` service tiles (PMO Consulting / AI Adoption / Project Controls, Reporting & Automation) |
| 4 | `.section--alt` "Six ideas behind every engagement" | 111–124 | `.theme-list` — six numbered value statements |
| 5 | `.section` closing CTA | 126–140 | "Let's talk about where an intelligence layer fits" + two CTAs |
| 6 | `.site-footer` | 144–174 | Shared footer — identical across all pages |

**Storyboard-relevant takeaway:** the storyboard's four new/refined sections (Hero, Project Controls, Intelligence Layer, Responsible AI) map onto this page as: refine section 2 in place, and insert two new sections between section 3 and section 4 (Project Controls, Intelligence Layer), plus one new section for Responsible AI — most naturally between section 4 (values) and section 5 (closing CTA), so the page still ends on the existing CTA pattern unchanged.

---

## 2. Existing hero implementation

**Current plate animation** (`site/css/styles.css` lines 288–348, `site/index.html` lines 48–54)
- Markup: one inline `<svg class="hero__plates" viewBox="0 0 360 320">` containing five `<rect>` elements (`plate--1` through `plate--5`), positioned absolutely within `.hero`, `right: -24px`, vertically centered, `width: 380px`, `max-width: 46vw`.
- Styling: `.plate` fill is `var(--pmology-color-blue)` at increasing opacity per plate (0.35 → 0.55 → 0.55 → 0.8), `.plate--5` fill is `var(--site-accent)` (Teal) at full opacity, thicker (`height` 14 vs. 10) and offset further right (`x="90"` vs. others starting at 20–70).
- Entrance animation: `@keyframes plate-in` (opacity 0→1, `translateX(36px)`→`0`, or `56px` for plate 5), each plate given a staggered `animation-delay` (80/160/240/320/480ms), `700ms cubic-bezier(0.16, 1, 0.3, 1)`, gated entirely behind `@media (prefers-reduced-motion: no-preference)` — under reduced motion, plates render at rest with no animation.
- Responsive: `@media (max-width: 1023px) { .hero__plates { display: none; } }` — mobile hero is text-only by design, not a scaled-down graphic.

**Scroll parallax** (`site/js/main.js` lines 38–54)
- Vanilla JS, `requestAnimationFrame`-throttled scroll listener, capped offset (`Math.min(y, 400) * 0.08`), applies `translateY` on top of the existing `translateY(-50%)` centering transform.
- Skipped entirely if `reduceMotion` (checked once via `matchMedia`) — not just slowed, fully absent.

**CSS classes involved:** `.hero`, `.hero__plates`, `.plate`, `.plate--1..5`, `.hero__content`, `.hero__rule` (the static interior-page variant, unused on Home), `.hero__ctas`.

**SVG/assets used:** none external — the plates are hand-authored inline `<rect>` geometry, no `.svg` file, no raster asset. This is the only visual asset in the hero beyond typography.

**What can be refined without rebuilding:**
- `viewBox`, `width`, `max-width`, and individual `<rect>` `width`/`height`/`x`/`y` values can all change to increase visual scale — purely numeric edits, no new markup pattern.
- Parallax's `0.08` multiplier and `400` cap can be re-tuned to stay "subtle" at the new larger scale — one-line JS change.
- Everything else (keyframe timing, stagger delays, reduced-motion gating, mobile hide breakpoint) should be left untouched — it's already correct per the storyboard's explicit instruction to refine, not rebuild.

**Implementation complexity: Low.** No new files, no new classes, no new JS logic — numeric adjustments to existing values in `index.html` (SVG geometry) and `styles.css` (`.hero__plates` sizing), possibly one constant in `main.js`.

---

## 3. Existing design system (tokens available for reuse)

All defined in `site/css/styles.css` `:root` (lines 32–74).

**Colors**
| Token | Value | Storyboard use |
|---|---|---|
| `--pmology-color-ink` | `#0F172A` | Page background (`--site-bg`) |
| `--pmology-color-slate` | `#1E293B` | Alt-section background (`--site-bg-alt`), muted "before" state |
| `--pmology-color-paper` | `#F8FAFC` | Primary text on dark (`--site-text`) |
| `--pmology-color-teal` | `#14B8A6` | `--site-accent` — the single accent color for every "after"/"added" element (Project Controls' forecast marker, Intelligence Layer's absorption point, hero's plate--5) |
| `--pmology-color-blue` | `#003DA5` | Muted "existing systems" fill — already used exactly this way for `.hero__plates .plate` and `.service-icon .bar--1/.bar--2` |
| `--site-text-secondary` | `#B9C3D4` | De-emphasized copy |
| `--site-border` | `#2C3A50` | Card/section borders, connecting lines (already used for `.process-list::before`) |

No new colors are needed for any storyboard section — Project Controls and Intelligence Layer both reuse the exact Blue-muted/Teal-accent pairing already established by the hero plates and service icons.

**Typography**
`--font-sans: 'IBM Plex Sans', ...` (line 61). Type scale classes already defined and usable as-is: `.display`, `.h1`–`.h4`, `.eyebrow`, `.body-lg`, `.body`, `.body-sm` (lines 104–121). No new type styles required by the storyboard — every section's copy (eyebrow + heading + body) maps directly onto this existing scale.

**Spacing tokens**
8px-based scale, `--space-1` (8px) through `--space-12` (96px) (lines 64–70), plus `--container-max: 1280px` and `--content-measure: 68ch`. Section-level rhythm already standardized via `.section { padding-block: var(--space-12); }` (line 135) and `.section--alt` for alternate-background bands (line 139). New sections should use these classes directly, not introduce new spacing values.

**Animation/reveal patterns**
- `.reveal` / `.reveal.is-visible` (lines 553–570): the sitewide scroll-fade-in pattern, gated behind `html.js-reveal-ready` (set only once `main.js` confirms JS + `IntersectionObserver` availability and no reduced-motion preference — lines 60–72 of `main.js`). Delay classes `.reveal--d1` through `.reveal--d8` (90ms increments) already exist and are reused as-is by the Project Controls/Intelligence Layer sections' own internal staggers where applicable.
- `.card:hover` transform/color pattern (lines 393–401): lift + border-brighten, gated separately for `transform` under reduced motion.
- `.primary-nav a::after` underline-grow (lines 191–204): `transform: scaleX()` on a pseudo-element, `250ms cubic-bezier(0.16, 1, 0.3, 1)` — this is the exact mechanic specified for the Responsible AI section's governance-principle hover/focus interaction.

No new animation *infrastructure* is required anywhere in the storyboard — every new motion either reuses `.reveal`'s IntersectionObserver gating, the plate-in keyframe pattern, or the nav-underline pseudo-element technique, all already present in `styles.css`/`main.js`.

---

## 4. Mapping: current codebase → storyboard sections

### 4a. Hero refinement

- **Existing elements to reuse:** `.hero`, `.hero__content`, `.hero__plates` SVG and all five `.plate` rects, `plate-in` keyframes, stagger delays, parallax JS, reduced-motion gating, mobile hide rule — effectively the entire existing implementation.
- **New elements required:** none. Only value changes (SVG `viewBox`/rect dimensions, `.hero__plates` `width`/`max-width`, parallax multiplier/cap).
- **Files that would change:** `site/index.html` (SVG geometry, lines 48–54), `site/css/styles.css` (`.hero__plates` sizing, ~line 302–312), optionally `site/js/main.js` (parallax constants, line 44).
- **Implementation complexity: Low.**

### 4b. Project Controls section

> **Superseded 2026-08-06:** per the approved Project Intelligence Visualization concept, Project Controls and Intelligence Layer now share **one** SVG component (`.intelligence-panel`, name suggested), not two independently authored panels. This subsection covers that shared component's first appearance; 4c covers its second.

- **Existing elements to reuse:** `.section`/`.section--alt` shell, `.eyebrow`/`h2`/`.body` copy pattern, `.grid`/`.grid-3` layout, `.reveal`/`.reveal--d1..d8` stagger classes, `--pmology-color-blue`/`--site-accent` tokens, the flat-`<rect>` SVG authoring style already proven in `.hero__plates` and `.service-icon` (lines 407–411).
- **New elements required:** one new inline SVG component — the shared `.intelligence-panel` — showing three stages (fragmented muted-Blue marks → convergence → single Teal element), not a schedule/cost/risk dashboard with per-metric breakouts. A new CSS block for the Stage 1→2 transform transition (analogous to, but distinct from, `plate-in` — this one animates *position/rotation* of already-visible elements rather than opacity/entrance) plus the Stage 3 Teal reveal, and a new IntersectionObserver hook (or extension of the existing one) to trigger the sequence once in view. No RAG colors, no per-metric labels/legends — see storyboard Section 2 for the full constraint list.
- **Files that would change:** `site/index.html` (new `<section>` markup + the shared inline SVG's first instance, inserted after the current "Three ways we add intelligence" section, ~after line 109), `site/css/styles.css` (new shared component classes, e.g. `.intelligence-panel`, `.intelligence-panel__mark`, transition rules used by both this section and 4c), `site/js/main.js` (extend or duplicate the existing reveal-observer pattern if the multi-stage timing needs its own trigger logic beyond what `.reveal` already provides).
- **Implementation complexity: Medium.** New SVG authoring + new (if modest) transition logic, but every underlying technique (flat rects, IntersectionObserver reveal, staggered CSS transitions, reduced-motion gating) already has a working precedent elsewhere in the file to copy from. Building this first establishes the shared component 4c then reuses.

### 4c. Intelligence Layer section

- **Existing elements to reuse:** the **same** `.intelligence-panel` component built for Project Controls (4b) — not a new SVG, not a new class namespace — reused here already at rest in its Stage 3 state, plus the hero's plate geometry/shape language as the source of that component's visual grammar.
- **New elements required:** no new SVG component. Only an additional CSS/animation layer on top of the existing `.intelligence-panel`: a small number of short rectilinear "flow mark" elements animating from the panel's muted-Blue portions toward its Teal element, then fading on arrival, plus a subtle Teal "absorption" state change (a brightness/thickness shift, explicitly no `box-shadow`/blur per D-0004). Copy block framed to carry both the "AI-Enabled Project Controls" and "AI Adoption Services" meanings in one pass (per the storyboard's single-pass recommendation).
- **Files that would change:** `site/index.html` (new `<section>` reusing the shared SVG markup, inserted after the Project Controls section), `site/css/styles.css` (an additive modifier, e.g. `.intelligence-panel--absorb`, plus `.intelligence-panel__flow-mark` and its travel/fade keyframes — not a parallel component), `site/js/main.js` (reveal trigger, same pattern as Project Controls) — **and, only if the CSS-hand-coded stagger proves unworkable**, a new `<script>` tag loading GSAP from CDN scoped to this page only, per the implementation spec's conditional recommendation.
- **Implementation complexity: Medium–High**, but lower than originally scoped now that the panel itself is shared rather than independently authored — the remaining complexity is specifically the dependent end-state (Teal element's absorption reaction depends on the flow marks' arrival), the one case flagged in the implementation spec as a possible GSAP candidate if CSS delays become hard to maintain by hand.

### 4d. Responsible AI section

- **Existing elements to reuse:** `.section`/`.section--alt` shell, `.eyebrow`/`h2`/`.body`, `.theme-list`/`.theme-item` pattern (lines 425–432) for the governance-principle list — reused directly, not adapted, per the storyboard's "no new component" instruction — and the `.primary-nav a::after` underline mechanic, retargeted onto `.theme-item` (or a scoped variant) for the hover/focus micro-interaction.
- **New elements required:** minimally, a small CSS rule extending the underline-grow pattern to the governance-item labels (likely a new class like `.principle-item` reusing `.theme-item`'s layout plus the borrowed underline pseudo-element, rather than modifying `.theme-item` itself and risking changing its existing use on Home).
- **Files that would change:** `site/index.html` (new `<section>`, inserted between the "Six ideas" section and the closing CTA section, i.e. between current lines 124 and 126), `site/css/styles.css` (small new rule set, largely copy-adapted from existing `.theme-item` and `.primary-nav a::after` blocks).
- **Implementation complexity: Low.** No new SVG, no new JS, no new animation infrastructure — the smallest lift of the four sections, consistent with the storyboard's intent that this section carry the least engineering investment.

---

## Summary table

| Storyboard section | Reuse level | New files | New classes/components | Complexity |
|---|---|---|---|---|
| Hero refinement | Very high (~100%) | None | None (value tuning only) | Low |
| Project Controls | High | None (edits to existing 3 files) | 1 new SVG component + transition CSS | Medium |
| Intelligence Layer | High | None (edits to existing 3 files; possible CDN `<script>` if GSAP adopted) | 1 new SVG component + travel/absorption CSS | Medium–High |
| Responsible AI | Very high | None | 1 small CSS extension of existing patterns | Low |

**No new files are required anywhere in this plan** — every change lands inside the three files that already constitute the site's shared frontend (`site/index.html`, `site/css/styles.css`, `site/js/main.js`), consistent with the prototype's no-build, no-templating architecture. The only conditional exception is a CDN-loaded GSAP `<script>`, scoped to the homepage only, and only if the Intelligence Layer section's hand-coded CSS sequencing proves genuinely difficult — per the implementation spec, this should be attempted in CSS first.

**Suggested build order (unchanged from the implementation spec, now grounded in file terms):** Project Controls → Intelligence Layer → Responsible AI → Hero refinement — front-loading the two sections with real new-component work, leaving the two low-complexity, high-reuse sections (Hero, Responsible AI) as flexible-timing work that can slot in around the harder two.
