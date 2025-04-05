window.addEventListener("DOMContentLoaded", () => {
  document.addEventListener("scroll", () => {
    const navbar = document.querySelector(".navbar");
    const aboutMeSection = document.querySelector("#aboutme");
    const contactMeSection = document.querySelector("#contactme");
    const rectAboutMe = aboutMeSection.getBoundingClientRect();
    const rectContactMe = contactMeSection.getBoundingClientRect();

    if (rectAboutMe.top <= 80 && rectAboutMe.bottom >= 70 || rectContactMe.top <= 110 && rectContactMe.bottom >= 70) {
      navbar.classList.add("navbar-scroll");
    } else {
      navbar.classList.remove("navbar-scroll");
    }
  });
});

$(document).ready(function() {
  $('.navbar-collapse').on('show.bs.collapse', function() {
    $('.navbar-toggler').addClass('collapsed');
  });

  $('.navbar-collapse').on('hide.bs.collapse', function() {
    $('.navbar-toggler').removeClass('collapsed');
  });
});

// Initialization for ES Users
import { Input, Ripple, initMDB } from "mdb-ui-kit";

initMDB({ Input, Ripple });