# PMOlogy Homepage Copy

> Source of truth for the verbatim text of the pmology.ca homepage. Each section
> is marked **Approved** or **Draft**. Approved wording is to be reproduced
> exactly in implementation, with no edits. Service-boundary and positioning
> decisions live in `service-architecture.md`; layout decisions are cross-linked
> from `landing-page-storyboard.md`. This document holds the words that appear on
> the page plus the layout intent for each section.
>
> **Scope:** sections are added here as their copy is approved, one at a time,
> during the ongoing full content review. Sections not listed below have not yet
> been reviewed in this pass.
>
> **Implementation status:** Sections 1 to 5 are **implemented and live** on
> pmology.ca as of 2026-09-07 (theme `1.4.0`), authorized by the owner. The
> hero was already live at `1.3.1`. The **portfolio strip was removed** from the
> homepage on 2026-09-07 (theme `1.4.1`) pending real use cases and demos; see
> the note below. **Theme `1.4.8` (2026-09-07)** added the Section 2 column icons
> and framed Section 3 "Responsible AI" on the dark trust surface (see Sections 2
> and 3 and the notes below). The **site footer is now covered by this document** (Section
> 6): its revised logo, tagline, link groups, and section-box alignment are
> **approved but not yet implemented**. The live footer (`footer.php` and the
> `.site-footer` styles) is unchanged until a separate footer implementation
> request. Any later copy edits recorded here still need their own authorization
> before deploying.

---

## Section 1: "Our approach"

**Status:** Approved (owner, 2026-09-07). Supersedes the earlier single combined
"Our approach introduction" recorded here on 2026-09-07.
**Location:** the section immediately below the hero. A section of its own,
separate from the service columns.

### Approved wording

Eyebrow:

> Our approach

Heading:

> More value from the tools and processes you already use.

Paragraph 1:

> We start by understanding your delivery processes and the tools, information, and people behind them. Working with your team, we identify where work slows down, information gets disconnected, or visibility is missing.

Paragraph 2:

> We then prioritize improvements based on their likely value, the effort involved, and your team's needs. This may mean strengthening project controls, connecting existing data, or applying AI to a specific task.

### Layout

- A spacious, text-led section. The introduction (eyebrow, heading, two
  paragraphs) sits in the wash-teal background box.
- This section keeps its background box. The service columns (Section 2) are
  placed **outside** this box, as a visually distinct section.
- **Ambient video (added 2026-09-07; theme `1.4.2`, framed `1.4.3`, layout
  settled `1.4.5`).** A quiet decorative loop
  (`assets/video/modular-elements-loop.mp4`, muted / looping) sits in a rounded
  panel beside the text on desktop (>=900px), with a hairline border and a soft
  shadow so the pale render lifts off the wash-teal box. Two equal columns
  across the full box width (`1fr 1fr`, gap `clamp(40px, 4vw, 64px)`): the panel
  fills its half so it reads at a proper size and its right edge meets the box
  edge with no leftover space, and there is a comfortable gutter to the text.
  The panel is pinned to the top of the box; the intro text is vertically
  centred against it (still left-aligned) so it sits mid-box, not top-anchored. It is `aria-hidden`, has no poster, and is hidden outright
  under `prefers-reduced-motion` and below 900px, where the section reverts to
  text-only (no video on tablet portrait or mobile, by design). The copy is
  unchanged; the section stays text-led. A darker / brand-tinted re-grade of the
  clip itself is an optional owner follow-up.

---

## Section 2: "Our expertise"

**Status:** Approved (owner, 2026-09-07). Supersedes the earlier "one combined
services block" / "three connected areas" pillar copy and the per-pillar
"Delivery data / Connected data / Intelligent data" labels.
**Location:** immediately after Section 1, visually separate from it.

### Approved wording

Heading:

> Three connected areas of expertise

**Column 1**

Title:

> Project Controls

Description:

