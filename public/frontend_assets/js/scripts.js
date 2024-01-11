(function ($) {
    $(document).ready(function () {  
      $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
          $('.navbar__top').addClass('shrink');
        } else {
          $('.navbar__top').removeClass('shrink');
        }
      })

      $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
          $('.form__banner__wrapp').addClass('shrink');
        } else {
          $('.form__banner__wrapp').removeClass('shrink');
        }
      })
  
      $('.carousel__main__slider').owlCarousel({
        margin: 0, autoplay: true, nav: false, dots: true, loop: true,
        responsive: {
          0: { items: 1 },
          500: { items: 1 },
          700: { items: 1 },
          1000: { items: 1 },
          1299: { items: 1 }
        }
      })
      $('.core__value__slider').owlCarousel({
        margin: 24, autoplay: true, nav: true, dots: false, loop: false,
        responsive: {
          0: { items: 1 },
          500: { items: 2 },
          700: { items: 2 },
          1000: { items: 3 },
          1299: { items: 3 }
        }
      })
      $('.program__slider').owlCarousel({
        margin: 24, autoplay: true, nav: true, dots: false, loop: false,
        responsive: {
          0: { items: 1 },
          500: { items: 3 },
          700: { items: 2 },
          1000: { items: 3 },
          1299: { items: 3 }
        }
      })


      const accordionItems = document.querySelectorAll('.accordion-item');
      const image = document.querySelector('.tab__pane__col img');
      accordionItems[0].classList.add('active');
      accordionItems[0].querySelector('.accordion-content').style.display = 'block';
      image.setAttribute('src', accordionItems[0].getAttribute('data-image-src'));
      accordionItems.forEach((item) => {
        const header = item.querySelector('.accordion-header');
        const content = item.querySelector('.accordion-content');
        const imageSrc = item.getAttribute('data-image-src');
        header.addEventListener('click', () => {
          if (!item.classList.contains('active')) {
            accordionItems.forEach((otherItem) => {
              otherItem.classList.remove('active');
              otherItem.querySelector('.accordion-content').style.display = 'none';
            });
            item.classList.add('active');
            content.style.display = 'block';
            image.setAttribute('src', imageSrc);
          }
        });
      });
    })
  })(jQuery)
  