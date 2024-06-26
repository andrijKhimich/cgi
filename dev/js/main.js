
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


  const timeElement = document.querySelector('.contact-card__time');
  if (timeElement) {
    function updateClock(timezone, elementId) {
      const currentTime = new Date().toLocaleTimeString('en-US', { timeZone: timezone });
      const element = document.getElementById(elementId);
      if (element) {
        element.textContent = currentTime;
      }
    }

    // Update the clocks every second
    setInterval(() => {
      updateClock('Europe/London', 'london');
      updateClock('America/Los_Angeles', 'portland');
      updateClock('Asia/Kolkata', 'mumbai');
    }, 1000);

    // Initial update
    updateClock('Europe/London', 'london');
    updateClock('America/Los_Angeles', 'portland');
    updateClock('Asia/Kolkata', 'mumbai');
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

  const gallery = document.querySelector('.gallery');
  if (gallery) {
    const splide = new Splide('.gallery', {
      type: 'loop',
      drag: 'free',
      perPage: 5,
      pagination: false,
      arrows: false,
      autoWidth: false,
      speed: 5000,
      easing: 'linear',
      breakpoints: {
        968: {
          perPage: 3,
        },
        600: {
          perPage: 2,
        },
      },
    });

    splide.mount();
  }

  const singlePage = document.querySelector('.single');
  if (singlePage) {
    const loadVimeoPlayer = () => {
      const iframe = document.querySelector('#vimeo-player');
      const preUrlPath = `https://player.vimeo.com/video/`;
      const urlPath = `?title=0&byline=0&portrait=0&transparent=1&controls=0&loop=1&responsive=1`;
      let src = !!iframe ? iframe.getAttribute('data-src') : '';
      if (!!src && !!iframe) {

        let videoUrlArray = src.split('/');
        let videoId = videoUrlArray.length ? videoUrlArray[3] : '';

        if (!!videoId) {
          iframe.setAttribute('src', `${preUrlPath}${videoId}${urlPath}`);
          iframe.removeAttribute('data-src');
          document.querySelector('.video-toggle').classList.add('enable-toggle');

          return true;
        }
      }
      return false;
    }
    loadVimeoPlayer();
    const togglePlayingVideo = () => {
      const videoBtn = document.querySelectorAll('.js-play-video');
      const iframe = document.querySelector('#vimeo-player');
      const overlay = document.querySelector('.video-overlay');
      const close = document.querySelector('.close');
      const player = new Vimeo.Player(iframe);

      videoBtn.forEach((btn) => {
        btn.addEventListener('click', () => {
          overlay.classList.add('active')
          iframe.classList.add('active');
          btn.classList.add('hidden');
          if (player.origin !== '*') {
            setTimeout(function () {
              player.play();
            }, 500)
          }
        });
      })

      close.addEventListener('click', () => {
        if (overlay.classList.contains('active')) {
          overlay.classList.remove('active');
          iframe.classList.remove('active');
          videoBtn.forEach((btn) => {
            btn.classList.remove('hidden');
          })
          player.pause();

        } else {
          overlay.classList.add('active');
          iframe.classList.add('active');
          videoBtn.forEach((btn) => {
            btn.classList.add('hidden');
          })
        }
      });
      player.on('play', () => onPlay(videoBtn));
      player.on('pause', () => onPause(videoBtn));
    }
    togglePlayingVideo();
  }

});

const follower = document.querySelector(".js-follower");
const container = document.querySelector(".video");

if (follower && container) {
  container.addEventListener("mouseenter", (e) => {
    gsap.set(follower, {
      duration: 0.8,
      opacity: 0, // Initially hide the follower
      scale: 0,
      transformOrigin: "center center",
      xPercent: -50,
      yPercent: -50,
      ease: "power3"
    });
  });

  container.addEventListener("mousemove", (e) => {
    const containerRect = container.getBoundingClientRect();
    const mouseX = e.clientX - containerRect.left; // Calculate relative x position within container
    const mouseY = e.clientY - containerRect.top; // Calculate relative y position within container

    gsap.to(follower, {
      duration: 0.8,
      x: mouseX,
      y: mouseY,
      opacity: 1, // Make the follower visible
      scale: 1,
      transformOrigin: "center center",
      ease: "power3"
    });
  });

  container.addEventListener("mouseleave", () => {
    gsap.to(follower, {
      duration: 0.8,
      opacity: 0,
      scale: 0,
      ease: "power3"
    });
  });
}


$(document).ready(function () {
  if ($('.video-item').length) {

    $('.gallery__list').each(function () {
      $(this).magnificPopup({
        delegate: 'a',
        type: 'image',
        mainClass: 'mfp-fade',
        removalDelay: 1000,
        gallery: {
          enabled: true
        },
        callbacks: {
          change: function () {
            if (this.isOpen) {
              this.wrap.addClass('mfp-open');
            }
          }
        }
      });
    });
  }

});