> We help your team build reliable schedules, manage costs and resources, and assess risk. Clear progress measurement and forecasting show where delivery stands and where action is needed.

Link text:

> Explore Project Controls

Link destination: `/services/project-controls/`

**Column 2**

Title:

> Data Integration

Description:

> We connect data across your business systems and strengthen the data architecture behind your operations. Working with your existing technology stack, we automate data collection and reporting, creating a reliable foundation for analytics and AI.

Link text:

> Explore Data Integration

Link destination: `/services/project-data-integration/` (retained as-is pending a
separate migration decision). Do not change the URL or add a redirect now.

**Column 3**

Title:

> AI Adoption in Project Delivery

Description:

> We help your team identify useful applications of AI, test them with your data, and put them into practice. Each application is evaluated for accuracy, usefulness, and responsible use, with people overseeing the results.

Link text:

> Explore AI Adoption

Link destination: `/services/ai-adoption-project-delivery/`

### Layout

- Three equal-width columns on desktop; stacked vertically on mobile.
- Equal visual weight for all three services. Project Controls does **not** get a
  larger or standalone box.
- Each column contains its title, its approved description, and its service link.
- Separate the columns with whitespace or a subtle divider. Minimal decoration.
- No arrows, no step numbers, no "01 / 02 / 03" markers, no other treatment that
  suggests a mandatory sequence.
- Keep this section visually separate from the "Our approach" introduction
  (Section 1). The two are distinct sections, not one block.
- **Column icons (approved 2026-09-07, live since theme `1.4.8`).**
  Each column carries one small line icon above its heading: Project Controls =
  three adjustment sliders; Data Integration = three branches joining one
  central connection; AI Adoption = a microchip with a small checkmark. ~44px,
  Navy outline with one restrained Teal accent, flat (no gradient, glow,
  background box, or animation), left-aligned, equal visual weight, decorative
  and hidden from assistive tech. This replaces the earlier flat-bar figures and
  is an owner override scoped to this section of the storyboard's "flat bars
  only / no connecting lines" lock; details in `landing-page-storyboard.md`
  ("Amendment — 2026-09-07 (Section 2 icons)"). Copy, links, and column widths
  are unchanged.

---

## Section 3: "Responsible AI"

**Status:** Approved (owner, 2026-09-07). Supersedes the existing on-page
"Responsible AI" section headed "Applied thoughtfully, governed carefully." and
its three principle descriptions (Transparency, Accountability, Human oversight).
**Location:** after the service columns, before the closing call to action. Its
position in the page order is unchanged.

### Approved wording

Eyebrow:

> Responsible AI

Heading:

> Practical AI, tailored to your processes.

Paragraph 1:

> We identify where AI can help across your core delivery and supporting business processes, from analyzing performance to preparing reports and handling routine information requests. Each application is shaped around your team's needs, the way you work, and the data you use.

Paragraph 2:

> We assess its usefulness and limitations, address data quality and access, and establish how results will be reviewed before wider use.

**Column 1**

Title:

> Transparency

Description:

> Help your team understand what each AI application does, the information it uses, and where its outputs need checking.

**Column 2**

Title:

> Accountability

Description:

> Define who approves each application, monitors its performance, and addresses problems as needs and processes change.

**Column 3**

Title:

> Human oversight

Description:

> Keep people in control of important decisions, with clear review points and the ability to question or override AI outputs.

### Layout

- Text-led section. No additional image or animation.
- The heading and the two introductory paragraphs sit above three equal columns.
- The three columns are equal width on desktop and stack vertically on mobile.
- **Framed on the dark trust surface (approved 2026-09-07, live since theme
  `1.4.8`).** The section is now a rounded box on the brand's Ink surface
  (`.box.box--dark.box--responsible`), not loose text between the boxed
  sections. This matches the storyboard's own Responsible AI guardrail ("a plain
  Slate/Ink surface") and reads as a considered governance / trust statement.
  Flat Ink fill with one restrained Teal top-rule (the same 3px accent idiom the
  wash boxes use); body copy and the principle hairline switch to the dark-kit
  neutrals for legibility. No gradient, glow, image, or motion (D-0004 stands).
  Section 2 ("Three connected areas of expertise") stays unboxed by owner
  decision; only Responsible AI is framed. Recorded in
  `landing-page-storyboard.md`, "Amendment — 2026-09-07 (Responsible AI
  framing)".

