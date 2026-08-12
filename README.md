# PMOlogy Website — Static Prototype

Static HTML/CSS/JS prototype of the PMOlogy website, per the approved platform direction (`/Users/jjr/PMOlogy-Brand/docs/decisions/decision-log.md`, D-0006): static prototype first, WordPress/Blocksy/Elementor Free/WPForms migration only after this prototype is approved.

## Running it

No build step — plain static files. From `site/`, serve with any static server, e.g.:

```
cd site
python3 -m http.server 8000
```

Then open `http://localhost:8000/`.

## What this is

- 8 pages matching the approved sitemap: Home, About, Services Overview, PMO Consulting, AI Adoption in Project Controls, Project Controls/Reporting/Automation, Approach, Contact — plus placeholder legal pages and a 404.
- English only. Structure is written to be translation-ready (self-contained sections), but no French content or bilingual routing exists yet — that's an explicit pre-WordPress-migration decision, not resolved here.
- Uses a **temporary placeholder logo** (`site/assets/images/logo-placeholder-TEMPORARY.png`, copied from the brand workspace's approved teal reference PNG, per D-0006). **Must be replaced with the real production SVG before any production launch** — this is a hard gate, not a suggestion.
- The contact form is a visual prototype only — it does not submit anywhere. Real form handling arrives with the WPForms/WordPress integration.
- No CMS, theme, or page-builder code exists yet — that's Phase 2 (WordPress/Blocksy/Elementor), gated on this prototype being approved.

## Requirements this was built from

All requirements live in the brand workspace (`/Users/jjr/PMOlogy-Brand`), which remains the canonical source — this repo should not duplicate or redefine them, only implement them:

| Requirement | Source |
|---|---|
| Visual system (layout, type, color, components) | `website/design/website-design-brief.md` |
| Page structure / sitemap | `website/information-architecture/sitemap.md` |
| Content / messaging per page | `website/content/website-content-framework.md` |
| Platform direction | `website/integration/website-platform-requirements.md` |
| Color tokens | `assets/brand-kit/design-tokens/pmology-color-tokens.css` |
| Typography system | `brand-system/typography/typography-system.md` |
| Logo rules (for when the real asset exists) | `brand-system/logo/logo-specifications.md` |
| Pre-launch QA | `docs/qa/asset-generation-checklist.md` |

If a requirement seems to conflict with what's built here, the brand workspace wins — flag it rather than resolving it locally.

## Before production launch (hard gates)

- [ ] Replace `logo-placeholder-TEMPORARY.png` with the real production logo, once it exists (Phase 6 in the brand workspace).
- [ ] Replace `favicon-TEMPORARY.svg` with a real favicon derived from the production logo SVG (simplification for 16/32/48px is an open question — `logo-specifications.md` Section 5). The current one is a plain ring, not the approved Intelligent-O mark.
- [ ] Resolve the bilingual (English/French) technical approach before WordPress migration.
- [ ] Draft real Privacy Policy and Terms content (currently placeholder pages, `site/legal/`).
- [ ] Wire the contact form to a real submission path once WPForms is in place.
- [ ] Run `docs/qa/asset-generation-checklist.md` against the finished site.
