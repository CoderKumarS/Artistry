import './bootstrap';

function handleScrollDirection() {
    let lastScrollTop = 0;
    let ticking = false;
    const navbar = document.querySelector('nav');
    const threshold = 10; // scroll delta threshold

    // window.addEventListener('scroll', function () {
    //     const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    //     if (!ticking) {
    //         window.requestAnimationFrame(function () {
    //             const scrollDelta = scrollTop - lastScrollTop;

    //             if (Math.abs(scrollDelta) > threshold) {
    //                 if (scrollDelta > 0) {
    //                     // Scrolling down
    //                     navbar.style.transition = 'all 200ms ease-in-out';
    //                     navbar.style.height = '0';
    //                     navbar.classList.add('opacity-0', 'pointer-events-none');
    //                     navbar.classList.remove('sticky', 'top-0', 'z-50', 'opacity-100', 'pointer-events-auto');
    //                 } else {
    //                     // Scrolling up
    //                     navbar.style.transition = 'all 200ms ease-in-out';
    //                     navbar.style.height = '';
    //                     navbar.classList.remove('opacity-0', 'pointer-events-none');
    //                     navbar.classList.add('sticky', 'top-0', 'z-50', 'opacity-100', 'pointer-events-auto');
    //                 }

    //                 lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    //             }

    //             ticking = false;
    //         });

    //         ticking = true;
    //     }
    // });
}

handleScrollDirection();
