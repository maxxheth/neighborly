@extends('layouts.app')

@section('content')
    {{-- Include the individual page sections (partials) --}}
    @include('partials.section-hero')
    @include('partials.section-localexperts')
    @include('partials.section-ourservices')
    @include('partials.section-promise')
    @include('partials.section-howworks')
    @include('partials.section-family')
    @include('partials.section-downloadapp')
    @include('partials.section-offer')
    @include('partials.section-testimonials')
    @include('partials.section-cta')

    

    {{-- The rest of your sections will be included here: --}}
    
@endsection

{{-- Push the page-specific JavaScript for the mobile menu to the 'scripts' stack --}}
@push('footer_scripts')

\u003cscript id="scroll-animation-script" class=""\u003e
      (function() {
        // Add scroll-animate class to content sections
        const sectionsToAnimate = [
          // Hero section content
          'section:first-of-type .max-w-3xl',
          // Services section
          'section.bg-slate-50 .text-center.max-w-3xl',
          'section.bg-slate-50 .grid.grid-cols-2 \u003e div',
          // Local Experts section
          'section.bg-white .text-center.max-w-3xl',
          'section.bg-white .grid.lg\\:grid-cols-2 \u003e div',
          // Done Right Promise section
          'section.bg-white .grid.lg\\:grid-cols-2 \u003e div',
          // How It Works section
          'section.bg-slate-50 .text-center.max-w-3xl',
          'section.bg-slate-50 .grid.md\\:grid-cols-3 \u003e div',
          // Family of Brands section
          'section.bg-white .text-center.max-w-4xl',
          'section.bg-white .grid.grid-cols-3 \u003e div',
          // Download App section
          'section.bg-gradient-to-br.from-blue-600 .grid.lg\\:grid-cols-2 \u003e div',
          // Seasonal Content section
          'section.bg-gradient-to-br.from-yellow-400 .text-center',
          // Testimonials section
          'section.bg-white .text-center.mb-12',
          // Final CTA section
          'section.bg-gradient-to-br.from-blue-600.text-white .max-w-3xl'
        ];

        // Find and mark elements for animation
        document.querySelectorAll('section').forEach(function(section, index) {
          if (index === 0) return; // Skip hero section initial load

          // Animate section headings and content blocks
          const headings = section.querySelectorAll('.text-center.max-w-3xl, .text-center.max-w-4xl, .text-center.mb-12');
          headings.forEach(function(el) {
            el.classList.add('scroll-animate');
          });

          // Animate grid items
          const gridItems = section.querySelectorAll('.grid \u003e div');
          gridItems.forEach(function(el, i) {
            el.classList.add('scroll-animate');
            el.style.transitionDelay = (i * 50) + 'ms';
          });

          // Animate two-column layouts
          const twoColItems = section.querySelectorAll('.grid.lg\\:grid-cols-2 \u003e div, .grid.lg\\:gap-16 \u003e div');
          twoColItems.forEach(function(el, i) {
            el.classList.add('scroll-animate');
            el.style.transitionDelay = (i * 100) + 'ms';
          });
        });

        // Create Intersection Observer
        const observer = new IntersectionObserver(function(entries) {
          entries.forEach(function(entry) {
            if (entry.isIntersecting) {
              entry.target.classList.add('animate-in');
            }
          });
        }, {
          threshold: 0.1,
          rootMargin: '0px 0px -50px 0px'
        });

        // Observe all animated elements
        document.querySelectorAll('.scroll-animate').forEach(function(el) {
          observer.observe(el);
        });
      })();
    \u003c/script\u003e

    \u003cscript id="hero-stagger-animation"\u003e
      (function() {
        // Wait for page load then trigger animations
        window.addEventListener('load', function() {
          setTimeout(function() {
            // Badge
            var badge = document.querySelector('section:first-of-type .inline-block.mb-4');
            if (badge) {
              badge.classList.remove('opacity-0', 'translate-y-5');
            }
            // Heading
            var heading = document.querySelector('section:first-of-type h1');
            if (heading) {
              heading.classList.remove('opacity-0', 'translate-y-5');
            }
            // Subheading - 200ms delay
            setTimeout(function() {
              var subheading = document.querySelector('section:first-of-type p.text-lg');
              if (subheading) {
                subheading.classList.remove('opacity-0', 'translate-y-5');
              }
            }, 200);
            // CTA - 300ms after subheading (500ms total)
            setTimeout(function() {
              var cta = document.querySelector('section:first-of-type .bg-white.rounded-2xl.shadow-2xl');
              if (cta) {
                cta.classList.remove('opacity-0', 'translate-y-5');
              }
            }, 500);
          }, 100);
        });
      })();
    \u003c/script\u003e

@endpush
