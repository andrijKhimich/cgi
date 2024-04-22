
document.addEventListener('DOMContentLoaded', (event) => {
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
    console.log(clients.length);
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



  //   const header = document.querySelector('.header');
  //   const mainWrapper = document.querySelector('.main-wrap');

  //   const setWrapperPadding = () => {
  //     let headerHeight = header.offsetHeight; // Assuming header is a valid element
  //     mainWrapper.style.paddingTop = headerHeight + 'px';
  //   };

  //   setWrapperPadding();
  //   window.addEventListener('resize', () => {
  //     setWrapperPadding();
  //   });

  //   let string = document.querySelectorAll('.wpml-ls-native');
  //   if (string) {
  //     string.forEach((str) => {
  //       let length = 2;
  //       let trimmedString = str.textContent.substring(0, length);
  //       str.innerHTML = trimmedString;
  //     })
  //   }



  //   $(".js-link_more").click(function () {
  //     $(this).prev('.read-more-content').slideToggle();
  //     $(this).toggleClass("open");
  //     if ($(this).hasClass("open")) {
  //       $(this).html("Згорнути");
  //     } else {
  //       $(this).html("Читати далі");
  //     }
  //   });

  //   const createCustomCheckbox = () => {
  //     let checkbox = $('<span>').addClass('checkbox');
  //     let wrapper = $('.form__footer .wpcf7-list-item-label');
  //     checkbox.insertBefore(wrapper);
  //   }

  //   createCustomCheckbox();

  //   // open/close form popup
  //   $('.js-open-popup').click(function (e) {
  //     e.preventDefault();
  //     let activeLink = $(this).attr('data-href');
  //     $('.overlay').fadeIn();
  //     $('#' + activeLink).fadeIn();
  //     $('body').addClass('noscroll');
  //   });

  //   $('.js-close').click(function (e) {
  //     e.preventDefault();
  //     $('.overlay').fadeOut();
  //     $('.js-form-popup').fadeOut();
  //     $('.js-popup-success').fadeOut();
  //     $('.popup').fadeOut();
  //     $('body').removeClass('noscroll');
  //   });


  //   // $('.js-open-checked-popup').click(function (e) {
  //   //   e.preventDefault();
  //   //   let activeLink = $(this).attr('data-href');
  //   //   var targetValue = $(this).data('val');
  //   //   $('.overlay').fadeIn();
  //   //   $('#' + activeLink).fadeIn();
  //   //   $('body').addClass('noscroll');
  //   //   $('.partners-card__header input[type="radio"]').each(function () {
  //   //     if ($(this).val() === targetValue) {
  //   //       $(this).prop('checked', !$(this).prop('checked'));
  //   //     }
  //   //   });

  //   // });

  //   const checkValidation = function () {
  //     let notValid = $('.wpcf7-not-valid');
  //     if (notValid.length > 0 && 'input[type="checkbox"]:not(:checked)') {
  //       $('input[type="submit"]').addClass('disabled');
  //     } else {
  //       $('input[type="submit"]').removeClass('disabled');
  //     }
  //   }

  //   $(".wpcf7-form-control").on("blur", function () {
  //     checkValidation();
  //   });

  //   const showSuccessPopup = () => {
  //     $('.js-popup-success').fadeIn();
  //     $('.js-form-popup').fadeOut();
  //   }

  //   $('input[type="checkbox"]').on("change", function () {
  //     setTimeout(() => {
  //       checkValidation();
  //     }, 10);
  //   });

  //   const formPopup = document.querySelector('.popup form');
  //   formPopup.addEventListener(
  //     'wpcf7mailsent',
  //     function (event) {
  //       showSuccessPopup();
  //     },
  //     false
  //   );
  // });

  // $(window).load(function () {
  //   $(".js-phone").inputmask("+380 ## ### ## ##", { "placeholder": "0", 'clearMaskOnLostFocus': false });
});
