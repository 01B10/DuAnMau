var rg = /Trang-Chu|Trang-Chu\w./;

if (
  rg.exec(window.location.href) ||
  window.location.href == "http://localhost/BaseProject/"
) {
  let slideIndex = 0;
  let nav = document.querySelector("nav");

  window.onscroll = () => {
    if (window.scrollY > 150) {
      nav.classList.add("activeHead");
    } else {
      nav.classList.remove("activeHead");
    }
  };

  showSlides();

  function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
      dots[i].style.backgroundColor = "#bbb";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
      slideIndex = 1;
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].style.backgroundColor = "#717171";
    setTimeout(showSlides, 2000);
  }

  let slide = 1;
  autoSlides(slide);

  // Next/previous controls
  function plusSlides(n) {
    autoSlides((slide += n));
  }

  // Thumbnail image controls
  function currentSlide(n) {
    autoSlides((slide = n));
  }

  function autoSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
      slide = 1;
    }
    if (n < 1) {
      slide = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace("active", "");
    }
    slides[slide - 1].style.display = "block";
    dots[slide - 1].className += " active";
  }
}