### Scope note

- This section frames AI as applying across the client's **core delivery and
  supporting business processes** (for example performance analysis, report
  preparation, and routine information requests), consistent with the broadened
  Data Integration scope. It does not rename or re-scope the "AI Adoption in
  Project Delivery" service.

---

## Section 4: "About PMOlogy" and "How we work" (two adjacent boxes)

**Status:** Approved (owner, 2026-09-07). Replaces the previous copy of these two
boxes: the "Project-delivery expertise. Practical AI. Combined." About box and
the earlier "Approach" box.
**Location:** two adjacent boxes lower on the page, after the portfolio area and
before the closing call to action. Distinct from the "Our approach" introduction
(Section 1).

### Box 1: About PMOlogy

Eyebrow:

> About PMOlogy

Heading:

> Project experience meets AI expertise.

Paragraph 1:

> Our team brings together hands-on experience in project delivery, data science, and AI research. We understand the demands of managing complex projects and how to apply technology to practical business needs.

Paragraph 2:

> We work with your team to make improvements that fit your processes and support the people responsible for delivery.

Link text:

> Meet the team

Link destination: `/about/`

### Box 2: How we work

Eyebrow:

> How we work

Heading:

> A staged approach, built around early value.

Stage titles (preserve exactly, in this order):

> 01 Assess
> 02 Quick wins
> 03 Implement
> 04 Measure & scale

Description:

> Targeted improvements that address main pain points and deliver visible value early, with low cost and minimal disruption.

Link text:

> See how we work

Link destination: `/approach/`

### Layout

- Two adjacent boxes with equal visual weight on desktop.
- Stack on mobile, with "About PMOlogy" first.
- "About PMOlogy" introduces the team's experience. "How we work" explains the
  engagement process and its emphasis on early value.
- Keep this distinct from the "Our approach" introduction (Section 1).

### Positioning notes

- **"with low cost and minimal disruption"** in the Box 2 description is
  **owner-approved positioning for this box** (2026-09-07). It is a scoped
  exception to the general "no blanket promises about cost, disruption, or
  implementation size" guidance in `writing-guidelines.md`: a general
  characterisation of the staged approach, not a guarantee. It must not be
  turned into a numerical claim (percentage, timeframe, price), a guarantee, or
  a broader promise, and it is not to be reused in other sections.
- The four stages (Assess, Quick wins, Implement, Measure & scale) describe how
  an engagement progresses. They are **not** a required sequence for purchasing
  the three services in Section 2.
