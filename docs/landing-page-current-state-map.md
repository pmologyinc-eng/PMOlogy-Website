# PMOlogy Homepage — Current-State Implementation Map

> Pre-build inspection pass, current as of the Hero refinement already shipped. Maps `site/index.html` as it exists right now onto the storyboard's target sections, and identifies exactly what changes, what doesn't, and which CSS is safe to touch vs. shared with other pages. No code changed in this pass.

---

## 1. Current homepage sections, in order

All in `site/index.html` (178 lines). No templating — header/footer markup below is duplicated identically across all 10 other pages in `site/`.

| Order | Section | Lines | `<section>` classes |
|---|---|---|---|
| 1 | Header/nav | 15–43 | `.site-header` |
| 2 | Hero | 47–64 | `.hero` |
| 3 | "Three ways we add intelligence to delivery" | 66–109 | `.section` |
| 4 | "Six ideas behind every engagement" | 111–124 | `.section .section--alt` |
| 5 | Closing CTA | 126–140 | `.section` |
| 6 | Footer | 144–174 | `.site-footer` |

---

## 2. Mapping current sections to storyboard categories

| Storyboard category | Current homepage coverage |
|---|---|
| **Hero** | Section 2 (`.hero`) — fully built, refined. Direct match. |
| **Services (overview)** | Section 3's three `.card` tiles — PMO Consulting / AI Adoption in Project Controls / Project Controls, Reporting & Automation. Functions as both a services teaser and (weakly) as the site's only nod toward Project Controls and AI capability, since it's just card copy. |
| **Project Controls (expertise demonstration)** | **Not present as its own section.** Only implied by the "PMO Consulting" card's one-sentence description inside Section 3 and by theme-item 02 ("Improve before replacing") in Section 4. No demonstration, no dedicated section. |
| **AI-enabled capabilities** | **Not present as its own section.** Only implied by the "AI Adoption in Project Controls" card's one-sentence description in Section 3 and theme-items 01/03/04 in Section 4. No visualization, no dedicated section. |
| **Responsible AI** | **Absent from the homepage entirely.** Exists only on the interior `services/ai-adoption-project-controls.html` page ("Responsible by design" subsection). Whether this becomes a homepage section is an open decision — this message's target direction calls out adding Project Controls and Intelligence Layer sections explicitly, but doesn't confirm Responsible AI as a homepage addition. Flagged, not assumed either way. |
| **Trust/differentiation** | Section 4 (six-theme list) functions as a loose stand-in — it's brand-values enumeration, not differentiation-with-evidence, and has no visual identity of its own (see Section 3 below). |
| **CTA** | Section 5 — direct match, unchanged target. |

**Net finding:** of the storyboard's target categories, only Hero and CTA currently have a dedicated, purpose-built section. Project Controls, Intelligence Layer, and Trust/differentiation are either entirely absent or folded into generic sections that don't carry their own visual identity.

---

## 3. Remain / replace / merge / remove

| Section | Disposition | Reasoning |
|---|---|---|
| **Header/nav** | **Remain unchanged.** | Not in scope for this pass; no storyboard section touches it. |
| **Hero** | **Remain unchanged.** | Already refined and approved in the prior step. |
| **Section 3 — "Three ways we add intelligence" (card grid)** | **Replace.** | This is the generic template pattern flagged in the earlier gap analysis (icon-card-grid, indistinguishable from any SaaS marketing site). Its three cards' underlying claims (PMO Consulting / AI Adoption / Reporting & Automation) get redistributed into the new Project Controls and Intelligence Layer sections rather than surviving as a standalone teaser grid. **Do not delete the underlying `.card`/`.service-icon` classes** — they're shared with `about.html` and `services/index.html` (see Section 4 below); only this section's *markup* in `index.html` is replaced. |
| **Section 4 — "Six ideas" theme list** | **Remove as a standalone section; merge its content.** | Confirmed in the earlier gap analysis as the single most "brochure-like" moment on the page — a numbered list with no visual identity. Its six statements are redistributed as supporting copy inside the new sections rather than kept as an orphaned list: items 02 ("Improve before replacing") and 05 ("Uncover hidden improvement potential") belong under Project Controls; items 01 ("Add an intelligence layer"), 03 ("Turn project data into decisions"), and 04 ("Move from reactive reporting to proactive control") belong under Intelligence Layer; item 06 ("Create value quickly and practically") fits naturally as closing-CTA supporting copy. `.theme-list`/`.theme-item` are used **only** on `index.html` (confirmed by grep — no other page references them), so this is the one section whose CSS classes can be fully retired, not just unused-on-this-page. |
| **Section 5 — Closing CTA** | **Remain, minor refinement only (not full replace).** | Structurally sound and already matches the target end-state. The earlier gap analysis suggested a visual echo of the hero motif here (e.g., a static Teal bar via the existing `.hero__rule` pattern) — worth doing, but it's a small addition, not a rebuild, and out of scope unless explicitly requested in this pass. |
| **Footer** | **Remain unchanged.** | Not in scope. |
| *(new)* **Project Controls section** | **Add.** | Per storyboard Section 2 / implementation spec — the shared Project Intelligence Visualization panel, Stage 1→3 resolve. Inserted where Section 3 currently sits. |
| *(new)* **Intelligence Layer section** | **Add.** | Per storyboard Section 3 — same shared panel, second act (absorption). Inserted immediately after the new Project Controls section, where Section 4 currently sits. |
| *(open item)* **Responsible AI section** | **Decision needed before build.** | The storyboard defines this section, but this message's stated target direction doesn't list it among the sections to add right now. Recommend confirming explicitly: add it as a fourth new homepage section (between Intelligence Layer and the CTA), or leave Responsible AI as interior-page-only content for this build pass and revisit later. |

