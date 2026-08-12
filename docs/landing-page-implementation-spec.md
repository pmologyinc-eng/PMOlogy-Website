# PMOlogy Landing Page — Implementation Design Specification

> Converts the approved storyboard (`docs/landing-page-storyboard.md`) into a build-ready spec. No code in this document — component/asset/behavior definitions only, so implementation can proceed section by section against a fixed plan.
>
> Baseline constraint carried from the current codebase: the site is dependency-free, no-build-step static HTML/CSS/JS (`site/js/main.js` header comment: "minimal, dependency-free JS"). Every technology recommendation below is evaluated against whether it's worth breaking that precedent — see the "CSS vs. SVG/GSAP vs. static" decision at the end before starting build.

---

## 1. Hero Section

**1. Required components**
- Existing `.hero`, `.hero__content`, `.hero__plates` (SVG), `.hero__ctas` — reused, not rebuilt.
- No new components. This section is a scale/timing refinement of what's already built.

**2. Required assets**
- No new assets. Existing inline SVG plate geometry (`site/index.html` `.hero__plates` block) is reused; only `viewBox`/sizing constants change.

**3. Animation behavior**
- Existing `plate-in` keyframe animation (opacity + translateX stagger), timing unchanged (80ms/160ms/240ms/320ms/480ms delays).
- Existing scroll-linked parallax (`main.js` `updateParallax`) unchanged in mechanism; only the capped offset/scale may need re-tuning once the plates are visually larger, so the parallax distance still reads as subtle at the new scale.
- Change is **size/viewport footprint only** — `.hero__plates` `width`/`max-width` increase, plate `stroke-width`/thickness proportionally increased. No new animation is introduced.

**4. Desktop behavior**
- Plates visible and animated as described in the storyboard, positioned right-of-content as today, at increased scale (recommend testing 380px → ~480–520px width band, capped by `max-width: 46vw` unchanged so it never overwhelms the text column).

**5. Mobile behavior**
- Unchanged from current: `.hero__plates { display: none }` below 1024px. A text-first mobile hero remains correct — do not attempt to compress the plates into a small mobile hero; storyboard's "spatial dominance" only works at desktop scale.

**6. Performance considerations**
- No new perf cost — same SVG element count, same animation count. Slightly larger rendered SVG has no measurable paint cost (vector, not raster).
- Parallax `requestAnimationFrame` + `passive: true` scroll listener pattern already in place and correct; no change needed.

**7. Accessibility considerations**
- No change to existing correct behavior: `aria-hidden="true"` / `focusable="false"` on the SVG (decorative), full skip under `prefers-reduced-motion: reduce` (both the entrance animation and the parallax) already implemented and should be preserved exactly.

---

## 2 & 3. Project Controls and Intelligence Layer Sections — Shared Component

> **Superseded 2026-08-06:** the earlier version of this spec described two independent SVG components (a "controls panel" for Section 2, a "layer mechanism" for Section 3). Per the approved Project Intelligence Visualization concept, these are now **one shared component** — same markup, same classes, same authoring pattern — rendered twice with a different active state/act per section. Build it once; do not fork it into two files or two class namespaces.

**Concept recap (full definition in `docs/landing-page-storyboard.md` Section 2):** one panel, three stages — fragmented muted-Blue "existing project information" → a convergence/resolution act → a single Teal "clear visibility & decision support" element. Not a dashboard: no UI chrome, no legends/axes/gridlines, no RAG colors, no fabricated metrics, no multiple charts, no hover/tooltip interactivity, no looping.

### 1. Required components
- One new section shell used twice: `.section` (Project Controls) and `.section--alt` or `.section` (Intelligence Layer) — reuse existing section patterns, no new section-level component.
- **One** new visual component: `.intelligence-panel` (suggested class name) — a single self-contained inline SVG, authored with the same flat `<rect>`/`<line>` primitives as `.hero__plates` and `.service-icon`. Used in both sections via the same markup/class structure; only a modifier class (e.g., `.intelligence-panel--resolve` vs. `.intelligence-panel--absorb`) or a data attribute distinguishes which act plays.
- Standard `.eyebrow` / `h2` / `.body` copy blocks in both sections, reusing existing typographic components — no new text component. Intelligence Layer's copy is written to carry both the "AI-Enabled Project Controls" and "AI Adoption Services" framings in one pass (per storyboard's single-pass recommendation).

