(function ($) {
  var cover = $(".cover"),
    overlay = $("<div/>", { id: "overlay" });

  overlay.appendTo("body");
  overlay.hide();

  cover.find("a").on("click", function (event) {
    var href = $(this).attr("href"),
      img = $("<img>", { src: href, alt: "IMG" });

    overlay.html(img).fadeIn();
    overlay.fadeIn();
    event.preventDefault();
  });

  overlay.on("click", function () {
    $(this).fadeOut();
  });

  $(document).on("keyup", function (event) {
    if (event.which === 27) overlay.fadeOut();
  });

  /////////////MOBILE MENU

  var icon = $(".i-class"),
    mobileMenu = $(".mobileMenu");

  // var windowWidth = $(window).width();
  // if(windowWidth < 526){
  icon.on("click", function () {
    mobileMenu.toggle(1000);
  });
  // }
})(jQuery);

// //Get the button
var mybutton = document.getElementById("myBtn");

// // When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// // When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

////////////////MODAL BOX
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

// Close the Modal
function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides((slideIndex += n));
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
  captionText.innerHTML = dots[slideIndex - 1].alt;
}
