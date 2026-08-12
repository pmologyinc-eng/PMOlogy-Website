# PMOlogy — Design System: Hybrid Direction

> Formalizes the approved hybrid visual direction (Direction 03's dark foundation, disciplined by Direction 01's consulting restraint — see the two visual-direction artifacts referenced in this session) into a stable specification. This document is the reference other implementation work should check against; it does not itself change any file in `site/`.
>
> **Status markers used throughout:** `[BUILT]` — already implemented in `site/css/styles.css` / `site/index.html` exactly as described. `[PROPOSED]` — part of the hybrid direction, not yet in the codebase. This distinction matters: this document is both a record of what's already correct and a checklist of what remains.

---

## 1. Color roles

Five confirmed brand hex values remain the only colors in use. Nothing below introduces a new hue — `Structural Surface` is a documented tint of an already-approved hex, following the exact precedent already set by `--site-text-secondary` in the current stylesheet.

### Ink `#0F172A` — the foundation

- **Purpose:** the page's default surface. Establishes the dark, sophisticated register the whole direction is built on.
- **Where it appears:** default page background, primary text color when a surface flips light (see Paper below), the deepest layer of every section unless a section is deliberately using an alternate surface.
- **Where it should not appear:** never as a small accent or highlight — Ink is a field color, not a mark. Never as text on Slate or Structural Surface (insufficient differentiation from the surface itself); Paper carries text on dark surfaces.
- **Status:** `[BUILT]` — unchanged from the current implementation.

### Slate `#1E293B` — neutral surface

- **Purpose:** the default alternate/structural surface for cards, alt-background sections, and borders-adjacent neutral chrome that isn't specifically "existing-systems" content.
- **Where it appears:** `.section--alt` backgrounds, `.card` backgrounds, footer background.
- **Where it should not appear:** as the surface for content specifically describing schedules/cost/risk/existing project systems — that content gets Structural Surface instead (below), not generic Slate, so the "existing systems" idea has a visually distinct home.
- **Status:** `[BUILT]`.

### Structural Blue `#003DA5` — "what already exists"

- **Purpose:** the color of existing systems, prior state, the "before" half of every transformation. Never text — Blue fails contrast on dark surfaces (~1.9:1, per `color-system.md` Section 3) and stays a graphic/shape-only color, exactly as the brand system already restricts it.
- **Where it appears:** the hero plates (muted layers), the intelligence panels' muted marks, service icon bars, and any future large flat shape representing "the existing systems PMOlogy improves rather than replaces." Opacity floor `[BUILT]` raised to 0.5 minimum (was as low as 0.3) so it reads as a legible second hue rather than crushing toward Ink at low opacity.
- **Where it should not appear:** as text or fine UI detail on any dark surface (binding accessibility rule, not a style preference). As a CTA or link color anywhere — that's Teal's role, never Blue's.
- **Status:** `[BUILT]` (opacity floor). `[PROPOSED]`: extending Blue's structural role via the new Structural Surface tint below, and more consistently reserving Blue exclusively for "existing/prior state" content rather than general decoration.

### Structural Surface `#101B36` — Blue-tinted dark surface `[PROPOSED]`

