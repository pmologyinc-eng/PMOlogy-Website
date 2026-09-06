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

- 8 pages matching the approved sitemap: Home, About, Services Overview, AI Adoption in Project Delivery, Project Controls/Reporting/Automation, Approach, Portfolio, Contact — plus placeholder legal pages and a 404. PMO Consulting was decided against as a standalone page — services are presented as Project Controls (detailed) instead; see `site/services/pmo-consulting-alt.html` and `pmo-consulting-brandkit.html` for the earlier explored-but-not-used direction, kept as reference only.
- English only. Structure is written to be translation-ready (self-contained sections), but no French content or bilingual routing exists yet — that's an explicit pre-WordPress-migration decision, not resolved here.
- Uses the **real, final production logo** (`site/assets/images/logo.svg`, a flat/no-glow vector built from the brand workspace's approved reference, with a reversed light-text variant for the dark header) and a matching favicon (`site/assets/favicon.svg`, cropped to the Intelligent-O mark). Confirmed final by the business owner 2026-09-06 (brand-workspace decision-log D-0018). A full-color raster reference copy also lives at `site/assets/images/pmology-logo-reference-teal.png` (sourced from `PMOlogy-Brand/assets/logos/approved/pmology-logo-approved-reference-teal.png`, the canonical source of record — kept here for convenience wherever a PNG is needed, e.g. LinkedIn assets, not as a second source of truth).
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
| Logo rules | `brand-system/logo/logo-specifications.md` |
| Pre-launch QA | `docs/qa/asset-generation-checklist.md` |

If a requirement seems to conflict with what's built here, the brand workspace wins — flag it rather than resolving it locally.

## Before production launch (hard gates)

- [x] Replace the placeholder logo with the real production logo — done (`site/assets/images/logo.svg`).
- [x] Replace the placeholder favicon with a real one derived from the production logo — done (`site/assets/favicon.svg`).
- [ ] Resolve the bilingual (English/French) technical approach before WordPress migration. Decision: not done in this static prototype — will be built properly in WordPress with real i18n tooling, to avoid throwaway routing work here.
- [ ] Draft real Privacy Policy and Terms content (currently draft pages pending legal review, `site/legal/`).
- [ ] Wire the contact form to a real submission path once WPForms is in place.
- [ ] Run `docs/qa/asset-generation-checklist.md` against the finished site.
