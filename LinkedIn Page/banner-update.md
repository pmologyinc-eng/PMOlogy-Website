# PMOlogy — LinkedIn Banner: Updated Spec

Supersedes the "no logo asset exists yet" blocker in `PMOlogy-Brand/deliverables/linkedin/linkedin-banner-brief.md` Section 6 — the production logo now exists (`site/assets/images/logo.svg`, dark-header/reversed variant at `site/assets/images/logo-dark-text.svg`). Everything else in that original brief still holds; this file just resolves the placeholder.

**Still no finished banner image file** — this is a spec to hand to a designer or build directly from the SVGs, not a rendered PNG/JPG.

## Format

- 1128×191 px (verify against LinkedIn's current spec at build time).
- Export PNG or JPG.
- Keep the bottom-left ~150×150px clear — LinkedIn overlays the round profile photo there.

## Recommended direction

- **Background:** Ink `#0F172A` (dark banner) — matches the site header, which already uses Ink with the reversed/light logo lockup. A Paper `#F8FAFC` light alternate can be produced too if the client wants an option, per the original brief.
- **Logo:** the reversed/light lockup from `logo-dark-text.svg`, positioned right-of-center, vertically centered, clear of the bottom-left safe zone. At this wide (5.9:1), short aspect ratio, use the horizontal wordmark+O lockup rather than attempting a stacked treatment.
- **Accent:** if any fine detail/line work is used, prefer Tech Blue `#003DA5` over AI Teal `#14B8A6` on this dark background — consistent with the color-tokens file's own contrast guidance (Teal is weak against light backgrounds; on Ink it's usable but Blue reads cleaner for small detail at banner scale).
- **Tagline:** optional, still provisional per the messaging framework — safe to omit for a cleaner banner. If included: "Smarter project delivery, built on what already works." in IBM Plex Sans, sized for legibility at LinkedIn's small display scale (banners render small in most views — avoid fine text).
- **No photographic background, no glow/blur/bloom/shadow on the logo** — same restrictions that apply everywhere else the logo is used (D-0004).

## Open question for the client

Whether to also produce the light/Paper alternate now or ship the dark version first and revisit — not a call to make silently.
