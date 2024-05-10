
// import Highway from '@dogstudio/highway';

document.addEventListener('DOMContentLoaded', (event) => {
  // Fade
  const toggleMenu = () => {
    const column = document.querySelector('.js-header_col');
    const menu = document.querySelector('.js-header-nav');
    const follow = document.querySelector('.js-follow');
    const header = document.querySelector('.js-header');
    const wrapper = document.querySelector('.js-wrapper');
    const headerSocial = document.querySelector('.js-header-socials');
    column.addEventListener('click', () => {
      if (!menu.classList.contains('active')) {
        menu.classList.add('active');
        header.classList.add('active');
        follow.classList.add('active');
        wrapper.classList.add('active');
        headerSocial.classList.add('active');
      } else {
        menu.classList.remove('active');
        header.classList.remove('active');
        follow.classList.remove('active');
        wrapper.classList.remove('active');
        headerSocial.classList.remove('active');
      }
    });
    window.addEventListener('resize', () => {
      if (window.innerWidth > 968) {
        menu.classList.remove('active');
        header.classList.remove('active');
        follow.classList.remove('active');
        wrapper.classList.remove('active');
        headerSocial.classList.remove('active');
      }
    });
  };
  toggleMenu();

  const clients = document.querySelectorAll('.clients-list__item');
  const showClientsTitle = () => {
    const clientsTitle = document.querySelector('.clients__title_hidden');
    if (clients.length < 5) {
      clientsTitle.style.display = 'block';
      clientsTitle.style.marginBottom = 32 + 'px';
    }
  }
  if (clients.length) {
    showClientsTitle();
  }


  let time = document.querySelector('.contact-card__time');
  if (time) {
    function updateClock(timezone, elementId) {
      var currentTime = new Date().toLocaleTimeString('en-US', { timeZone: timezone });
      document.getElementById(elementId).textContent = currentTime;
    }

    // Update the clocks every second
    setInterval(function () {
      updateClock('Europe/London', 'london');
      updateClock('America/Los_Angeles', 'portland');
      updateClock('America/Toronto', 'toronto');
    }, 1000);

    // Initial update
    updateClock('Europe/London', 'london');
    updateClock('America/Los_Angeles', 'portland');
    updateClock('America/Toronto', 'toronto');
  }

  const parallax = new Ukiyo('[data-parallax]', {
    externalRAF: true,
    scale: 1.2,
    speed: 1.8,
    willChange: true,
  });
  window.addEventListener('resize', () => {
    parallax.reset();
  });

  /**
   * smooth scroll
   */
  const lenis = new Lenis({
    duration: 0.75,
    smoothWheel: true,
    smoothTouch: false,
  });

  function raf(time) {
    parallax.animate();

    lenis.raf(time);
    requestAnimationFrame(raf);
  }

  requestAnimationFrame(raf);
  !(function () {
    setTimeout(() => {
      const blocks = document.querySelectorAll('.js-scroll');

      [].forEach.call(blocks, (item) => {
        function onScrollSlider() {
          if (
            item.getBoundingClientRect().top - window.innerHeight <=
            (item.offsetHeight * -1) / 4 &&
            !item.classList.contains('in-view')
          ) {
            item.classList.remove('js-scroll');
            item.classList.add('in-view');
          }
        }
        onScrollSlider();
        document.addEventListener('scroll', onScrollSlider);
      });
    }, 700);
  })();

});



console.clear();

const follower = document.querySelector(".js-follower");
if (follower) {
  gsap.set(follower, {
    opacity: 1,
    scale: 0,
    transformOrigin: "center center",
    xPercent: -50,
    yPercent: -50
  });
  const xTo = gsap.quickTo(follower, "x", { ease: "power3" });
  const yTo = gsap.quickTo(follower, "y", { ease: "power3" });

  const box = document.querySelector(".video");
  // const boxPosition = box.getBoundingClientRect().x;
  const boxLeft = box.getBoundingClientRect().x;
  const boxTop = box.offsetTop;

  box.addEventListener("mousemove", (e) => {
    console.log(e.pageY, e.clientY, boxTop);
    xTo(e.clientX - boxLeft);
    yTo(e.pageY - boxTop);
  });

  box.addEventListener("mouseenter", () => {
    gsap.to(follower, {
      duration: 0.3,
      opacity: 1,
      scale: 1,
      transformOrigin: "center center"
    });
  });

  box.addEventListener("mouseleave", () => {
    gsap.to(follower, {
      duration: 0.3,
      opacity: 0,
      scale: 0,
      transformOrigin: "center center"
    });
  });
}


$(document).ready(function () {
  $(function () {
    $('.video-item').magnificPopup({
      // 
      type: 'iframe',
      mainClass: 'mfp-with-zoom mfp-img-mobile',
      disableOn: 700,
      iframe: {
        markup: '<div class="mfp-iframe-scaler">' +
          '<div class="mfp-close"></div>' +
          '<iframe class="mfp-iframe tet" frameborder="0" title="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>' +
          '</div>', // HTML markup of popup, `mfp-close` will be replaced by the close button
      }
    });
  });


  $(document).ready(function () {
    // $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
    //   disableOn: 700,
    //   type: 'iframe',
    //   mainClass: 'mfp-fade',
    //   removalDelay: 160,
    //   preloader: false,

    //   fixedContentPos: false
    // });
  });

});

