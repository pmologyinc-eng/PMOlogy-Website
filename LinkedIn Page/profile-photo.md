# PMOlogy — LinkedIn Profile Photo (square logo slot)

**Done.** LinkedIn's company-page profile photo is square (recommended 300×300px minimum). The favicon asset (`site/assets/favicon.svg` — a square crop of the Intelligent-O mark, no wordmark or tagline) has been exported to PNG at 800×800px in three background options, saved in `assets/` next to this file:

- `assets/profile-photo-transparent.png` — genuinely transparent background (verified alpha channel, not a white fill) — **recommended default**, adapts to LinkedIn's own page chrome.
- `assets/profile-photo-paper-bg.png` — solid Paper (`#F8FAFC`) background.
- `assets/profile-photo-ink-bg.png` — solid Ink (`#0F172A`) background, alternate if a dark square reads better in context.

Rendered directly from the production SVG (Chrome headless, not a lossy raster conversion), so edges are clean and the icon's ring gap is a true cutout rather than a hardcoded white fill — confirmed by how cleanly it sits on both the Paper and Ink backgrounds above. Upload whichever variant looks best once you see it in LinkedIn's circular crop preview — transparent is the recommended starting point.
