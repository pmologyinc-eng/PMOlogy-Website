# PMOlogy — Visual Direction Specification

> The approved hybrid direction (Direction 03's dark foundation, disciplined by Direction 01's consulting restraint), specified as a standalone reference. This document defines rules; it does not itself change any file in `site/`.

---

## 1. Core positioning

> **Premium intelligence consulting for project delivery.**

Every rule in this document exists to serve that sentence, not the reverse. Three words carry the weight:

- **Premium** — nothing here is loud, trendy, or urgent-feeling. Confidence is expressed through restraint and precision, not through scale or color intensity.
- **Intelligence** — the visual system has one job beyond legibility: make "an intelligence layer added to what already works" visible without illustrating it literally. Color roles (Section 2) and motion (Section 5) both exist to carry this idea structurally.
- **Consulting** — the register is McKinsey/Bain/Deloitte-adjacent (PMOlogy's own named calibration set), not SaaS-startup-adjacent. Every layout and anti-pattern rule below traces back to keeping that distinction real, not aspirational.

If a proposed visual choice doesn't visibly serve one of these three words, it doesn't belong in the system, regardless of how polished it looks in isolation.

---

## 2. Color roles

Five confirmed brand hex values. Nothing in this specification introduces a new hue.

| Color | Hex | Role |
|---|---|---|
| Ink | `#0F172A` | Enterprise foundation |
| Blue | `#003DA5` | Existing systems / project ecosystem |
| Teal | `#14B8A6` | Intelligence activation |
| Paper | `#F8FAFC` | Clarity moment (+ primary text) |
| Slate | `#1E293B` | Neutral structural surface |

### Ink — enterprise foundation

The default page surface, everywhere. Ink is what makes the "premium" and "consulting" words in the positioning line credible before a visitor reads anything — a confident, unhurried dark field rather than a bright, busy one. It should never be treated as a neutral to be filled with color; it's the room the rest of the system stands in.

### Blue — existing systems / project ecosystem

Blue represents everything PMOlogy did not invent: the schedules, controls, tools, and processes already in place before PMOlogy adds anything. It is a **structural, graphic-only color** — never text, never a UI accent, never a CTA. Fails contrast on dark surfaces by design (~1.9:1, per the brand color system) and stays confined to shapes: the hero's muted plates, the intelligence panels' muted field, service icon bars, and — as a deliberate extension of this role — a blue-tinted structural surface tone (`#101B36`, a documented tint of `#003DA5`, not a new hue) reserved specifically for content that is *about* the existing project ecosystem. Depth is expressed through opacity (0.5–0.9 range), never through a second hue.

### Teal — intelligence activation

Teal means exactly one thing everywhere it appears: *this is what PMOlogy adds, and you can act on it.* It is the site's only accent color and the only color that ever signals interactivity — buttons, links, focus rings, and the specific moment a transformation resolves (a panel's signal element, the hero's fifth plate). It never decorates something static, and it never appears as a field or background. If Teal shows up somewhere a visitor can't click and it isn't the literal payoff of a transformation, it's being used wrong.

### Paper — clarity moment

Paper carries two roles, deliberately unequal in frequency. As **text**, it's the default and appears constantly — primary copy on every dark surface. As a **surface**, it is the rarest color decision in the entire system: a single bright rupture in an otherwise dark page, reserved for the exact moment fragmented information resolves into a clear, decision-ready signal. This second role should appear once, maybe twice, on any given page — the moment it becomes routine, it stops meaning "clarity" and starts meaning "light card," which defeats the entire purpose.

### Slate — supporting neutral

The default alternate surface for anything that isn't specifically "existing systems" content — general cards, alt-background sections, footer. Where Blue's structural surface says "this is what already exists," Slate says nothing in particular, which is exactly its job: a quiet, unmarked neutral for content that doesn't need to carry the ecosystem/intelligence distinction.

---

## 3. Typography rules

Typeface family is locked — IBM Plex Sans / IBM Plex Mono — not open for revision here. These rules govern how that family is used, not what it is.

### Executive hierarchy

Scale and weight carry hierarchy; color-coding does not. One heading level, and only one, is permitted true Bold (700) weight: the hero display line — the single loudest typographic moment on the site. Every heading below it (H1 through H4) tops out at SemiBold (600). Body copy at every size stays Regular (400) without exception; if a sentence needs emphasis, that's a hierarchy failure to fix with structure, not a reason to bold a phrase mid-paragraph. The gap between a heading level and the body text beneath it should always be visually unambiguous — a heading that's barely distinguishable from surrounding copy (in size or weight) has failed this rule regardless of what tag it's wrapped in.

### Technical identifiers

IBM Plex Mono is reserved for genuine technical/sequential markers — step numerals, short identifier labels — and nothing else. It never appears in running body copy, never in headings, never as a general "this looks technical" flourish. Every use should pass a specific test: *is this actually a numeral or identifier marking a real sequence, or would Plex Sans say the same thing just as correctly?* If the latter, use Plex Sans. Mono's value depends entirely on staying rare — a page where everything is set in Mono reads as a spec sheet, not a consulting site.

### Editorial emphasis

A single italic pull-quote treatment, used at most once per page, for a genuinely editorial moment — a positioning line, a key claim worth setting apart from surrounding prose. Never used in headings, never for routine emphasis within a paragraph, never for more than one phrase at a time. This is a deliberately rationed device: its entire effect depends on being unusual when it appears.

---

## 4. Layout principles

### Consulting / editorial style

The governing distinction: a consulting report is read and trusted; a SaaS landing page is scanned and converted. Compositions should default to a wide, text-led column with supporting visuals placed *alongside* content, the way a report figure sits beside its paragraph — not centered above it, competing for the same attention. Asymmetric splits (a wider text column against a narrower visual) read as considered; perfectly even, centered splits read as templated.

### Whitespace

Whitespace is the system's primary separator — not borders, not background-color blocks, not boxes. Section padding scales with content weight: sections carrying real visual moments (a signature panel, a transformation) get generous breathing room; connective or quiet sections stay tighter. This variation should be felt, not just theoretically present — a page where every section breathes at exactly the same rate has no rhythm, regardless of how much whitespace exists in total.

### Hierarchy

Hierarchy is built from three tools, in this order of preference: scale, then weight, then a hairline rule or numeral mark — never color. Color is reserved entirely for Teal's interactivity signal (Section 2); using color to indicate "this section is more important" is a rule violation even if it looks fine in isolation. Section introductions follow one consistent pattern (a small label, a heading, a supporting line) rather than a different structural idiom invented per section — consistency of structure is itself part of the premium/consulting feel.

### Avoid SaaS patterns

Specifically excluded from this system: centered three-up feature grids as a default layout, icon-in-rounded-square component styling, pill-shaped tags or status badges, a generic hero → feature cards → testimonials → CTA template rhythm. None of these are forbidden because they're inherently bad — they're forbidden because they're the visual signature of a category (consumer SaaS marketing) this positioning is explicitly not in.

---

## 5. Motion principles

Three named tiers. Every animation on the site should belong to exactly one.

### Entrance

Something arriving for the first time. The feeling is an instrument settling into place — a single, unhurried deceleration curve, never a bounce, never a repeat once settled. This is the largest category by volume (section reveals, the hero's signature entrance, a panel's initial resolve) and the one most likely to be overused if not held to its definition: entrance motion marks a first appearance, nothing else.

### Activation

The intelligence layer doing something — reserved specifically for the moment a transformation resolves, a signal, and nothing routine. This is the only tier permitted a flicker of character (a slight overshoot in its curve) precisely because its rarity is what makes that character read as meaningful rather than decorative. If activation motion starts appearing more than once or twice per page, it has stopped being a payoff moment and started being noise.

### Interaction

Hover and focus feedback, and only that. Quick, symmetric, purely functional — confirms a control responded, nothing more. Every interactive element on the site (links, buttons, nav, cards) should share this exact motion character; interaction motion should never surprise a user or call attention to itself the way entrance or activation motion can.

**Binding across all three tiers:** no looping or ambient motion at rest — everything settles and stops. No motion runs without a specific, named reason belonging to one of the three tiers above.

---

## 6. Visual anti-patterns

Explicitly excluded, regardless of execution quality:

### AI clichés

No robots, digital brains, circuit-board patterns, glowing nodes, neural-network dot-and-line diagrams, or generic "artificial intelligence" iconography of any kind. Intelligence is expressed through the color and motion system (Sections 2 and 5) — structurally, never illustrated literally. This is a binding brand-system rule (`brand-discovery.md`'s forbidden-symbol list), not a stylistic preference.

### Dashboard screenshots

No mockups of software UI — no window chrome, browser frames, tabs, filters, dropdowns, axes, legends, or gridlines. Any visualization on the site is a conceptual illustration of a mechanism (fragmented information resolving into a clear signal), not a simulation of a real product. If a visual could be mistaken for a screenshot of an actual application, it has crossed the line.

### Gradients

None, anywhere — buttons, backgrounds, hero treatments, cards. Every fill on the site is a flat, single value from the confirmed palette. This is a locked brand-system decision (D-0004: no glow, no blur, no bloom, no gradient), not an aesthetic default that could be revisited casually.

### Excessive cards

Card-in-a-grid is not the system's default component. A card is appropriate when content is genuinely a discrete, parallel item (a service among several equal services); it is not an all-purpose container to reach for whenever a section needs visual structure. A page where every section is a grid of cards has defaulted to the SaaS-marketing pattern this specification exists to avoid (Section 4).

### Decorative animation

Every animation must trace to one of the three motion tiers (Section 5) and to a specific, real reason for existing. No animation that runs purely because motion is expected on a modern site — no idle bounces, no infinite loops, no motion added late in a build to "make a section feel more alive" without a defined role. If a proposed animation can't be named as entrance, activation, or interaction, it doesn't belong on the site.

---

*This specification governs future visual decisions for PMOlogy's website and related materials. It does not describe a completed implementation — it is the standard implementation work should be checked against.*
