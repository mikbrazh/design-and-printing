// START OF THE FILE
// ======================================================================
$(function() {

// FOREACH BY TODD MOTTO
// ======================================================================
  /*
   * forEach implementation for Objects/NodeLists/Arrays, automatic type loops and context options
   *
   * @private
   * @author Todd Motto
   * @link https://github.com/toddmotto/foreach
   * @param {Array|Object|NodeList} collection - Collection of items to iterate, could be an Array, Object or NodeList
   * @callback requestCallback      callback   - Callback function for each iteration.
   * @param {Array|Object|NodeList} scope=null - Object/NodeList/Array that forEach is iterating over, to use as the this value when executing callback.
   * @returns {}
   */
  var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

// ГАМБУРГЕР
// ======================================================================
  // Инициализатор гамбургера
  var hamburgers = document.querySelectorAll('.hamburger');

    if (hamburgers.length > 0) {
      forEach(hamburgers, function(hamburger) {
        hamburger.addEventListener('click', function() {

          this.classList.toggle('is-active');

          // Переключение состояния гамбургера при нажатии на него
          if ( document.querySelector('body').style.overflowY != 'hidden' )
          {
            document.querySelector('body').style.overflowY = 'hidden';
            document.querySelector('.scroll-top').classList.add('this-disabled');
          }
          else 
          {
            document.querySelector('body').style.overflowY = 'visible';
            document.querySelector('.scroll-top').classList.remove('this-disabled');
          }
        }, false);
      });
    }

  // Переключение гамбургера при нажатии на .site-overlay OPENED
  $('.site-overlay').on('click', function()
  {
    if ( $('.hamburger').hasClass('is-active') )
    {
      $('.hamburger').removeClass('is-active');
    }

    // $('body').toggleClass('scroll-disabled');

    if ( document.querySelector('body').style.overflowY != 'hidden' )
    {
      document.querySelector('body').style.overflowY = 'hidden';
      document.querySelector('.scroll-top').classList.add('this-disabled');
    }
    else
    {
      document.querySelector('body').style.overflowY = 'visible';
      document.querySelector('.scroll-top').classList.remove('this-disabled');
    }
  });

// КАРУСЕЛИ
// ======================================================================
// Инициализаторы каруселей
  $('.owl-carousel--1').owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    responsive: {
        0: {
          items: 1
        },
        540: {
          items: 2
        },
        768: {
          items: 3
        },
        992: {
          items: 3
        },
    }
  });

  $('.owl-carousel--2').owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    navClass: [
      'nav-right',
      'nav-left'
    ],
    navText: [
      '<i class="fa fa-angle-right"></i>',
      '<i class="fa fa-angle-left"></i>'
    ],
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 2
      },
      992: {
        items: 3
      },
    }
  });

// СОБЫТИЯ ПРИ СКРОЛЛИНГЕ
// ======================================================================
  $(window).scroll(function()
  {
     // Появление/перемещение кнопки прокрутки экрана наверх
     if ( $(window).scrollTop() > 120 ) {
      $('.scroll-top').addClass('scroll-top--active');
    }
    else {
      $('.scroll-top').removeClass('scroll-top--active');
    }

    // Сбор числовых значений размера экрана и документа
    var clientHeight = document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.clientHeight;
    var documentHeight = document.documentElement.scrollHeight ? document.documentElement.scrollHeight : document.body.scrollHeight;
    var scrollTop = window.pageYOffset ? window.pageYOffset : (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);

    // Перемещение кнопки прокрутки экрана наверх при достижении конца документа (+100 - с учетом высоты, исчезающей адресной строки в Chrome)
    if( (documentHeight - clientHeight) <= scrollTop + 100 ) {
      $('.scroll-top').addClass('scroll-top--bottom-position');
    }
    else {
      $('.scroll-top').removeClass('scroll-top--bottom-position');
    }

    // Появление гамбургера другого цвета
    if ( $(window).scrollTop() > 1200 ) {
      $('.hamburger--bright').addClass('hamburger--disabled');
      $('.hamburger--dark').removeClass('hamburger--disabled');
    }
    else {
      $('.hamburger--bright').removeClass('hamburger--disabled');
      $('.hamburger--dark').addClass('hamburger--disabled');
    }
  });

// КНОПКА ПРОКРУТКИ ЭКРАНА НАВЕРХ
// ======================================================================
  // Прокрутка экрана наверх при нажатии на кнопку прокрутки экрана наверх
  $('.scroll-top').click( function(){
    $('html, body').animate({
        scrollTop: 0
      }, 'slow');

      return false;
  });

