# PMOlogy Landing Page Storyboard

> Design/UX storyboard only — no code. Built from the brand-alignment review and the Wealthsimple UX critique in this thread. Governs the homepage narrative arc: Hero → Project Controls → Intelligence Layer → Responsible AI → (existing CTA close).
>
> Guardrails carried through every section: enterprise, trustworthy, intelligent, consulting-oriented. No generic AI-startup visuals, no futuristic effects without meaning, no animation that isn't explanatory.

---

## 1. Hero Section

**Headline/message**
Positioning-derived line: *"A layer of intelligence for project delivery."*, with the existing eyebrow ("Visibility · Intelligence · Delivery") above it and an outcome-led supporting sentence below (data connected, manual work reduced, better-informed decisions, built on existing tools). Kept close to the approved positioning language.

> Updated 2026-09-07: hero copy reworded (headline and supporting paragraph); see `writing-guidelines.md`. The visual/animation notes below still describe the earlier SVG-plate hero and are stale relative to the shipped video hero.

**Visual composition**
The layered plates remain the entire visual language of the hero — four muted Blue plates (existing systems) stacked beneath one Teal plate (the added intelligence layer), offset further out and thicker than the rest. Scaled up from its current corner-accent treatment to a more spatially dominant presence — still not full-bleed or literal, but large enough that it reads as the room the headline stands in, not a decoration beside it. Headline and supporting copy stay left-aligned in the current `hero__content` column; plates occupy the right/negative space, exactly as today — the change is scale and confidence, not composition.