### 2. Required assets
- One new inline SVG definition (`.intelligence-panel`), reused via a shared partial pattern — since the site has no templating, this means the same SVG markup block is duplicated verbatim into both sections of `index.html` with only its modifier class changed, not two different SVGs authored independently. Composed entirely of `<rect>`/`<line>` primitives — no external image, no illustration file, no photographic mockup, zero new binary assets.
- No new color tokens — reuses `--pmology-color-blue` (Stage 1, muted, multiple opacity steps) and `--site-accent`/Teal (Stage 3, the one resolved element), exactly as the hero plates already do. No RAG/status colors introduced (not approved in the brand system regardless — `dataviz-guidelines.md` Section 6 is proposed, not adopted).

### 3. Animation behavior

**Project Controls section — full three-stage sequence, on scroll-into-view (IntersectionObserver-gated, same pattern as `.reveal`):**
- Stage 1 (at rest on entry): panel shows irregular, muted-Blue marks — varied offsets, slight rotation, uneven spacing.
- Stage 2 (~0–400ms after trigger): marks tighten/converge — CSS `transform: translate()`/`rotate()` transitions on individual SVG child elements, small precise distances only, `cubic-bezier(0.16, 1, 0.3, 1)` easing (matches the site's standardized easing everywhere else).
- Stage 3 (~400–600ms, after Stage 2 settles): the single Teal element fades/scales in last, at rest — no bounce, no overshoot.
- Triggers **once** — no replay on repeated scroll in/out.

**Intelligence Layer section — second act on the same component, on its own scroll-into-view:**
- Panel renders directly in its Stage 3 resting state (no repeat of the Stage 1→3 tightening — already played once in the Project Controls section).
- A small number of short, straight "flow marks" travel in straight lines from the muted-Blue portions toward the Teal element, staggered arrival (same timing family as the hero's `plate-in` stagger), fading out once "absorbed."
- The Teal element responds with a subtle size/weight increase on absorption — explicitly no `box-shadow`/blur/bloom (brand rule D-0004).
- Triggers **once** per scroll-entry — no looping/ambient replay; a looping version reads as a "live" product demo, which the storyboard explicitly rules out.

### 4. Desktop behavior
- Panel sits alongside or below each section's heading/copy in a two-column or stacked layout (defer exact grid split to visual design; either fits the existing 12-col grid). Full sequence/act plays as described in both sections. Panel sized consistently between the two appearances for visual rhythm down the page.

### 5. Mobile behavior
- **Project Controls:** simplify Stage 1's positional offsets (smaller displacement distances) so Stage 2's convergence doesn't feel exaggerated in a narrow viewport. Acceptable mobile simplification: skip Stage 2's positional animation and keep only Stage 3's Teal reveal, if Stage 2 reads as too subtle at small size to justify the cost.
- **Intelligence Layer:** reduce the number of simultaneous flow marks (e.g., 3 instead of 5) to keep the absorption act legible at small size; same rectilinear, no-particle rule.
- Panel stacks full-width below copy in both sections, within `.container` padding.

### 6. Performance considerations
- Pure CSS `transform`/`opacity` transitions on a small number of SVG child elements (~6–10 shapes per section) — negligible cost, same class of work as the existing card-hover-lift. No layout thrashing risk since transforms don't affect document flow.
- Intelligence Layer's staggered flow-mark sequence is marginally more complex than Project Controls' two-stage resolve — still well within a static site's performance budget, but remains the one place a timeline library's staggered-sequencing API might reduce hand-written CSS-delay bookkeeping (see technology matrix below) if the CSS version proves hard to maintain.

### 7. Accessibility considerations
- Entire panel `aria-hidden="true"` in both appearances (decorative reinforcement of copy already present in text, per the same rule already applied to `.hero__plates` and `.service-icon`).
- Full skip under `prefers-reduced-motion: reduce`: Project Controls renders directly in Stage 3 (resolved) with no transition; Intelligence Layer renders directly in the "already absorbed" end state with no flow marks — both matching the site's existing reduced-motion pattern (content is simply there, never permanently hidden).
- No hover states, tooltips, or focus targets on the panel itself in either section — it is not an interactive element and must not present as one.
- Section heading/copy in both sections must independently carry the section's claim in text — the animation reinforces, never carries, the message (already a sitewide practice via the eyebrow/heading/body pattern). Intelligence Layer's copy specifically must carry both the "already inside your controls" and "adoption roadmap destination" framings, since the shared visual's dual meaning depends on copy pairing, not the image alone.

---

## 4. Responsible AI Section

**1. Required components**
- Standard `.section` (or `.section--alt`) with `.eyebrow` / `h2` / `.body` — **no new visual component**, per storyboard's "deliberately quiet" direction.
- A short list of governance principles (transparency, accountability, human oversight — names TBD against approved copy) using a component matching the existing `.theme-item` pattern, not a new one.
- The one permitted micro-interaction reuses the **existing** `.primary-nav a::after` underline-grow mechanic (same pseudo-element/`transform: scaleX()` approach), applied to each principle on hover/focus — not a new interaction pattern.

**2. Required assets**
- None. No SVG, no icon, no illustration — text and existing components only.

**3. Animation behavior**
- Standard `.reveal` fade/rise on section entry (identical to every other non-signature section on the site) — no bespoke entrance animation.
- Hover/focus: underline grows under a governance-principle label using the existing 250ms `cubic-bezier(0.16, 1, 0.3, 1)` transform, exactly matching nav-link behavior.

**4. Desktop behavior**
- Standard section layout, hover-capable underline interaction available on pointer devices.

**5. Mobile behavior**
- Hover has no equivalent on touch — principles simply render as static list items (the underline-on-hover is a bonus desktop affordance, not required for the message to land, consistent with `.mobile-nav a`'s existing touch-appropriate simplification of the same underline idea).

**6. Performance considerations**
- Negligible — this section adds no new animated elements beyond the sitewide `.reveal` pattern already in use on every page.

**7. Accessibility considerations**
- Standard `.reveal` reduced-motion handling (content simply present, no hidden state, already implemented sitewide).
- Underline micro-interaction must be triggerable via `:focus-visible` as well as `:hover` (matching the existing nav-link implementation, which already does this correctly) — keyboard users get the same affordance.
- This section's restraint is itself partly an accessibility good: the least visually busy section on the page, appropriate for content about oversight and governance that a careful reader needs to actually read, not skim past a moving visual.

---

## Technology Decision: CSS vs. SVG/GSAP vs. Static

| Section | Technique | Rationale |
|---|---|---|
| **Hero** | CSS (`@keyframes` + `transition`) + inline SVG, vanilla JS scroll listener for parallax | Already built this way; no reason to change a working, correct, dependency-free implementation. |
| **Project Controls** | CSS `transform`/`opacity` transitions on inline SVG children, triggered via existing `IntersectionObserver` pattern (vanilla JS) | Two-phase sequence is simple enough (≤10 elements, single stagger family) that hand-written CSS delays are not a maintenance burden — matches the site's existing `.reveal--d1..d8` delay-class pattern exactly. |
| **Intelligence Layer** | CSS by default; **GSAP only if** the multi-element staggered "flow marks converging on one target" sequence proves awkward to hand-code with CSS delays alone | This is the one section with real sequencing complexity (multiple elements, staggered arrival, a dependent end-state change on the target element). If build time on the CSS version stretches significantly, this is where a small, purpose-scoped GSAP inclusion (loaded only on the homepage, not sitewide) would pay for itself. Recommend attempting the CSS version first — do not default to adding a new dependency. |
| **Responsible AI** | CSS only (no SVG, no JS beyond the existing `.reveal` observer) | Deliberately the lowest-tech section on the page — this is a design decision, not a shortcut. |

**Recommendation:** build all four sections in CSS + vanilla JS first, matching the existing codebase's zero-dependency philosophy (`main.js`'s own header comment: "minimal, dependency-free JS"). Only introduce GSAP for the Intelligence Layer section, and only if the CSS-based staggered sequence genuinely becomes hard to maintain — evaluate after Project Controls and Intelligence Layer are both built in CSS, not before. This keeps the site's build story simple (still no build step, still no package manager) unless there's a concrete, demonstrated need.

**Nothing on this page should be built as raster image/video** — every visual element (hero plates, the shared Project Intelligence Visualization panel) stays inline SVG using the flat rect/line primitives already established in the codebase, consistent with "no photographic dashboard mockup" and the brand's monochrome-first, gradient-free logo/icon constraints.

---

## Cross-Section Build Sequencing (suggested order)

1. **Project Controls** — highest content-credibility payoff, simplest animation (single before/after resolve), no new dependency risk. Build first to establish the shared `.intelligence-panel` SVG authoring pattern that the Intelligence Layer section will reuse.
2. **Intelligence Layer** — reuses/extends the Project Controls panel's authoring approach and the hero's plate geometry; build second so both reference patterns already exist.
3. **Responsible AI** — lowest engineering cost (existing components only); can be built any time, including last, as a fast finish.
4. **Hero refinement** — smallest change (scale/timing tuning of existing code); can happen in parallel with any of the above since it touches only `index.html`'s existing plate markup.

This order front-loads the two sections that carry the most positioning weight (project controls credibility, then the AI differentiator) and treats the hero and Responsible AI sections — both largely reuse of existing patterns — as lower-risk, flexible-timing work.
