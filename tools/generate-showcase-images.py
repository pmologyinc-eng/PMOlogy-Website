#!/usr/bin/env python3
"""
Generates the three showcase mockups (status report / dashboard / P6-style
schedule) for the PMOlogy brand-kit prototype via OpenAI's DALL-E 3 API.

Requires OPENAI_API_KEY in the environment (loaded from .env by the caller).
Run from the repo root: python3 tools/generate-showcase-images.py
"""
import json
import os
import sys
import urllib.request
import base64

API_KEY = os.environ.get("OPENAI_API_KEY")
if not API_KEY:
    sys.exit("OPENAI_API_KEY not set in environment.")

OUT_DIR = os.path.join(os.path.dirname(__file__), "..", "site", "assets", "images", "generated")
os.makedirs(OUT_DIR, exist_ok=True)

# Shared style direction: PMOlogy's real brand palette and register —
# restrained, editorial, professional-services dark UI, not a generic
# SaaS/AI-startup look. No literal AI iconography (brand-discovery.md's
# forbidden-cliche list: no robots, brains, circuits, glowing nodes).
STYLE = (
    "Clean, minimal, professional enterprise software mockup UI. Dark navy "
    "background (#0F172A), slate panel surfaces (#1E293B), muted blue accent "
    "bars (#003DA5), one teal highlight accent (#14B8A6) used sparingly for "
    "the single most important element, white/light gray text and data lines. "
    "Flat design, no gradients, no glow or neon effects, no drop shadows, "
    "no 3D, no photorealistic rendering, no people, no logos, no real company "
    "names or brand marks, no readable specific text beyond generic labels. "
    "Precise grid alignment, generous whitespace, calm and authoritative, "
    "like a screenshot from a senior enterprise consulting firm's software, "
    "not a startup app. High detail, sharp edges, product screenshot style."
)

IMAGES = [
    {
        "name": "report-mockup",
        "prompt": (
            "A screenshot mockup of a weekly project status report interface. "
            "Shows a document-style panel with a title bar, several placeholder "
            "text lines representing paragraphs, a small cluster of vertical bar "
            "chart indicators, and one highlighted teal status banner at the "
            "bottom indicating a resolved decision. " + STYLE
        ),
    },
    {
        "name": "dashboard-mockup",
        "prompt": (
            "A screenshot mockup of a project controls dashboard interface. "
            "Shows three small KPI stat tiles across the top, each with a "
            "generic placeholder label only ('METRIC') and NO numeric value "
            "or percentage of any kind displayed anywhere in the image — use "
            "a short gray placeholder bar/dash shape instead of any number or "
            "digit. Below the tiles, a single clean line chart trending "
            "upward with one teal highlighted data point at the end, no axis "
            "numbers or labels. Subtle horizontal gridlines. Absolutely no "
            "digits, numerals, or percentage signs anywhere in the image. "
            + STYLE
        ),
    },
    {
        "name": "p6-schedule-mockup",
        "prompt": (
            "A screenshot mockup of a Primavera P6-style project schedule "
            "Gantt chart interface. Shows six horizontal task rows with short "
            "text labels on the left and horizontal timeline bars of varying "
            "length and start position, mostly muted blue, with exactly one "
            "bar highlighted in teal representing the critical path. A single "
            "thin vertical teal 'today' line crosses the chart. " + STYLE
        ),
    },
]

# Vibrant variant — same compositions, restyled for the ui-ux-pro-max +
# frontend-design "ignore branding" prototype (pmo-consulting-alt.html /
# index-alt.html): amethyst (#8452D6) stands in for structural blue as the
# "existing/exploration" color, teal stays the one "resolved signal" accent
# — same two-color semantic rule used throughout that prototype.
STYLE_VIBRANT = (
    "Clean, minimal, premium enterprise software mockup UI. Deep near-black "
    "background (#0B0A12), dark elevated panel surfaces (#15121F), muted "
    "amethyst-purple accent bars (#8452D6), one teal highlight accent "
    "(#14B8A6) used sparingly for the single most important element, "
    "white/light lavender-gray text and data lines. Flat design, no "
    "gradients, no glow or neon effects, no drop shadows, no 3D, no "
    "photorealistic rendering, no people, no logos, no real company names or "
    "brand marks, no readable specific text beyond generic labels. Precise "
    "grid alignment, generous whitespace, calm and premium, like a "
    "screenshot from a high-end AI-driven consulting firm's software. High "
    "detail, sharp edges, product screenshot style."
)

IMAGES_VIBRANT = [
    {
        "name": "report-mockup-vibrant",
        "prompt": (
            "A screenshot mockup of a weekly project status report interface. "
            "Shows a document-style panel with a title bar, several placeholder "
            "text lines representing paragraphs, a small cluster of vertical bar "
            "chart indicators, and one highlighted teal status banner at the "
            "bottom indicating a resolved decision. " + STYLE_VIBRANT
        ),
    },
    {
        "name": "dashboard-mockup-vibrant",
        "prompt": (
            "A screenshot mockup of a project controls dashboard interface. "
            "Shows three small KPI stat tiles across the top, each with a "
            "generic placeholder label only ('METRIC') and NO numeric value "
            "or percentage of any kind displayed anywhere in the image — use "
            "a short gray placeholder bar/dash shape instead of any number or "
            "digit. Below the tiles, a single clean line chart trending "
            "upward with one teal highlighted data point at the end, no axis "
            "numbers or labels. Subtle horizontal gridlines. Absolutely no "
            "digits, numerals, or percentage signs anywhere in the image. "
            + STYLE_VIBRANT
        ),
    },
]

ALL_IMAGES = IMAGES + IMAGES_VIBRANT


def generate(prompt: str) -> bytes:
    payload = json.dumps({
        "model": "gpt-image-1",
        "prompt": prompt,
        "n": 1,
        "size": "1536x1024",
        "quality": "medium",
    }).encode("utf-8")

    req = urllib.request.Request(
        "https://api.openai.com/v1/images/generations",
        data=payload,
        headers={
            "Authorization": f"Bearer {API_KEY}",
            "Content-Type": "application/json",
        },
        method="POST",
    )
    with urllib.request.urlopen(req, timeout=120) as resp:
        body = json.loads(resp.read())

    item = body["data"][0]
    if "b64_json" in item:
        return base64.b64decode(item["b64_json"])
    # Fallback: response returned a URL instead of inline base64.
    with urllib.request.urlopen(item["url"], timeout=120) as img_resp:
        return img_resp.read()


def main():
    only = sys.argv[1] if len(sys.argv) > 1 else None
    targets = [i for i in ALL_IMAGES if i["name"] == only] if only else IMAGES
    if only and not targets:
        sys.exit(f"No image named '{only}'. Options: {[i['name'] for i in ALL_IMAGES]}")
    for item in targets:
        out_path = os.path.join(OUT_DIR, f"{item['name']}.png")
        print(f"Generating {item['name']}...")
        try:
            data = generate(item["prompt"])
        except urllib.error.HTTPError as e:
            err_body = e.read().decode("utf-8", errors="replace")
            print(f"  FAILED: {e.code} {err_body}")
            continue
        with open(out_path, "wb") as f:
            f.write(data)
        print(f"  saved -> {out_path} ({len(data)} bytes)")


if __name__ == "__main__":
    main()