**Animation sequence (first 5 seconds)**
1. **0.0–0.3s:** Page loads with headline, eyebrow, and CTAs already in place (no fade-in on text — text should never feel like it's "arriving," per the existing reduced-motion-first principle).
2. **0.3–1.0s:** Bottom plate (muted, most "existing/legacy") slides in from the right, settles.
3. **1.0–1.7s:** Second and third plates follow in quick succession, each slightly less muted than the last — a visual sense of "layers of existing systems" accumulating.
4. **1.7–2.4s:** Fourth plate arrives, most opaque of the muted set.
5. **2.4–3.2s:** Teal plate arrives last, travels the furthest distance, settles thicker and further offset than the rest — the visual "add" moment.
6. **3.2s onward:** Everything at rest. A very slow (imperceptible-as-motion, felt-as-presence) scroll-linked parallax begins only once the user scrolls — the layers drift at a different rate than the text, reinforcing depth without ever feeling like a gimmick.

This is the existing animation, described precisely — the recommendation is to keep its timing and sequencing exactly as built, only increasing scale/presence.

**What the user understands immediately**
Within three seconds, without reading a word: *this company adds one deliberate, high-value layer on top of systems that already exist — it does not rip and replace.* That is the entire positioning statement, delivered visually before the headline is even parsed.

**User perception:** Calm, deliberate, structured — motion that feels engineered, not decorative.
**Purpose:** Establish the core mechanism of the business in the first three seconds, before any copy is read.
**Why it supports positioning:** It is the single visual expression of "adds an intelligence layer to existing tools and processes... targeted improvements rather than wholesale system replacement" — the positioning statement's exact language, translated into structure rather than illustration, exactly as `brand-discovery.md` prescribes ("intelligence expressed through... elegant structure... never through obvious AI or technology symbolism").

---

## 2. Project Controls Section

> **Superseded 2026-08-06:** the "controls panel" described in the original pass of this storyboard and the "layer mechanism" described in the original Section 3 are replaced by **one shared component** — the **Project Intelligence Visualization** — defined once below and reused, in two different states, across this section and Section 3. This is a locked decision from a dedicated concept-review pass; do not reintroduce two separate visual systems.

### The Project Intelligence Visualization (shared component — defines the visual grammar for both this section and Section 3)

**What it is not:** a product dashboard. No UI chrome (no window frame, no browser bar, no tabs, no filters, no dropdowns), no legends, no axes, no gridlines, no RAG/status colors (not approved in the brand system regardless), no fabricated metrics or invented percentages, no live/looping "real-time data" behavior, no multiple simultaneous charts. It must be legible as a concept in under two seconds, the same way the hero plates are — not studied like a report.

**What it is:** a single visual panel illustrating one idea in three stages, left to right or top to bottom (exact orientation is a build-time layout decision, not fixed here):

```
Existing project information          PMOlogy intelligence layer          Clear visibility & decision support
(schedule, cost, risk, progress)              ↓                                         ↓
     — fragmented, muted Blue —      — resolution/transformation —          — one precise Teal signal —
```

- **Stage 1 — Existing project information:** a small cluster of flat geometric bars/marks (same `<rect>` primitives as the hero plates and service icons), irregular in length/alignment/spacing, all in muted Blue at varying opacity — exactly the depth-cue language already used by `.hero__plates`. This stage gestures at the *range* of existing project information (schedule, cost, risk, progress) without breaking it into four separately labeled mini-charts — one undifferentiated fragmented cluster, not a four-panel dashboard. No labels, no numbers.
- **Stage 2 — PMOlogy intelligence layer:** the transformation itself — the fragmented Stage 1 marks tighten, align, and converge toward a single point, exactly as elements move a small precise distance rather than flying in from off-screen. This stage is process, not a third static object — there is no separate visual "layer" icon sitting in the middle; the layer is *what happens* to Stage 1 on its way to Stage 3.
- **Stage 3 — Clear visibility & decision support:** one single resolved element, in Teal, full opacity — the only accent color anywhere in the panel, arriving last, after everything else has settled. No numeral is required and none should be invented; if a numeral appears at all it must not read as a plausible real metric (per the sitewide rule against fabricated proof points) — position, alignment, and color alone should carry the meaning, the same way the hero plates communicate with zero numbers.

**Maximum three concepts shown** means these three *stages* — not three data types layered into the panel. Schedule/cost/risk/progress remain undifferentiated within Stage 1.

**How to avoid generic AI/dashboard visuals**
- No particles, nodes, connecting lines, or "neural network" dot-and-line patterns for the Stage 1→2→3 convergence — motion must be rectilinear (straight-line translation/alignment of existing rect shapes), never organic or particle-based.
- No glow, bloom, or gradient on the Teal element (binding brand constraint, D-0004).
- No RAG color at any stage, including Stage 1's "fragmented" state — disorder is communicated through misalignment and muted opacity, never through a red/amber warning hue.
- No hover states, tooltips, or cursor affordances of any kind — this must not invite interaction the way a real dashboard would; `aria-hidden="true"` throughout, decorative only.
- Scale stays deliberately smaller/quieter than the hero plates — this is a supporting demonstration, not a second signature moment; the hero keeps sole ownership of the page's one big visual gesture.

---

### This section's use of the shared panel

**Visual concept:** the panel plays its full three-stage sequence once, on scroll-entry — Stage 1 (fragmented) → Stage 2 (converging) → Stage 3 (single Teal signal) — exactly as defined above.

**Before/after transformation:** Stage 1 is the "before" (irregular, muted, inconsistent — reads as fragmented/manual without a caption). Stage 3 is the "after" (aligned, singular, precise). Stage 2 is the transformation itself, not a separate held state.

**What elements appear**
1. The Stage 1 cluster of muted, irregular bars/marks (existing project information, undifferentiated).
2. Stage 2's convergence — the same elements tightening and moving toward one point.
3. The single Stage 3 Teal element — the only accent color in the section, appearing last, after everything else has resolved.

**Business message it communicates**
"We bring order to what's already there before we bring anything new." The Teal element appearing last — and being the *only* new thing added — visually enforces "improve before replacing": the existing data isn't discarded or replaced, it's tightened, and one small intelligent addition is layered on top once the fundamentals are in order.

**User perception:** This is a firm that understands project controls at a working level — not just a firm that talks about AI.
**Purpose:** Directly close the credibility gap identified earlier (PMO Consulting currently reads as the thinnest, least-substantiated page on the site).
**Why it supports positioning:** Project controls expertise is asserted in copy everywhere on the current site but never demonstrated. This is the one section whose entire job is to *show* competence rather than *state* it, which is what distinguishes PMOlogy from "generic AI consultancy" language.

---

## 3. Intelligence Layer Section

**How the existing plates/layer concept evolves**
This section does **not** introduce a second visual system. It reuses the exact same Project Intelligence Visualization panel defined in Section 2, reappearing already at rest in its Stage 3 state (no repeat of the Stage 1→3 tightening animation — that already played once, and re-running it here would be padding, not storytelling). What's new in this section is a second, smaller act layered on top of that resting state: a small number of short, straight marks travel from the panel's muted Blue portions toward the Teal Stage-3 element and fade on arrival, and the Teal element responds with a subtle size/weight increase (never a glow or bloom) once absorption completes. This is the same "existing information → intelligence layer → clear signal" idea, shown a second time as a live mechanism rather than a one-time resolution — one panel, two acts, not two panels.

**How it communicates AI-enabled controls and AI adoption simultaneously**
Rather than building two separate animated concepts for two separate service pages (AI-Enabled Project Controls and AI Adoption Services — a duplication flagged as a risk in the prior critique), this single visualization carries both messages through copy pairing, not through two different animations:
- Paired with "AI-Enabled Project Controls" copy, the visual reads as: *this is already happening inside your existing controls.*
- Paired with "AI Adoption Services" copy (and linking through to the existing 8-stage process list on that service page), the same visual reads as: *this is the destination the adoption roadmap leads to.*

One idea, two framings, zero redundant engineering — consistent with the "spend your boldness once" discipline already established in the codebase, and now made explicit at the component level, not just the messaging level: **Section 2 and Section 3 render the identical panel component**, differing only in which stage/act is active when the section is built, not in shape, color, or authoring pattern.

**How to avoid generic AI visuals**
- No particles, nodes, connecting lines, or "neural network" dot-and-line patterns — the single most common way this kind of section drifts into generic-AI-startup territory. The "flow marks" here are short straight-line segments only, matching the panel's existing rect/line primitives.
- No glow, bloom, or gradient on the Teal element (already a binding constraint, D-0004, from the brand system).
- Motion should be *rectilinear* — plates and bars sliding, resizing, or aligning along straight axes — never organic, particle-based, or physics-simulated motion, which reads as "tech demo" rather than "enterprise software."
- The transformation should resolve to a *precise, quiet* end state, not a dramatic one — the payoff is clarity, not spectacle.
- No looping/auto-cycling — the absorption act runs once per scroll-entry, exactly like Section 2's sequence, never repeating or simulating "live" data.

**User perception:** This is a controlled, engineered capability — not an experimental one.
**Purpose:** Visualize the brand's single biggest differentiator (the intelligence layer) once, well, and let two service pages borrow its meaning rather than each inventing their own.
**Why it supports positioning:** This is the direct visual expression of "PMOlogy is not an AI software company... it enhances organizational capability through intelligence, automation, and responsible AI adoption" — mechanism and restraint communicated together, using one visual system rather than two.

---

## 4. Responsible AI Section

> **Copy revised 2026-09-07.** Approved wording is in `homepage-copy.md`
> (Section 3): eyebrow "Responsible AI", heading "Practical AI, tailored to your
> processes.", two introductory paragraphs, then three principle columns
> (Transparency, Accountability, Human oversight) with revised descriptions. It
> supersedes "Applied thoughtfully, governed carefully." and the old principle
> text. The section now frames AI across the client's core delivery and
> supporting business processes. Layout intent: text-led, heading and intro
> above three equal columns that stack on mobile, no image and no animation.
> The visual-restraint guardrails below still stand.

**Recommended static/interaction approach**
Deliberately the quietest section on the page — no scroll-triggered motion, no resolving animation, no new visual system introduced. Content presented in the site's existing typographic pattern (eyebrow + heading + body, as already used across interior pages), on a plain Slate/Ink surface with no plate or bar imagery at all.

The one interaction permitted: a small, optional hover/focus-reveal on a short set of governance principles (e.g., transparency, accountability, human oversight) — text that's present by default but gains a subtle underline or Teal marker on interaction, using the exact same underline mechanic already built for primary nav links. No new component, no new motion language — reuses what exists, at the smallest possible scale.

**User perception:** This section feels different in *kind* from the ones before it — calmer, more textual, more like reading a governance statement than watching a product demo.
**Purpose:** Let the absence of spectacle be the message. A section about oversight and responsible use that itself used aggressive motion or a data-visualization flourish would undercut its own claim.
**Why it supports positioning:** Directly reflects `brand-voice.md`'s explicit instruction that "responsible innovation... [is] never a headline gimmick," and the audience-concerns list in `brand-discovery.md` (data security, disruption, opaque technology) — the section earns trust by demonstrating restraint rather than asserting responsibility in louder terms.

---

## Section Sequence Rationale (ties back to the funnel)

| Order | Section | Funnel stage | Why here |
|---|---|---|---|
| 1 | Hero | Awareness | States the core mechanism visually before any copy is read |
| 2 | Project Controls | Understanding + Trust | Closes the credibility gap first — expertise before technology |
| 3 | Intelligence Layer | Understanding + Differentiation | Once controls credibility is established, introduce what makes PMOlogy different |
| 4 | Responsible AI | Trust | Addresses the audience's stated risk concerns right before the existing CTA close |
| — | Closing invitation | Action | Revised and approved 2026-09-07: heading "Where could your processes work better?", one button "Let's talk" to /contact/, secondary "About PMOlogy" button removed. See `homepage-copy.md` Section 5. |

This ordering deliberately puts expertise *before* AI differentiation — the opposite of how the current site's information architecture reads today (AI Adoption is currently the most fully-built service page; PMO Consulting the thinnest) — correcting the imbalance flagged in the brand-alignment review while keeping the existing hero and CTA structure untouched.

---

## What this storyboard deliberately excludes

Carried forward from the prior critique, so implementation doesn't quietly reintroduce them:
- No second appearance of the hero plates later in the page as a "spatial anchor" — contradicts the site's own "spend boldness once" principle.
- No step-by-step scroll-choreographed animation of the AI Adoption 8-stage list — the existing simple stagger-reveal is sufficient.
- No particle/node/connecting-line visuals anywhere, including the Intelligence Layer section.
- No new color, gradient, glow, or shape language beyond what's already approved (Ink/Slate/Paper/Teal/Blue, flat geometric bars).
- No animation on the Responsible AI section beyond the existing reveal pattern plus one micro-interaction.

**Locked with the Project Intelligence Visualization concept (2026-08-06):**
- **No two separate visual systems** for Project Controls and Intelligence Layer — one shared panel component, reused at different stages/acts, per Section 2/3 above.
- **No product-dashboard treatment anywhere:** no UI chrome, no window/browser frame, no tabs, no filters, no dropdowns, no legends, no axes, no gridlines.
- **No RAG/status colors** in either section — not approved in the brand system (`dataviz-guidelines.md` Section 6 is proposed, not adopted), and the fastest route to a generic-analytics-tool read regardless of approval status.
- **No fabricated metrics or invented numerals** — if a number appears at all, it must not resemble a real, plausible statistic; position/alignment/color should carry the meaning instead, consistent with the sitewide rule against invented proof points (`messaging-framework.md` Section 5/11).
- **No multiple simultaneous charts** ("sparkline soup") — one panel, one three-stage idea, not a grid of mini-visualizations.
- **No hover states, tooltips, or interactive affordances** on the panel in either section — fully decorative, `aria-hidden="true"`, never inviting the click-to-explore behavior of a real product.
- **No live/looping "real-time" behavior** — both the Section 2 resolution and the Section 3 absorption act run once per scroll-entry, never cycling or auto-updating.

---

## Amendment — 2026-09-07 (service model + sequence)

Supersedes the "Section Sequence Rationale" table above for section **order**;
the per-section design guardrails (visual grammar, no-particle / no-glow / no-RAG,
one shared panel component, reduced-motion behavior) all still stand.

**Service model changed from two services to three** — see
`docs/service-architecture.md`. The homepage now leads, after the hero, with
**"The Intelligence Layer" as a value statement / mindset section** (not a product
demo), followed by the three services as concrete pillars in narrative order:

1. Hero — unchanged.
2. **The Intelligence Layer** — the positioning: domain knowledge + AI adds a
   thin, additive layer on existing systems; small targeted changes, no
   rip-and-replace, no large cost. This is the old "Intelligence Layer section"
   promoted to lead and reframed as philosophy rather than mechanism.
3. **Project Controls** (service 1) — the foundation; still carries the "we know
   this domain at a working level" credibility the original storyboard put first.
4. **Project Data Integration** (service 2) — connect fragmented existing project
   data into one flow; reporting/dashboarding + data-collection automation live
   here now.
5. **AI Adoption in Project Delivery** (service 3) — AI/analytics applied on top.
6. Responsible AI — copy revised and approved 2026-09-07 (see follow-up below);
   still the quietest section in treatment.
7. Closing invitation — copy revised and approved 2026-09-07: single "Let's talk"
   button to /contact/, "About PMOlogy" button removed, quiet background. See
   `homepage-copy.md` Section 5.

> **Superseded in part by the 2026-09-07 positioning-clarification follow-up
> below.** Items 2 to 5 above ("The Intelligence Layer" as a value section, then
> the services as a single pillar block in narrative order) are now the two
> distinct sections "Our approach" and "Our expertise"; service 2 is named
> "Data Integration" with a broader scope. Kept above as history.

The original rationale ("expertise before AI differentiation") is preserved:
Project Controls is still the first *pillar*, immediately under the value
statement. What moved is that the value statement itself now opens the page.

The shared **Project Intelligence Visualization** panel still applies to Project
Controls and to the Intelligence Layer / Project Data Integration material —
one component, reused at different stages, exactly as locked 2026-08-06.

### Follow-up — 2026-09-07 (positioning clarification)

Owner-approved clarification, recorded in full in `service-architecture.md`.
Affects wording only; the visual grammar and animation guardrails still stand.

- **Two sections, not one block** (approved 2026-09-07, supersedes item 4 of
  the Amendment above). The post-hero introduction and the service columns are
  now visually distinct sections:
  - **Section 1 "Our approach"** — a spacious, text-led, boxed section with only
    the introduction: eyebrow "Our approach", heading "More value from the tools
    and processes you already use", two paragraphs. Frames how PMOlogy works
    (understand the client's delivery processes, tools, information and people;
    identify with the team where work slows, information disconnects, or
    visibility is missing; then prioritize improvements by likely value, effort,
    and team need, across project controls, data integration, and AI).
  - **Section 2 "Our expertise"** — heading "Three connected areas of
    expertise", then three **equal-width columns** (equal visual weight, stacked
    on mobile) placed **outside** the Section 1 box. Each column: title,
    description, service link. Whitespace or a subtle divider between columns,
    minimal decoration. No larger standalone box for Project Controls; no
    arrows, step numbers, or sequence cues.
  - Approved copy and link destinations for both sections are recorded verbatim
    in `homepage-copy.md`.
  - The earlier draft intro that spelled out "approach not a product" and "not
    sequential stages" on the page is superseded; those remain internal
    decisions below and in `service-architecture.md`.