- Team-capability wording in Box 1 ("project delivery, data science, and AI
  research") is owner-supplied approved copy for this box.

---

## Section 5: "Closing invitation" (contact)

**Status:** Approved (owner, 2026-09-07). Supersedes any earlier closing-section
wording: the on-page "Let's talk about where an intelligence layer fits."
heading, its pull-quote, and the two-button layout.
**Location:** the final section on the homepage, the last invitation before the
footer.

### Approved wording

Eyebrow:

> Ready when you are

Heading:

> Where could your processes work better?

Description:

> Tell us what's slowing your business down. We'll explore how to make your processes smarter using your existing tools and systems.

Button text:

> Let's talk

Button destination: `/contact/`

### Layout

- The final invitation on the homepage.
- One button only, linking to Contact. The secondary "About PMOlogy" button is
  removed from the documented layout.
- Keep the background visually quiet so the message and the single button stand
  out.

---

## Section 6: Site footer

**Status:** Approved (owner, 2026-09-07). **Not yet implemented** — the live
footer (`footer.php`, `.site-footer` styles, the `footer` and `connect` menus)
is unchanged. Footer implementation requires a separate request; this section
records the approved target only.
**Location:** the sitewide footer that closes every page, including the
homepage. A dark (Ink) anchor band; its full-width background is preserved.
**Supersedes:** the plain-text "PMOlogy" wordmark; the current tagline ("Adding
an intelligence layer to project delivery ... combining project-controls
expertise with practical AI, automation, and analytics."); the "Site" column
label; and the placement of Privacy Policy / Terms inside the "Connect" list.

### Brand

- **Logo, not text.** Replace the `.site-footer__brand` plain-text name with the
  approved inline logo, using the **reversed / Paper-text variant** built for
  dark backgrounds (`assets/svg/logo-reversed.svg`; per
  `PMOlogy-Brand/brand-system/logo/logo-specifications.md` Sections 6 to 7 and
  the ASSET-MANIFEST "reversed logo" row). This mirrors the header, which uses
  the Ink-text `logo-light` variant on its light bar.
- **Links to the homepage** (`home_url( '/' )`).
- **Proportions preserved** — constrain height only and let width scale
  (`width: auto; display: block`), the same way the header does with
  `.brand-mark__logo { height: 3rem; width: auto; }`. A slightly smaller footer
  height is acceptable; the aspect ratio must not change.
- **Accessible name "PMOlogy"** — the link (or the inline SVG via `role="img"`
  plus `<title>`) carries `aria-label="PMOlogy"`; the decorative
  `aria-hidden="true"` currently on the mark is removed for this placement.

### Tagline

Replace the current tagline with exactly:

> A layer of intelligence for project delivery.

This is the approved hero line reused as the footer promise (see
`landing-page-storyboard.md` Section 1 and the "A layer of intelligence" note
below). It stays the overall promise, not a service name. No em dash (the
superseded tagline contained one).

### Link groups

**Column 1 label:** rename **"Site" to "Explore"**. Links, in order:

| Text | Destination |
|---|---|
| About PMOlogy | `/about/` |
| Services | `/services/` |
| How we work | `/approach/` |
| Contact | `/contact/` |

Changes from today's fallback: "About" becomes "About PMOlogy", "Approach"
becomes "How we work", and "Services" is added. "How we work" points at
`/approach/`, consistent with Section 4 Box 2.

**Column 2 label:** keep **"Connect"**. Links:

| Text | Destination |
|---|---|
| LinkedIn | `https://www.linkedin.com/company/pmologyinc` (new tab, `rel="noopener"`) |

**Bottom row** (`.site-footer__bottom`): move **Privacy Policy** and **Terms**
out of "Connect" and place them in the bottom row, alongside the copyright:

| Item | Destination / behaviour |
|---|---|
| Privacy Policy | `/privacy/` |
| Terms | `/terms/` |
| © [current year] PMOlogy. All rights reserved. | current year set automatically (`gmdate( 'Y' )`), as today |

**Portfolio:** already removed from the footer menus and fallback (theme
`1.4.7`; see Notes). Keep it removed — do not reintroduce a Portfolio item in
either menu or the fallback.

### Alignment with the homepage section boxes

Recorded in full in `landing-page-storyboard.md` ("Amendment — 2026-09-07 (site
footer)"). Summary: the footer wraps its content in `.container`
(`max-width: 1280px`, centred, `padding-inline: 24px`), which does not line up
with the homepage rounded-box system. The homepage boxes and boxless sections
are positioned by `margin-inline: clamp(12px, 3vw, 36px)` for the **outer**
boundary (`.pm-page > .box`, `.pm-inner`, no `max-width` cap) and
`clamp(24px, 4vw, 52px)` for the **inner** padding (`.box`,
`.pm-inner > section`). The approved correction:

- Wrap the footer content in a wrapper whose outer edges use
  `margin-inline: clamp(12px, 3vw, 36px)` and **no** `max-width` cap, so its
  left and right edges sit on the same vertical lines as the section-box outer
  edges.
- Give the footer columns grid and the bottom row the section-box **inner**
  padding `padding-inline: clamp(24px, 4vw, 52px)` (applied once on the wrapper
  is sufficient; both rows then align), so footer text sits in the same column
  as boxed-section text.
- Keep the `.site-footer` dark background **full-width**; only the inner wrapper
  takes the gutter.
- Reuse those two established `clamp()` values, not new offsets. They already
  scale across desktop, tablet, and mobile, so alignment holds at every width
  with no extra breakpoints.
- Keep three balanced columns on desktop (`.site-footer__grid`
  `grid-template-columns: 2fr 1fr 1fr` at >=768px) and the clean single-column
  stack below 768px.

### Implementation note (for the separate footer request)

- Update **both** the WordPress-managed menus (`footer` and `connect` menu
  locations) **and** the hard-coded template fallback `<ul>`s in `footer.php`,
  together, so they cannot drift: "Explore" group (About PMOlogy, Services, How
  we work, Contact); "Connect" group (LinkedIn only); Privacy Policy and Terms
  relocated to the bottom row.
- Swap `.site-footer__brand` text for `pmology_svg( 'logo-reversed' )` inside a
  homepage link with `aria-label="PMOlogy"`; add the height / `width: auto`
  rule.
- Apply the alignment correction above (replace `.container` in `footer.php`
  with the gutter wrapper; move the inner padding onto it).
- Nothing in this document authorises a menu, CSS, PHP, media, or live-settings
  change.

---

## Notes and history

- **Portfolio removed entirely (2026-09-07).** Owner decision: placeholder
  cards only, no real client work, so removed until genuine use cases and demos
  exist.
  - Homepage "Portfolio / See it in action" section removed (theme `1.4.1`).
  - Nav + footer: "Portfolio" menu items deleted from the Primary and Footer
    Site menus; the hardcoded fallback link removed from `footer.php`
    (theme `1.4.7`). Stray `/portfolio/` link removed from the Data Integration
    service page.
  - The `/portfolio/` **Page (#577) is now a draft** (returns 404), recoverable
    by re-publishing.
  - Kept for re-adding: `page-portfolio.php` template, and the CSS classes
    `pm-rail` / `pm-rcard` / `pm-carousel-head` / `pm-pill`.


- **Two-section split.** The homepage introduction and the service columns,
  previously one combined block, are now two visually distinct sections:
  Section 1 "Our approach" (text-led, boxed) and Section 2 "Our expertise"
  (three equal columns, outside that box). Recorded in `service-architecture.md`
  ("Homepage layout") and `landing-page-storyboard.md`.
- **Service 2 renamed.** "Project Data Integration" is renamed to
  **"Data Integration"** on the homepage and in current documentation. Its
  documented scope is broadened to data across the client's business and
  delivery processes on their existing systems (including the data architecture
  behind operations), not project data alone. Project Controls and AI Adoption
  in Project Delivery keep their current scope. See `service-architecture.md`.
- **URL unchanged.** The Data Integration detail page keeps
  `/services/project-data-integration/` for now. A URL/redirect change is a
  separate migration decision, not made here.
- **"A layer of intelligence"** remains the overall promise (the approved hero
  line), not another name for Data Integration or any single service. Hero copy
  is approved and unchanged; see `landing-page-storyboard.md` section 1.
- **All three services retain standalone value.** None is described as merely
  feeding the others, and the three are not a required sequence. The internal
  service-boundary decisions are in `service-architecture.md` (Positioning
  clarification, 2026-09-07); they are not restated as on-page copy.
- **Team descriptions.** No team-role wording (for example "our AI engineers")
  is used. No current PMOlogy team documentation confirms such titles, so none
  was added. If team documentation later confirms a role description, propose it
  as a separate wording option for review rather than editing the approved copy
  above.
- **Punctuation.** No em dashes anywhere in website copy. Punctuation exactly as
  written above.
- **Responsible AI section revised (Section 3).** The approved wording replaces
  the on-page "Applied thoughtfully, governed carefully." heading, its
  introductory paragraph, and the three principle descriptions. The new copy
  frames AI as applying across the client's core delivery and supporting
  business processes; this is a framing/scope note for the section, not a rename
  or re-scope of the AI Adoption service. Layout stays text-led and quiet, with
  no image or animation. Recorded also in `service-architecture.md` and
  `landing-page-storyboard.md`.
- **About PMOlogy and How we work boxes revised (Section 4).** Approved copy
  replaces the previous "Project-delivery expertise. Practical AI. Combined."
  About box and the earlier "Approach" box. Box 2's eyebrow is now "How we
  work"; its four stage titles are preserved. "with low cost and minimal
  disruption" is owner-approved positioning for that box only, reconciled in
  `writing-guidelines.md` as a scoped exception with no guarantees, numbers, or
  broader promises.
- **Closing invitation revised (Section 5).** Approved copy replaces the
  "Let's talk about where an intelligence layer fits." heading, its pull-quote,
  and the two-button (Contact / About PMOlogy) layout. Now one button only
  ("Let's talk" to `/contact/`) on a quiet background. Recorded also in
  `service-architecture.md` and `landing-page-storyboard.md`.
- **Site footer added to this document (Section 6), approved 2026-09-07, not yet
  implemented.** Approved target: reversed / Paper-text logo (linked to the
  homepage, proportions locked, accessible name "PMOlogy") replacing the
  plain-text wordmark; tagline replaced with the approved hero line "A layer of
  intelligence for project delivery."; "Site" column renamed "Explore" (About
  PMOlogy /about/, Services /services/, How we work /approach/, Contact
  /contact/); "Connect" keeps LinkedIn only; Privacy Policy (/privacy/) and
  Terms (/terms/) moved into the bottom row beside the automatic-year copyright;
  Portfolio stays removed. Footer content wrapper realigned to the homepage
  rounded-box system (`margin-inline: clamp(12px, 3vw, 36px)` outer,
  `padding-inline: clamp(24px, 4vw, 52px)` inner, background stays full-width),
  replacing the `.container` wrapper. Alignment correction recorded in
  `landing-page-storyboard.md`. Implementation must update the WordPress `footer`
  and `connect` menus **and** the `footer.php` fallback links together, and is a
  separate authorized request.
- **Section 2 column icons (approved 2026-09-07, live since theme `1.4.8`).**
  The three flat-bar figures are replaced by three distinct line icons
  (adjustment sliders / branches joining one connection / microchip with a
  checkmark), ~44px, Navy outline with one Teal accent, flat and decorative
  (`front-page.php` inline SVG plus a `.svc-figure--icon` CSS modifier). Owner
  override scoped to this section of the storyboard's "flat bars only / no
  connecting-line" lock; D-0004 (no glow/gradient/blur) is unchanged and still
  honoured. Recorded in `landing-page-storyboard.md`, "Amendment — 2026-09-07
  (Section 2 icons)".
- **Section 3 "Responsible AI" framed (approved 2026-09-07, live since theme
  `1.4.8`).** Moved from loose text in `.pm-inner` into a rounded box on the
  brand's Ink trust surface (`.box.box--dark.box--responsible`), with one
  restrained Teal top-rule; dark-kit neutrals for body text and the principle
  hairline. Consistent with the storyboard's "plain Slate/Ink surface"
  guardrail; D-0004 unchanged. Section 2 stays unboxed by owner decision.
  (`front-page.php` section classes plus a `.box--responsible` CSS block.)
  Recorded in `landing-page-storyboard.md`, "Amendment — 2026-09-07
  (Responsible AI framing)".
- Superseded here: the 2026-09-07 single "Our approach introduction" section of
  this document (its Paragraph 1 wording and its single-paragraph Paragraph 2).