// ПЕРЕМЕЩЕНИЕ ПО МЕНЮ
// ======================================================================
  $(document).ready(function(){

    $('.main-header__nav, .pushy-nav').on('click', 'a', function (event) {
      event.preventDefault();
      var id  = $(this).attr('href'),
      top = $(id).offset().top;
      $('body,html').animate({scrollTop: top}, 700);

      if ( $('.pushy').hasClass('pushy-left') ) {
        $('body').removeClass('pushy-open-left');

        if ( $('.hamburger').hasClass('is-active') )
        {
          $('.hamburger').removeClass('is-active');
        }

        if ( $(this).hasClass('pushy-nav__link') )
        {
          if ( document.querySelector('body').style.overflowY != 'hidden' )
          {
            document.querySelector('body').style.overflowY = 'hidden';
          }
          else
          {
            document.querySelector('body').style.overflowY = 'visible';
          }
        }
      }
      else
      {
        $('body').removeClass('pushy-open-right');

        if ( $('.hamburger').hasClass('is-active') )
        {
          $('.hamburger').removeClass('is-active');
        }

        if ( $(this).hasClass('pushy-nav__link') )
        {
          if ( document.querySelector('body').style.overflowY != 'hidden' )
          {
            document.querySelector('body').style.overflowY = 'hidden';
          }
          else
          {
            document.querySelector('body').style.overflowY = 'visible';
          }
        }
      }
    });
  });
  // Перемещение по документу при взаимодействии с меню CLOSED

  // Инициализатор Magnific-Popup OPENED
  $('.show-popup').magnificPopup(
  {
    type: 'inline',
    removalDelay: 500, //delay removal by X to allow out-animation
    callbacks:
    {
      beforeOpen: function()
      {
        this.st.mainClass = this.st.el.attr('data-effect');
      },
      open: function()
      {
        document.querySelector('html').style.marginRight = '0'; // Убираем дергание экрана. Компинсация скролла.
        document.querySelector('body').style.overflowY = 'scroll'; // Убираем дергание экрана. Компинсация скролла.
        document.querySelector('.scroll-top').classList.add('this-disabled');
      },
      close: function()
      {
        document.querySelector('body').style.overflowY = 'visible'; // Убираем дергание экрана. Компинсация скролла.
        document.querySelector('.scroll-top').classList.remove('this-disabled');
      }
    },
    midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
  });
  // Инициализатор Magnific-Popup CLOSED

  // Инициализатор Magnific-Popup OPENED
  $('.show-feedback-popup').magnificPopup(
    {
      type: 'inline',
      removalDelay: 500, //delay removal by X to allow out-animation
      callbacks:
      {
        beforeOpen: function()
        {
          this.st.mainClass = this.st.el.attr('data-effect');
        },
        open: function()
        {
          document.querySelector('html').style.marginRight = '0'; // Убираем дергание экрана. Компинсация скролла.
          document.querySelector('body').style.overflowY = 'scroll'; // Убираем дергание экрана. Компинсация скролла.
          document.querySelector('.scroll-top').classList.add('this-disabled');
        },
        close: function()
        {
          document.querySelector('body').style.overflowY = 'visible'; // Убираем дергание экрана. Компинсация скролла.
          document.querySelector('.scroll-top').classList.remove('this-disabled');
        }
      },
      midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
    });
    // Инициализатор Magnific-Popup CLOSED


// AJAX
// ======================================================================

// Объявление попап-функций. Плагин Magnific Popup
var openSuccessPopup = function() {
  $.magnificPopup.open({
    items: { src: '#success-popup' },
    type: 'inline',
    fixedContentPos: false,
    fixedBgPos: true,
    overflowY: 'auto',
    closeBtnInside: true,
    preloader: false,
    midClick: true,
    removalDelay: 300,
    mainClass: 'my-mfp-zoom-in'
  });
};

var openFailPopup = function() {
  $.magnificPopup.open({
    items: { src: '#fail-popup' },
    type: 'inline',
    fixedContentPos: false,
    fixedBgPos: true,
    overflowY: 'auto',
    closeBtnInside: true,
    preloader: false,
    midClick: true,
    removalDelay: 300,
    mainClass: 'my-mfp-zoom-in'
  });
};

// Функция сброса формы
var resetForm = function() {
  $('#form-email, #form-call').trigger('reset');
};

// Функции отслеживания событий
var submitListener = function() {
  $('#form-email, #form-call').on("submit", sendAjax);
  return false;
};

// Аяксовая отправка форм
var sendAjax = function(event) {
  event.preventDefault();
  var submitButton = $(this).find('button[type="submit"]');
  submitButton.attr('disabled', '');
  var
    form   = $(this),
    url    = '..//' + form.attr('action'),
    data   = form.serialize(),
    result = $.ajax({
      url: url,
      type: 'POST',
      dataType: 'text',
      data: data
    })
    .done(function() {
      console.log("success");
      openSuccessPopup();
      resetForm();
    })
    .fail(function() {
      console.log("error");
      openFailPopup();
    })
    .always(function() {
      submitButton.removeAttr('disabled');
    });
};

// Инилизация функций
submitListener();


// END OF THE FILE
// ======================================================================
});