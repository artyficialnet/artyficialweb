$(document).ready(function () {
  const docLanguage = document.children[0].lang;
  $("#testimonial-carousel").owlCarousel({
    items: 1,
    itemsDesktop: [1000, 1], //5 items between 1000px and 901px
    itemsDesktopSmall: [900, 1], // betweem 900px and 601px
    itemsTablet: [600, 1],
    itemsMobile: [479, 1],
    pagination: true,
  });
  $("#home-slider").owlCarousel({
    items: 1,
    itemsDesktop: [1000, 1], //5 items between 1000px and 901px
    itemsDesktopSmall: [900, 1], // betweem 900px and 601px
    itemsTablet: [600, 1],
    itemsMobile: [479, 1],
    pagination: false,
    navigation: true,
    navigationText: [
      "<i class='ion-ios-arrow-left'></i>",
      "<i class='ion-ios-arrow-right'></i>",
    ],
  });

  /* Navigation Menu*/
  let offsettop = $(".navbar").offset().top;
  if (offsettop > 50) {
    $(".navbar").addClass("colored-nav");
    $(".navbar").addClass("gradient-violat");
    $("#scroll-top-div").fadeIn("500");
  } else {
    $(".navbar").removeClass("colored-nav");
    $(".navbar").removeClass("gradient-violat");
    $("#scroll-top-div").fadeOut("500");
  }
  let num = 50; //number of pixels before modifying styles

  $(window).bind("scroll", function () {
    if ($(window).scrollTop() > num) {
      $(".navbar").addClass("colored-nav");
      $(".navbar").addClass("gradient-violat");
      $("#scroll-top-div").fadeIn("500");
    } else {
      $(".navbar").removeClass("colored-nav");
      $(".navbar").removeClass("gradient-violat");
      $("#scroll-top-div").fadeOut("500");
    }
  });

  // Add smooth scrolling to all links
  $(".navbar-nav li a").on("click", function (event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $("html, body").animate(
        {
          scrollTop: $(hash).offset().top,
        },
        800,
        function () {
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        }
      );
    } // End if
  });

  /****************************BACK TO TOP************************************/
  $("#scroll-top-div, .footer-end-line").on("click", function (e) {
    e.preventDefault();
    $("html,body").animate(
      {
        scrollTop: 0,
      },
      700
    );
  });

  /* Send Contact FORM */
  $("form.contact-form").submit(function (event) {
    event.preventDefault();

    const formData = {
      name: $("#name").val(),
      email: $("#email").val(),
      subject: $("#subject").val(),
      message: $("#message").val(),
    };

    $.ajax({
      type: "POST",
      url: "./includes/formProcessor.php",
      data: formData,
      dataType: "json",
      encode: true,
    })
      .done( () => {

        if(docLanguage=="es"){
          $(".thankyou")
          .fadeOut()
          .html("<h3>Gracias!</h3><h4>- Mensaje enviado -</h4>")
          .fadeIn();
        }else{
          $(".thankyou")
          .fadeOut()
          .html("<h3>Thank you!</h3><h4>- Message sent -</h4>")
          .fadeIn();
        }
        
      })
      .fail((xhr, textStatus, errorThrown) => {
        console.error(xhr.status + " : " + xhr.statusText);
        console.error(textStatus);
        console.error(errorThrown);
      });
  });

});
