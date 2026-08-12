# PMOlogy Landing Page Storyboard

> Design/UX storyboard only — no code. Built from the brand-alignment review and the Wealthsimple UX critique in this thread. Governs the homepage narrative arc: Hero → Project Controls → Intelligence Layer → Responsible AI → (existing CTA close).
>
> Guardrails carried through every section: enterprise, trustworthy, intelligent, consulting-oriented. No generic AI-startup visuals, no futuristic effects without meaning, no animation that isn't explanatory.

---

## 1. Hero Section

**Headline/message**
Retain the existing positioning-derived line — *"A smarter intelligence layer for project delivery."* — with the existing eyebrow ("Visibility · Intelligence · Delivery") above it and the existing supporting sentence below. No new copy invented; this is a refinement of what's already approved and on-brand, not a rewrite.

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
| — | *(existing)* CTA | Action | Unchanged — "Contact Us" / "About PMOlogy" |

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
