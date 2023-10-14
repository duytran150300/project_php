// login
const toggleForm = () => {
  const container = document.querySelector(".container");
  container.classList.toggle("active");
};

$(document).ready(function () {
  $(".owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    autoplay: true,
    autoplayTimeout: 3000,
    animateOut: "slideOutDown",
    animateOut: "fadeOut",
    animateIn: "flipInX",
    items: 1,
    smartSpeed: 450,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 1,
      },
    },
  });
});
$(document).ready(function () {
  $(".nonloop").owlCarousel({
    center: true,
    items: 2,
    loop: false,
    margin: 10,
    responsive: {
      600: {
        items: 4,
      },
    },
  });
});
$(document).ready(function () {
  $(".owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    autoplay: true,
    autoplayTimeout: 3000,
    animateOut: "slideOutDown",
    animateOut: "fadeOut",
    animateIn: "flipInX",
    items: 1,
    smartSpeed: 450,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 1,
      },
    },
  });
});
$(document).ready(function () {
  $(".nonloop").owlCarousel({
    center: true,
    items: 2,
    loop: false,
    margin: 10,
    responsive: {
      600: {
        items: 4,
      },
    },
  });
});
