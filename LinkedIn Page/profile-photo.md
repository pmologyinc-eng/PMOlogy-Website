# PMOlogy — LinkedIn Profile Photo (square logo slot)

LinkedIn's company-page profile photo is square (recommended 300×300px minimum). The favicon asset is already cropped exactly for this: `site/assets/favicon.svg` — a square crop of the Intelligent-O mark, no wordmark or tagline, viewBox `493 298 182 182`.

## To produce the file LinkedIn needs

LinkedIn requires PNG/JPG, not SVG — export `favicon.svg` at 300×300px (or larger, e.g. 600×600px for retina) as PNG with a transparent or Paper (`#F8FAFC`) background. Ink (`#0F172A`) background is the alternate if a dark square reads better against LinkedIn's white page chrome — test both before finalizing, don't assume.

No new design work needed here — this is an export/format step from an asset that already exists and is already approved for exactly this "small, square, icon-only" use case (that's what a favicon is for).
