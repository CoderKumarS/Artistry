import './bootstrap';
// GSAP animations
gsap.registerPlugin(ScrollTrigger);

// function handleScrollDirection() {
//     let lastScrollTop = 0;
//     let ticking = false;
//     const navbar = document.querySelector('nav');
//     const threshold = 10; // scroll delta threshold

//     window.addEventListener('scroll', function () {
//         const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

//         if (!ticking) {
//             window.requestAnimationFrame(function () {
//                 const scrollDelta = scrollTop - lastScrollTop;

//                 if (Math.abs(scrollDelta) > threshold) {
//                     if (scrollDelta > 0) {
//                         // Scrolling down
//                         navbar.style.transition = 'all 200ms ease-in-out';
//                         navbar.style.height = '0';
//                         navbar.classList.add('opacity-0', 'pointer-events-none');
//                         navbar.classList.remove('sticky', 'top-0', 'z-50', 'opacity-100', 'pointer-events-auto');
//                     } else {
//                         // Scrolling up
//                         navbar.style.transition = 'all 200ms ease-in-out';
//                         navbar.style.height = '';
//                         navbar.classList.remove('opacity-0', 'pointer-events-none');
//                         navbar.classList.add('sticky', 'top-0', 'z-50', 'opacity-100', 'pointer-events-auto');
//                     }

//                     lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
//                 }

//                 ticking = false;
//             });

//             ticking = true;
//         }
//     });

//     // Adjust ScrollTrigger settings for animation start and end
//     ScrollTrigger.create({
//         trigger: 'nav',
//         start: 'top 60%', // Animation starts when the top of the navbar reaches 60% of the viewport
//         end: 'top 10%', // Animation ends when the top of the navbar reaches 10% of the viewport
//         onEnter: () => {
//             navbar.style.transition = 'all 200ms ease-in-out';
//             navbar.style.height = '';
//             navbar.classList.remove('opacity-0', 'pointer-events-none');
//             navbar.classList.add('sticky', 'top-0', 'z-50', 'opacity-100', 'pointer-events-auto');
//         },
//         onLeave: () => {
//             navbar.style.transition = 'all 200ms ease-in-out';
//             navbar.style.height = '0';
//             navbar.classList.add('opacity-0', 'pointer-events-none');
//             navbar.classList.remove('sticky', 'top-0', 'z-50', 'opacity-100', 'pointer-events-auto');
//         },
//     });
// }
// Hero section animation
function animateHeroSection() {
    const heroTl = gsap.timeline({
        defaults: {
            ease: "power3.out"
        },
        scrollTrigger: {
            trigger: "#hero-content",
            start: "top 65%",
            toggleActions: "play none none none",
        }
    });

    heroTl.fromTo(
        "#hero-section", {
        opacity: 0
    }, {
        opacity: 1,
        duration: 1
    }
    );

    heroTl.fromTo(
        "#hero-text h1, #hero-text p, #hero-text div", {
        y: 50,
        opacity: 0
    }, {
        y: 0,
        opacity: 1,
        stagger: 0.2,
        duration: 0.8
    },
        "-=0.5"
    );

    heroTl.fromTo(
        "#hero-image", {
        scale: 0.8,
        opacity: 0
    }, {
        scale: 1,
        opacity: 1,
        duration: 1
    },
        "-=0.8"
    );
}
function animateCardsOnScroll(triggerId, scale) {
    const cards = document.querySelectorAll(`${triggerId} .card`);
    const heroTl = gsap.timeline({
        defaults: {
            ease: "power3.out"
        },
        scrollTrigger: {
            trigger: triggerId,
            start: "top 65%",
            toggleActions: "play none none none"
        }
    });
    heroTl.fromTo(
        cards,
        {
            opacity: 0,
            y: 50,
        },
        {
            opacity: 1,
            y: 0,
            duration: 0.8,
            ease: 'power2.out',
            stagger: 0.2,
        }
    );

    // Add hover effect for scale increase
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            gsap.to(card, {
                scale: scale || 1.05,
                duration: 0.3,
                ease: 'power2.inOut',
            });
        });

        card.addEventListener('mouseleave', () => {
            gsap.to(card, {
                scale: 1,
                duration: 0.3,
                ease: 'power2.inOut',
            });
        });
    });
}
function animateProfile() {
    // Create a timeline for the artist profile animation
    const tl = gsap.timeline({
        defaults: {
            ease: "power3.out"
        }
    });

    // Animate the header
    tl.fromTo('#artist-profile-cover', { opacity: 0 }, { opacity: 1, duration: 1 });

    // Animate the bio section
    const bioElements = document.querySelectorAll("#artist-profile h1, #artist-profile p, #artist-profile div");
    tl.fromTo(
        bioElements,
        { y: 30, opacity: 0 },
        { y: 0, opacity: 1, stagger: 0.1, duration: 0.6 },
        "-=0.5"
    );
}
function animateCards(triggerId, scale) {
    const cards = document.querySelectorAll(`${triggerId} .card`);
    const heroTl = gsap.timeline({
        defaults: {
            ease: "power3.out"
        }
    });
    heroTl.fromTo(
        cards,
        {
            opacity: 0,
            y: 50,
        },
        {
            opacity: 1,
            y: 0,
            duration: 0.8,
            ease: 'power2.out',
            stagger: 0.2,
        }
    );

    // Add hover effect for scale increase
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            gsap.to(card, {
                scale: scale || 1.05,
                duration: 0.3,
                ease: 'power2.inOut',
            });
        });

        card.addEventListener('mouseleave', () => {
            gsap.to(card, {
                scale: 1,
                duration: 0.3,
                ease: 'power2.inOut',
            });
        });
    });
}
function animateContactForm() {
    gsap.from("#contact-form", {
        duration: 1,
        opacity: 0,
        y: 50,
        ease: "power3.out"
    });
    gsap.from("#contact-form h2", {
        duration: 0.8,
        opacity: 0,
        y: 30,
        ease: "power3.out"
    });
    gsap.from("#contact-form label", {
        duration: 0.8,
        opacity: 0,
        y: 20,
        ease: "power3.out",
        stagger: 0.2
    });
    gsap.from("#contact-form input, #contact-form textarea, #contact-form button", {
        duration: 0.8,
        opacity: 0,
        y: 20,
        ease: "power3.out",
        stagger: 0.2
    });
}
animateContactForm();
animateProfile();
animateCardsOnScroll('#featured-artists', 1.1);
animateCardsOnScroll('#recent-artwork');
animateCardsOnScroll('#artist-artwork');
animateCards('#art-gallery');
animateCards('#artist-gallery');
animateHeroSection();
function cursorAnimation() {
    let elem = document.querySelector("#main-content");
    elem.addEventListener("mouseenter", function () {
        gsap.to('#cursor', {
            opacity: 1,
            scale: 1
        })
    })
    elem.addEventListener("mouseleave", function () {
        gsap.to('#cursor', {
            opacity: 0,
            scale: 0
        })
    })
    elem.addEventListener("mousemove", function (e) {

        gsap.to('#cursor', {
            x: e.x - elem.getBoundingClientRect().x,
            y: e.y - elem.getBoundingClientRect().y,
            duration: 0.3,
            ease: "power3.out"
        })
    })
}
