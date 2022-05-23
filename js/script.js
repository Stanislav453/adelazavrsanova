(function ($) {
  var slider = $(".slider"),
    cover = $(".cover");

  cover.children(":not(:last)").hide();

  var interval = setInterval(function () {
    slider
      .children(":last")
      .fadeOut(3000, function () {
        $(this).prependTo(slider);
      })
      .prev()
      .fadeIn(2000);
  }, 2000);

  slider.on("click", function () {
    clearInterval(interval);
  });

  // LIGHT MOX (OVERLAY)
  var cover = $(".cover-1"),
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

  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function () {
    "use strict";

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll(".needs-validation");

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach(function (form) {
      form.addEventListener(
        "submit",
        function (event) {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add("was-validated");
        },
        false
      );
    });
  })();

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

/////////////MOBILE MENU
