<?php
/**
 * Homepage — light-forward rounded-box landing.
 *
 * Cool-white ground, content in rounded boxes (structure after bcg.com, colour
 * kept as PMOlogy's own). Every section box lines up with the hero box at one
 * column width (see .pm-page / .pm-inner in styles.css).
 * The hero backdrop is a seamless loop of the abstract 3D flow with a teal
 * current running along it (assets/video/hero-flow.mp4), graded to the approved
 * palette; the static poster stands in on small screens and under reduced
 * motion. The closing-CTA box still uses the hero-slats SVG placeholder.
 * See docs/palette-light-extension.md.
 *
 * @package PMOlogy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$services_url  = home_url( '/services/' );
$contact_url   = home_url( '/contact/' );
$about_url     = home_url( '/about/' );
$approach_url  = home_url( '/approach/' );
$pc_url        = home_url( '/services/project-controls/' );
$pdi_url       = home_url( '/services/project-data-integration/' );
$ai_url        = home_url( '/services/ai-adoption-project-delivery/' );
?>

<div class="pm-page">

	<section class="box pm-hero" aria-labelledby="hero-title">
		<div class="pm-hero__media" aria-hidden="true">
			<video class="pm-hero__video" autoplay muted loop playsinline preload="metadata"
				poster="<?php echo esc_url( get_theme_file_uri( 'assets/video/hero-flow-poster.jpg' ) ); ?>">
				<source src="<?php echo esc_url( get_theme_file_uri( 'assets/video/hero-flow.mp4' ) ); ?>" type="video/mp4">
			</video>
		</div>
		<div class="pm-hero__scrim" aria-hidden="true"></div>
		<div class="pm-hero__panel">
			<p class="eyebrow">Visibility &middot; Intelligence &middot; Delivery</p>
			<h1 id="hero-title">A layer of intelligence for project delivery.</h1>
			<p class="body-lg">We combine project-controls experience with AI and automation to connect your data, reduce manual work, and help your team make better-informed decisions. We build on the tools and processes you already use.</p>
			<div class="pm-hero__ctas">
				<a class="btn btn--primary" href="<?php echo esc_url( $services_url ); ?>">Explore services</a>
				<a class="btn btn--secondary" href="<?php echo esc_url( $contact_url ); ?>">Contact us</a>
			</div>
		</div>
	</section>

	<?php // Approach ribbon — three tabs framing PMOlogy's approach. Not a nav TOC. ?>
	<nav class="pm-layer" aria-label="How PMOlogy's approach fits together">
		<a href="#layer">Our approach</a>
		<a href="#controls">Project Controls</a>
		<a href="#responsible">Responsible AI</a>
	</nav>

	<?php // Section 1 — "Our approach": text-led, boxed. Introduction only.
		// The service columns (Section 2) sit outside this box. See
		// docs/homepage-copy.md Section 1 (approved 2026-09-07). ?>
	<div class="pm-inner">
		<section class="box box--wash-teal" id="layer" aria-labelledby="layer-title">
			<div class="intelligence-layout">
				<div class="reveal measure">
					<p class="eyebrow">Our approach</p>
					<h2 id="layer-title" class="mt-2">More value from the tools and processes you already use.</h2>
					<p class="body-lg text-secondary mt-4">We start by understanding your delivery processes and the tools, information, and people behind them. Working with your team, we identify where work slows down, information gets disconnected, or visibility is missing.</p>
					<p class="body-lg text-secondary mt-2">We then prioritize improvements based on their likely value, the effort involved, and your team's needs. This may mean strengthening project controls, connecting existing data, or applying AI to a specific task.</p>
				</div>
				<?php // Quiet ambient loop beside the intro. Decorative; hidden on
					// reduced motion and on narrow screens (section stays text-only there). ?>
				<div class="intelligence-layout__visual reveal reveal--d1">
					<div class="pm-approach-media" aria-hidden="true">
						<video class="pm-approach-media__vid" autoplay muted loop playsinline preload="metadata">
							<source src="<?php echo esc_url( get_theme_file_uri( 'assets/video/modular-elements-loop.mp4' ) ); ?>" type="video/mp4">
						</video>
					</div>
				</div>
			</div>
		</section>
	</div>

	<?php // Section 2 — "Our expertise": three distinct, complementary services,
		// equal weight, outside the Section 1 box. No sequence cues. See
		// docs/homepage-copy.md Section 2 (approved 2026-09-07). ?>
	<div class="pm-inner">
		<section id="expertise" aria-labelledby="expertise-title">
			<h2 id="expertise-title" class="reveal">Three connected areas of expertise</h2>
			<div class="layer-stages">
				<div class="layer-stage reveal reveal--d1" id="controls">
					<div class="svc-figure svc-figure--icon" aria-hidden="true">
						<svg viewBox="0 0 48 48" focusable="false" aria-hidden="true" fill="none" stroke="#003DA5" stroke-width="2.5" stroke-linecap="round">
							<line x1="7" y1="13" x2="41" y2="13"/>
							<line x1="7" y1="24" x2="41" y2="24"/>
							<line x1="7" y1="35" x2="41" y2="35"/>
							<circle cx="32" cy="13" r="4.5" fill="#F8FAFC"/>
							<circle cx="17" cy="24" r="4.5" fill="#14B8A6" stroke="#14B8A6"/>
							<circle cx="35" cy="35" r="4.5" fill="#F8FAFC"/>
						</svg>
					</div>
					<h3 class="h4">Project Controls</h3>
					<p class="body-sm text-secondary mt-2">We help your team build reliable schedules, manage costs and resources, and assess risk. Clear progress measurement and forecasting show where delivery stands and where action is needed.</p>
					<a class="link-arrow mt-4" href="<?php echo esc_url( $pc_url ); ?>">Explore Project Controls</a>
				</div>
				<div class="layer-stage reveal reveal--d2" id="integration">
					<div class="svc-figure svc-figure--icon" aria-hidden="true">
						<svg viewBox="0 0 48 48" focusable="false" aria-hidden="true" fill="none" stroke="#003DA5" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
							<polyline points="7,11 21,11 21,24"/>
							<line x1="7" y1="24" x2="21" y2="24"/>
							<polyline points="7,37 21,37 21,24"/>
							<line x1="21" y1="24" x2="38" y2="24"/>
							<circle cx="7" cy="11" r="2.75" fill="#003DA5"/>
							<circle cx="7" cy="24" r="2.75" fill="#003DA5"/>
							<circle cx="7" cy="37" r="2.75" fill="#003DA5"/>
							<circle cx="41" cy="24" r="4.5" fill="#14B8A6" stroke="#14B8A6"/>
						</svg>
					</div>
					<h3 class="h4">Data Integration</h3>
					<p class="body-sm text-secondary mt-2">We connect data across your business systems and strengthen the data architecture behind your operations. Working with your existing technology stack, we automate data collection and reporting, creating a reliable foundation for analytics and AI.</p>
					<a class="link-arrow mt-4" href="<?php echo esc_url( $pdi_url ); ?>">Explore Data Integration</a>
				</div>
				<div class="layer-stage reveal reveal--d3" id="ai">
					<div class="svc-figure svc-figure--icon" aria-hidden="true">
						<svg viewBox="0 0 48 48" focusable="false" aria-hidden="true" fill="none" stroke="#003DA5" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
							<rect x="14" y="14" width="20" height="20" rx="3"/>
							<line x1="20" y1="8" x2="20" y2="14"/>
							<line x1="24" y1="8" x2="24" y2="14"/>
							<line x1="28" y1="8" x2="28" y2="14"/>
							<line x1="20" y1="34" x2="20" y2="40"/>
							<line x1="24" y1="34" x2="24" y2="40"/>
							<line x1="28" y1="34" x2="28" y2="40"/>
							<line x1="8" y1="20" x2="14" y2="20"/>
							<line x1="8" y1="24" x2="14" y2="24"/>
							<line x1="8" y1="28" x2="14" y2="28"/>
							<line x1="34" y1="20" x2="40" y2="20"/>
							<line x1="34" y1="24" x2="40" y2="24"/>
							<line x1="34" y1="28" x2="40" y2="28"/>
							<polyline points="19,24 23,28 30,19" stroke="#14B8A6" stroke-width="3"/>
						</svg>
					</div>
					<h3 class="h4">AI Adoption in Project Delivery</h3>
					<p class="body-sm text-secondary mt-2">We help your team identify useful applications of AI, test them with your data, and put them into practice. Each application is evaluated for accuracy, usefulness, and responsible use, with people overseeing the results.</p>
					<a class="link-arrow mt-4" href="<?php echo esc_url( $ai_url ); ?>">Explore AI Adoption</a>
				</div>
			</div>
		</section>
	</div>

	<div class="pm-inner">
		<?php // Section 3 — "Responsible AI". Framed on the brand's dark trust
			// surface. A quiet ambient loop sits in a panel beside the intro on
			// desktop (>=900px), matching the Section 1 "Our approach" pattern;
			// decorative, muted, hidden under reduced motion and below 900px.
			// This panel is an owner override of the storyboard's "quietest
			// section, no image or animation" guardrail. See docs/homepage-copy.md
			// Section 3 and landing-page-storyboard.md, "Amendment — 2026-09-07
			// (Responsible AI framing)" and its video follow-up. ?>
		<section id="responsible" class="box box--dark box--responsible" aria-labelledby="resp-title">
			<div class="intelligence-layout">
				<div class="reveal measure">
					<p class="eyebrow">Responsible AI</p>
					<h2 id="resp-title" class="mt-2">Practical AI, tailored to your processes.</h2>
					<p class="body-lg text-secondary mt-2">We identify where AI can help across your core delivery and supporting business processes, from analyzing performance to preparing reports and handling routine information requests. Each application is shaped around your team's needs, the way you work, and the data you use.</p>
					<p class="body-lg text-secondary mt-2">We assess its usefulness and limitations, address data quality and access, and establish how results will be reviewed before wider use.</p>
				</div>
				<?php // Quiet ambient loop beside the intro. Decorative; hidden on
					// reduced motion and on narrow screens (section stays text-only there). ?>
				<div class="intelligence-layout__visual reveal reveal--d1">
					<div class="resp-media" aria-hidden="true">
						<video class="resp-media__vid" autoplay muted loop playsinline preload="metadata">
							<source src="<?php echo esc_url( get_theme_file_uri( 'assets/video/responsible-ai-loop.mp4' ) ); ?>" type="video/mp4">
						</video>
					</div>
				</div>
			</div>
			<div class="principle-rule mt-6 reveal reveal--d2" aria-hidden="true"></div>
			<div class="grid mt-4">
				<div class="grid-3 reveal reveal--d2">
					<p class="eyebrow" style="margin-bottom: var(--space-1);">Transparency</p>
					<p class="body-sm text-secondary">Help your team understand what each AI application does, the information it uses, and where its outputs need checking.</p>
				</div>
				<div class="grid-3 reveal reveal--d3">
					<p class="eyebrow" style="margin-bottom: var(--space-1);">Accountability</p>
					<p class="body-sm text-secondary">Define who approves each application, monitors its performance, and addresses problems as needs and processes change.</p>
				</div>
				<div class="grid-3 reveal reveal--d4">
					<p class="eyebrow" style="margin-bottom: var(--space-1);">Human oversight</p>
					<p class="body-sm text-secondary">Keep people in control of important decisions, with clear review points and the ability to question or override AI outputs.</p>
				</div>
			</div>
		</section>
	</div>

	<div class="pm-inner">
		<?php // Section 4 — two adjacent boxes: "About PMOlogy" (team experience)
			// and "How we work" (staged engagement, early value). Equal weight;
			// About first on mobile. See docs/homepage-copy.md Section 4. ?>
		<section class="pm-dual" id="about">
			<div class="box box--wash-blue reveal">
				<p class="eyebrow">About PMOlogy</p>
				<h2>Project experience meets AI expertise.</h2>
				<p class="body-sm text-secondary">Our team brings together hands-on experience in project delivery, data science, and AI research. We understand the demands of managing complex projects and how to apply technology to practical business needs.</p>
				<p class="body-sm text-secondary">We work with your team to make improvements that fit your processes and support the people responsible for delivery.</p>
				<a class="link-arrow" href="<?php echo esc_url( $about_url ); ?>">Meet the team</a>
			</div>
			<div class="box box--card reveal reveal--d1" id="approach">
				<p class="eyebrow">How we work</p>
				<h2>A staged approach, built around early value.</h2>
				<div class="pm-steps">
					<span class="pm-step">01 Assess</span>
					<span class="pm-step">02 Quick wins</span>
					<span class="pm-step">03 Implement</span>
					<span class="pm-step">04 Measure &amp; scale</span>
				</div>
				<p class="body-sm text-secondary">Targeted improvements that address main pain points and deliver visible value early, with low cost and minimal disruption.</p>
				<a class="link-arrow" href="<?php echo esc_url( $approach_url ); ?>">See how we work</a>
			</div>
		</section>
	</div>

	<?php // Section 5 — closing invitation. One button, quiet background.
		// See docs/homepage-copy.md Section 5 (approved 2026-09-07). ?>
	<section class="box box--dark pm-close" id="contact" aria-labelledby="cta-title">
		<div class="pm-close__media" aria-hidden="true"><?php pmology_svg( 'hero-slats' ); ?></div>
		<div class="pm-close__in">
			<p class="eyebrow">Ready when you are</p>
			<h2 id="cta-title">Where could your processes work better?</h2>
			<p class="body-lg mt-2 measure">Tell us what's slowing your business down. We'll explore how to make your processes smarter using your existing tools and systems.</p>
			<div class="pm-hero__ctas mt-4">
				<a class="btn btn--primary" href="<?php echo esc_url( $contact_url ); ?>">Let's talk</a>
			</div>
		</div>
	</section>

</div>

<?php
get_footer();