---

## 4. Exact files/components/CSS affected

### Files
- **`site/index.html`** — the only HTML file that changes. Specifically:
  - Lines 66–109 (Section 3, card grid) — removed/replaced with new Project Controls section markup.
  - Lines 111–124 (Section 4, theme list) — removed; content redistributed as noted above; replaced with new Intelligence Layer section markup.
  - Lines 126–140 (Section 5, closing CTA) — unchanged, or minimally amended if the hero-echo refinement is included.
  - Lines 1–64 (head, header, hero) and 142–177 (footer, closing tags) — **untouched.**
- **`site/css/styles.css`** — additive changes only:
  - **New rules needed:** the shared `.intelligence-panel` component and its modifiers/keyframes (per implementation spec Sections 2 & 3), plus whatever section-level layout wrapper the two new sections need (likely reusing existing `.section`/`.section--alt`/`.grid`/`.grid-3` — no new layout primitives expected).
  - **Safe to fully remove:** `.theme-list`, `.theme-item`, `.theme-item__mark` (lines ~429–436) — confirmed used only on the page being changed, nowhere else in the site.
  - **Must NOT be removed or altered:** `.card`, `.card:hover`, `.card__link` (lines ~375–427) — actively used on `about.html` and `services/index.html`; `.service-icon` and its `.bar--*` rules (lines ~406–415) — actively used on `services/index.html`; `.grid`/`.grid-3` — used on every single page in the site. If the old card-grid markup is removed from `index.html`, these classes simply become (correctly) unused *on that page* while remaining fully in effect elsewhere — no CSS deletion required or safe here.
- **`site/js/main.js`** — likely one small addition: an IntersectionObserver hook for the new panel's multi-stage sequence, per the implementation spec (may extend the existing `.reveal` observer rather than adding a second one — implementation-time decision, not fixed here).
- **No other file in `site/` is affected** — the two new sections live only on the homepage; no interior page markup changes as part of this work.

### Summary table

| Class/component | Where else it's used | Action |
|---|---|---|
| `.card`, `.card__link` | `about.html`, `services/index.html` | Keep as-is; stop using on homepage only |
| `.service-icon`, `.bar--1/2/accent` | `services/index.html` | Keep as-is; stop using on homepage only |
| `.theme-list`, `.theme-item`, `.theme-item__mark` | Nowhere else | Safe to fully remove |
| `.grid`, `.grid-3` | Every page | Never touch |
| `.hero__plates`, `.plate--1..5`, `plate-in` | Homepage hero only | Untouched (already refined) |
| `.reveal`, `.reveal--d1..d8` | Every page | Reused by new sections, not modified |
| `.intelligence-panel` (new) | Homepage only (both new sections) | New — to be created |

---

## Open items before implementation starts

1. **Responsible AI section** — confirm whether it's in scope for this build pass or deferred.
2. **Closing-CTA hero-echo refinement** — confirm whether to bundle it into this pass or treat as a separate, later polish item.
3. **Card-grid content redistribution** — confirm the three service cards' claims are adequately covered by the new Project Controls/Intelligence Layer sections' copy, or whether a slimmed services-teaser strip should still exist somewhere on the homepage (the site's only other services entry point is the nav link to `services/index.html`).