- **Service 2 renamed** to **"Data Integration"** (was "Project Data
  Integration"), scope broadened to business and delivery data across existing
  systems plus the data architecture behind operations. See
  `service-architecture.md` ("Rename and scope: Data Integration"). The detail
  URL `/services/project-data-integration/` is retained pending a separate
  migration decision.
- "A layer of intelligence" is the overall promise only. Never a fourth
  service, a product, or a synonym for Data Integration.
- Homepage Sections 1 to 5 are **implemented and live** on pmology.ca as of
  2026-09-07 (theme `1.4.0`), owner-authorized. Verbatim copy in
  `homepage-copy.md`. Portfolio strip and footer tagline were out of scope and
  are unchanged; the `/services/` pages remain a separate review.
- The three services are distinct and complementary, each with standalone value.
  Project Controls is not merely data-prep for the others; AI Adoption is not a
  required destination. The "fragmented → connected → intelligent" panel is a
  visual metaphor, not a client journey or a required sequence.
- Conventional project-controls forecasting is standard controls work; only
  AI-assisted forecasting belongs under AI Adoption, as an option.
- **Responsible AI section (approved 2026-09-07).** New heading "Practical AI,
  tailored to your processes.", revised intro and three principle descriptions,
  all recorded verbatim in `homepage-copy.md` (Section 3). Supersedes "Applied
  thoughtfully, governed carefully." The section frames AI across the client's
  core delivery and supporting business processes; it does not rename or
  re-scope the AI Adoption service. Text-led, no image or animation; three
  equal columns that stack on mobile. See Section 4 above.
- **About PMOlogy and How we work boxes (approved 2026-09-07).** Two adjacent
  boxes, equal weight on desktop, stacked on mobile with About first. "How we
  work" is the former "Approach" box, re-eyebrowed; four stage titles preserved;
  "with low cost and minimal disruption" is owner-approved positioning scoped to
  that box. Verbatim copy in `homepage-copy.md` (Section 4).
- **Closing invitation (approved 2026-09-07).** Heading "Where could your
  processes work better?", one description line, a single button "Let's talk" to
  /contact/. Supersedes "Let's talk about where an intelligence layer fits.",
  its pull-quote, and the two-button layout; the "About PMOlogy" button is
  removed. Quiet background. Verbatim copy in `homepage-copy.md` (Section 5).

---

## Amendment — 2026-09-07 (site footer)

Owner-approved, **not yet implemented** — the live footer is unchanged until a
separate footer implementation request. Verbatim link text, destinations, and
the logo / tagline decision are in `homepage-copy.md` Section 6; this entry
holds the layout and alignment intent.

**Structure (unchanged in kind).** A dark (Ink) full-width anchor band closing
every page: a brand + tagline block, then two link columns ("Explore",
"Connect"), then a bottom row (Privacy Policy, Terms, automatic-year copyright).
Three balanced columns on desktop, single-column stack on mobile.

**Brand mark.** The plain-text "PMOlogy" is replaced by the approved reversed /
Paper-text logo (`assets/svg/logo-reversed.svg`), linked to the homepage,
proportions locked (height constrained, width auto), accessible name "PMOlogy".
The tagline becomes the approved hero line, "A layer of intelligence for project
delivery."

**Alignment correction (the reason this is a layout amendment).**

The footer wraps its content in `.container` — `max-width: 1280px`,
`margin-inline: auto`, `padding-inline: var(--space-3)` (24px). The homepage
rounded-box system does not use `.container`; every section box and boxless
section is positioned by:

- **outer boundary:** `margin-inline: clamp(12px, 3vw, 36px)`
  (`.pm-page > .box`, `.pm-inner`), with no `max-width` cap — the boxes are
  fluid, a small even gutter in from the viewport edge;
- **inner padding:** `clamp(24px, 4vw, 52px)` (`.box` padding, and
  `.pm-inner > section:not(.box):not(.pm-dual)` `padding-inline`).

So on wide viewports the footer content is capped at 1280px and centred while
the section boxes run much wider, and the footer's fixed 24px inner pad does not
match the boxes' fluid inner pad — the footer text column and the section-box
text column do not line up.

**Approved fix.**

1. Replace the footer's `.container` wrapper with a wrapper whose outer edges use
   `margin-inline: clamp(12px, 3vw, 36px)` and **no** `max-width`, so the footer
   content's left and right edges fall on the same vertical lines as the
   section-box outer edges.
2. Give the footer columns grid and the bottom row the section-box inner
   padding, `padding-inline: clamp(24px, 4vw, 52px)` — applying it once on the
   new wrapper covers both rows — so the footer columns and the bottom row align
   with boxed-section text.
3. Keep `.site-footer`'s dark background **full-width**; only the inner wrapper
   takes the gutter.
4. Reuse the two existing `clamp()` values verbatim — they are the site's
   established tokens for this system, and they already scale across desktop,
   tablet, and mobile, so alignment holds at every width with no new
   breakpoints.
5. Keep the existing responsive column behaviour: three balanced columns
   (`.site-footer__grid` `grid-template-columns: 2fr 1fr 1fr`) at >=768px,
   single-column stack below.

**Implementation touches both menu sources.** The WordPress `footer` and
`connect` menu locations **and** the hard-coded fallback `<ul>`s in `footer.php`
must be updated together so they cannot drift. Portfolio stays removed from both
(theme `1.4.7`).

---

## Amendment — 2026-09-07 (Section 2 icons)

Owner-approved (via a preview review), **prepared locally, not yet published**.
Replaces the three flat-bar `.svc-figure` illustrations in Section 2 "Three
connected areas of expertise" (`front-page.php`, `#expertise`) with three
distinct line icons.

**Scoped override.** This section's earlier figures were built to the storyboard
lock "No new ... shape language beyond ... flat geometric bars" and "No
particle/node/connecting-line visuals anywhere" (see "What this storyboard
deliberately excludes"), and to D-0004. The owner has approved an **override
scoped to Section 2 only**: line icons are allowed here, and the Data
Integration icon may use short connecting segments. D-0004 itself is
**unchanged** and still honoured — the icons are flat, with no gradient, glow,
bloom, blur, background box, or animation. Everywhere else on the page the
"flat bars only / no connecting lines" lock still stands; do not generalise this
to the hero, the shared Project Intelligence Visualization panel, or any other
section.

**The three icons** (inline SVG in `front-page.php`, `viewBox="0 0 48 48"`,
rendered at 44px):

- **Project Controls** — three horizontal adjustment sliders (three tracks, a
  knob on each), the middle knob the Teal accent.
- **Data Integration** — three branches on the left joining a single central
  connection node on the right; the node is the Teal accent.
- **AI Adoption in Project Delivery** — a microchip (body plus edge pins) with a
  small Teal checkmark inside.

**Shared style.** Navy (`#003DA5`) outline, `stroke-width` 2.5, round caps; one
restrained Teal (`#14B8A6`) accent element per icon; no fills other than the
Paper knob centres and the Teal accent. Equal visual weight, left-aligned
directly above each `<h3>`, sitting under the existing Teal top-rule. Decorative
only: `aria-hidden="true"` on both the `.svc-figure` wrapper and the `<svg>`,
since each heading already names the service.

**CSS.** New `.svc-figure--icon` modifier in `styles.css` next to `.svc-figure`
— constrains the icon to 44px and sets the spacing below it to `--space-3`.
Nothing else in the section changes: copy, links, column widths
(`.layer-stages` `repeat(3, 1fr)` at >=768px, single column below), and
responsive behaviour are all preserved; only the icon's own spacing was
touched.

**Existing icon library.** `assets/svg/service-icon-*.svg` were not reused —
they are bar-based and do not match the slider / branch / microchip set. New
lightweight inline SVGs were authored instead, at matching proportions and
stroke weight.

**Live since theme `1.4.8` (2026-09-07).** Deployed to pmology.ca via the
Novamira filesystem abilities; the branch `hero-video-background` copy is the
source of truth. `front-page.php` inline SVG + `.svc-figure--icon` in
`styles.css`.

---

## Amendment — 2026-09-07 (Responsible AI framing)

Owner-approved (via a preview review), **prepared locally, not yet published**.

**Problem.** On the rounded-box page, Section 2 ("Three connected areas of
expertise") and Section 3 ("Responsible AI") both sat in bare `.pm-inner`
wrappers with no background, border, or corner radius. Between the boxed
sections above and below, they read as loose paragraphs rather than framed
sections.

**Decision.**

- **Section 2 stays unboxed** — owner decision, unchanged. It remains the
  lighter breather between the "Our approach" box and the Responsible AI box.
- **Section 3 "Responsible AI" is now framed** as a rounded box on the brand's
  **dark Ink trust surface** (`.box.box--dark.box--responsible` in
  `front-page.php`; `.box--responsible` block in `styles.css`). This is
  consistent with — not a departure from — this storyboard's own Responsible AI
  guardrail in Section 4 above ("a plain Slate/Ink surface with no plate or bar
  imagery at all"). It reads as a considered governance / trust statement, which
  is the section's stated job ("let the absence of spectacle be the message").

**Treatment (all within existing tokens, no new language).**

- Flat Ink fill from `.box--dark`. No gradient, glow, bloom, blur, image, or
  motion — D-0004 stands.
- One restrained Teal top-rule (`border-top: 3px solid var(--site-accent)`) —
  the same 3px accent idiom `.box--wash-blue` / `.box--wash-teal` already use —
  plus a `--dark-border` hairline on the other three sides.
- Body copy (`.text-secondary`) and the `.principle-rule` hairline switch to the
  dark-kit neutrals (`--dark-text-2`, `--dark-border`) so they stay legible on
  Ink. Headings, eyebrows, and the three principle columns are already handled
  by `.box--dark`.
- Outer edges align with every other box: the box sits in `.pm-inner`, whose
  `margin-inline` gutter equals `.pm-page > .box`'s. Three equal columns on
  desktop, stacked on mobile — unchanged.
- The old inline `style="padding-block: var(--space-2)"` is dropped; the section
  now takes the standard `.box` padding.

**Copy unchanged.** All Section 3 wording in `homepage-copy.md` is untouched.

**Live since theme `1.4.8` (2026-09-07).** Deployed to pmology.ca via the
Novamira filesystem abilities; the branch `hero-video-background` copy is the
source of truth. `front-page.php` section classes + `.box--responsible` in
`styles.css`. Local rhythm reference kept at
`scratchpad/expertise-preview/rhythm.html` (Sections 1 to 4 together).
