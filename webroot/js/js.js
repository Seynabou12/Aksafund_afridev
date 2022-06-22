
  
  $(function() {
    //Global - partout où on veut utiliser select2
    $('.select2').select2();
  });
  $('.slick-slider1').slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 3,
      adaptiveHeight: false,
      arrows: true,
      prevArrow: '<button class="slick-arrow slick-prev slick-prev1"></button>',
      nextArrow: '<button class="slick-arrow slick-next slick-next1"></button>',
      responsive: [
          {
          breakpoint: 1040,
          settings: {
              slidesToShow: 1,
              infinite: true
              }
          },
          {
          breakpoint: 1040,
          settings: {
              slidesToShow: 1,
              infinite: true
              }
          },
          {
          breakpoint: 500,
          settings: {
              slidesToShow: 1,
              infinite: true
              }
          }

      ]
  });
  $('.slick-slider2').slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 3,
      adaptiveHeight: false,
      arrows: true,
      prevArrow: '<button class="slick-arrow slick-prev slick-prev1"></button>',
      nextArrow: '<button class="slick-arrow slick-next slick-next1"></button>',
      responsive: [
          {
          breakpoint: 1040,
          settings: {
              slidesToShow: 1,
              infinite: true
              }
          },
          {
          breakpoint: 1040,
          settings: {
              slidesToShow: 1,
              infinite: true
              }
          },
          {
          breakpoint: 500,
          settings: {
              slidesToShow: 1,
              infinite: true
              }
          }

      ]
  });