- **Purpose:** a derived tone — Ink blended toward Blue — giving Blue a genuine environmental presence in specific contexts without making it the page-wide background (that was Direction 02's move, not adopted). Not a new hue; a documented tint of the approved `#003DA5`, same justification precedent already used for `--site-text-secondary`.
- **Where it appears:** the background of any panel or card whose content is specifically about existing/prior-state systems — e.g., the Project Controls panel's "before" context, a future "what you already have" callout. Used selectively, not as a general alt-background.
- **Where it should not appear:** as a sitewide replacement for Slate. If every card started using this tone, it would stop signaling "existing systems" and become wallpaper — the entire point is that it's rare and specific.
- **Status:** `[PROPOSED]` — not yet in `styles.css`. When implemented: `--structural-surface: #101B36;`.

### Intelligence Teal `#14B8A6` — activation, singular

- **Purpose:** the one color that means "PMOlogy added this." Reserved for CTAs, links, focus rings, and the specific moment a transformation resolves (the panels' signal element, the hero's fifth plate). Never used to decorate something that isn't interactive or isn't the literal payoff of a transformation.
- **Where it appears:** `.btn--primary`, links, focus outlines, `.hero__plates .plate--5`, `.intelligence-panel__signal`, `.intelligence-panel__decision-mark`, the header's hairline accent border.
- **Where it should not appear:** as a field/background color anywhere (it reads as a startup accent at scale, not a precision mark). On static, non-interactive labels — `.eyebrow` stays neutral specifically so Teal keeps meaning "you can act on this."
- **Status:** `[BUILT]`, discipline already correctly enforced sitewide.

### Paper `#F8FAFC` — text, and a strategic clarity surface

- **Purpose:** two distinct jobs, not one. First, unchanged: primary text color on every dark surface. Second, new: a rare literal *surface* — the one place the page turns bright — reserved specifically for the exact moment fragmented information becomes a clear, decision-ready signal.
- **Where it appears (text role):** `--site-text`, unchanged, everywhere. **Where it appears (surface role, `[PROPOSED]`):** a small, deliberate card/callout at a true "clarity" moment — e.g., a resolved-insight callout inside or immediately after the Intelligence Layer panel. Ink text sits on Paper in this one context (inverted from the page default).
- **Where it should not appear (surface role):** anywhere routine. If Paper-as-surface shows up more than once or twice on a page, it has stopped being a deliberate rupture and become a second background system — that would undermine the entire idea. This is the most rationed color decision in the whole system.
- **Status:** text role `[BUILT]`. Surface role `[PROPOSED]` — no implementation yet; treat any future use as a single, carefully chosen moment, not a component to be reused freely.

### Supporting neutrals

| Token | Value | Purpose | Status |
|---|---|---|---|
| `--site-text-secondary` | `#B9C3D4` | De-emphasized text on dark surfaces | `[BUILT]` |
| `--site-border` | `#2C3A50` | Dividers, card borders, hairline rules | `[BUILT]` |
| Header hairline | `rgba(20,184,166,0.35)` | Teal-tinted border, low alpha | `[BUILT]` |

---

## 2. Typography roles

Typeface family is locked (`docs/decisions/decision-log.md` D-0003 in the brand workspace) — IBM Plex Sans / IBM Plex Mono, not open for reconsideration by this document. Everything below is about role and restraint, not a new family.

### Hero / display

- **Role:** the single loudest typographic moment on the site — one headline, one page.
- **Spec `[BUILT]`:** `.display`, 56px, **weight 700 (Bold)** — the only element on the entire site permitted this weight. Letter-spacing -0.02em.
- **Rule:** Bold stays exclusive to this role. If a future page wants emphasis elsewhere, reach for scale or the editorial-italic treatment (below) before reaching for Bold again.

### Section headings

- **Role:** H1–H3 structure every page's hierarchy; H4 leads card/panel-level titles.
- **Spec `[BUILT]`:** H1 40px/600, H2 32px/600, H3 24px/600, **H4 22px/600** (widened from the original 20px/500 specifically to create a real step down from Body Large, not a near-tie).
- **Rule:** SemiBold (600) is the ceiling for every heading below Display. No heading below hero level should ever move to 700.

### Body

- **Role:** running text, the majority of every page.
- **Spec `[BUILT]`:** Body Large 18px/400 (intros, lede paragraphs), Body 16px/400 (default), Body Small 14px/400 (secondary/caption text). Regular weight only, no exceptions — hierarchy comes from size and color (`--site-text-secondary` for de-emphasis), never from bolding sentences.

### Technical identifiers

- **Role:** numerals and short labels that are genuinely technical/sequential markers, not general text — the brand system's own defined use case for Plex Mono.
- **Spec `[BUILT]`:** IBM Plex Mono, weight 500, applied to exactly two components: `.concept-pair__mark` (the 01/02 numerals under Project Controls and Intelligence Layer) and `.process-item::before` (the AI Adoption page's step counters).
- **Rule (binding, per the hybrid direction's explicit constraint):** Mono stays restricted to *selected* technical identifiers. It does not expand into a general-purpose "everything is a data label" register (that was Direction 03's more extreme version, not what was approved) — no new component should reach for Mono without a specific, defensible "this is a technical identifier" reason.

### Editorial emphasis `[PROPOSED]`

- **Role:** a genuinely editorial touch for consulting-report-style pull-quotes or single emphasized phrases — not a heading, not a component, a typographic gesture.
- **Spec:** italic 400 weight — already downloaded on every page load via the existing `@import` (`ital,wght@0,400;...;1,400`) and, as of this document, still completely unused anywhere in the codebase.
- **Rule:** used sparingly — a single pull-quote per page at most, never in headings, never for general emphasis within body paragraphs (that stays plain, using scale/color for hierarchy instead).

---

## 3. Layout principles

### Section types

Three section treatments, applied by content weight rather than uniformly:

| Type | Padding-block | Used for | Status |
|---|---|---|---|
| `.section--spacious` | 112px (`--space-14`) | The two main visual moments — Project Controls, Intelligence Layer | `[BUILT]` |
| `.section` (default) | 96px (`--space-12`) | Standard content sections on interior pages | `[BUILT]` |
| `.section--compact` | 64px (`--space-8`) | Connective/quiet sections — Responsible AI, closing CTA | `[BUILT]` |

**Rule:** padding-block signals importance. A section given `--spacious` treatment should have a real visual reason (a panel, a signature moment) — not applied by default or for variety's sake.

### Whitespace rules

- Base 8px spacing scale (`--space-1` through `--space-14`) is the only spacing vocabulary — no bespoke pixel values anywhere `[BUILT]`.
- Content columns cap at `.measure` (68ch) for readability regardless of how wide the section itself is `[BUILT]`.
- **`[PROPOSED]`, not yet applied broadly:** treat margin as a compositional tool, not just a gap — an asymmetric text-led layout (wide text column, narrower supporting visual alongside, not centered above it) is the target pattern for new sections, following the `.intelligence-layout` (1.1fr/0.9fr) precedent already built rather than a centered, evenly-split grid.

### Hierarchy rules

- Hierarchy comes from **scale, weight, and rule lines** — never from color-coding. Color (Teal specifically) is reserved for signaling interactivity, not for organizing content importance.
- The `.eyebrow` + heading + body pattern is the sitewide default for introducing any section — consistent, not novel per-section.
- Numerals/marks (`.concept-pair__mark`, `.process-item::before`) are used only where the content is a genuine sequence or enumerated pair — not decoratively applied to make something look more structured than it is.
- **Explicitly avoided (binding, from the hybrid direction's brief):** icon-in-rounded-square feature cards, pill-shaped tags/badges, gradient buttons or hero backgrounds, the generic hero→3-cards→testimonials template rhythm.

---

## 4. Motion principles

Three named tiers, each with a distinct CSS custom property, replacing the earlier practice of reusing one curve everywhere. All three `[BUILT]` in `site/css/styles.css` `:root`.

### Entrance — `--ease-entrance: cubic-bezier(0.16, 1, 0.3, 1)`

- **Meaning:** something arriving for the first time. Reads as an instrument settling into place, not content "fading in."
- **Applies to:** the hero plate stagger, `.reveal` (sitewide scroll-fade), the intelligence panels' mark/signal/decision-mark entrance animations.
- **Rule:** single deceleration, never a bounce, never repeats once settled (every entrance animation is one-shot, gated by `IntersectionObserver`, never re-triggered on repeated scroll).

### Activation — `--ease-activation: cubic-bezier(0.34, 1.56, 0.64, 1)`

- **Meaning:** the intelligence layer doing something — the one place motion is allowed a flicker of character (a slight overshoot) to distinguish "this is the payoff moment" from ordinary entrance.
- **Applies to:** exactly one animation today — `panel-signal-emphasis`, the Intelligence Layer panel's confirm-pulse.
- **Rule:** stays rare and tied to a genuine transformation-resolves moment. Not a general-purpose "make this pop" easing — if a second use case emerges, it should be because something else in the system also represents intelligence activating, not because the curve looks nice.

### Interaction — `--ease-interaction: cubic-bezier(0.4, 0, 0.2, 1)`

- **Meaning:** hover/focus feedback only — quick, symmetric, purely functional confirmation that a control responded.
- **Applies to:** nav underline, card hover (lift/background/border), `.link-arrow`/`.card__link` arrow motion, `.btn` hover, `.nav-toggle` hover, footer link hover, mobile nav hover.
- **Rule:** every interactive element's hover/focus transition uses this curve — no exceptions, no element-specific tuning that quietly drifts from it.

### Binding exclusions (all tiers)

No particle fields, floating nodes, or connecting lines. No glow, bloom, or blur effects of any kind (brand rule D-0004, already enforced). No looping "ambient" animation running at rest — everything settles and stops. No cursor-following effects. Parallax stays scoped to the existing hero-only, capped, subtle implementation — not extended elsewhere.

---

## 5. Components that should follow this system

| Component | Current state | What the hybrid direction asks of it |
|---|---|---|
| **Hero** | `[BUILT]` — plates, Bold display headline, entrance-tier motion, hero-only parallax | Already fully aligned. No changes required by this document. |
| **Intelligence panels** (Project Controls / Intelligence Layer) | `[BUILT]` — shared `.intelligence-panel` component, Blue-muted field + Teal signal, entrance + activation motion | Aligned on color/motion. `[PROPOSED, not yet applied]`: the Project Controls panel's surrounding card/context is a candidate for the new Structural Surface tint (`#101B36`) instead of plain page background, and a future "resolved insight" callout is the natural first real use of Paper-as-clarity-surface. |
| **Service sections** (Project Controls / Intelligence Layer / Responsible AI content blocks) | `[BUILT]` — `.concept-pair` numerals in Mono, H4 titles, `.section--spacious`/`--compact` rhythm | Aligned. Responsible AI's `.eyebrow`-styled principle labels already match the "hierarchy without color-coding" rule. |
| **CTA** (closing section) | `[BUILT]` — `.section--compact`, `.section--alt`, standard button pair | Aligned on rhythm/color. `[PROPOSED]`: candidate location for a single editorial-italic pull-quote (Section 2 above) if the closing CTA ever needs more than a plain heading — not required, just the most natural fit if it's ever wanted. |
| **Navigation** (header) | `[BUILT]` — Teal-tinted hairline border (`rgba(20,184,166,0.35)`), interaction-tier motion on underline/CTA/toggle | Aligned. No further change indicated by this document — the header was deliberately kept the lowest-priority, lightest-touch component in the prior refinement pass, and nothing in the hybrid direction asks for more. |

---

## What this document is for

A stable reference for two purposes: (1) confirming that most of the hybrid direction is *already* correctly implemented — color discipline, typography restraint, the three-tier motion system, and section rhythm are all `[BUILT]` — and (2) tracking the small number of genuinely new ideas the hybrid direction introduces (`Structural Surface`, `Paper as clarity surface`, editorial-italic emphasis) so they can be applied deliberately, one considered instance at a time, rather than all at once or by accident. No file in `site/` has been changed by this document.
