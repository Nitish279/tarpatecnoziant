$(document).ready(function () {
  console.log("Hello Nitish The Website is loading....");
  $("#myForm").submit((e) => {
    e.preventDefault();
    console.log("Form Submit button clicked");
    let data = $("#myForm")
      .serializeArray()
      .reduce(function (obj, item) {
        obj[item.name] = item.value;
        return obj;
      }, {});
    console.log("Form Data", data);
  });
  $("#commentForm").validate({
    rules: {
      username: {
        required: true,
        minlength: 2,
      },
      userEmail: {
        required: true,
        email: true,
      },
      userPhone: {
        required: true,
        number: true,
        minlength: 10,
        maxlength: 10,
      },
    },
    messages: {
      username: {
        required: "Please enter a username",
        minlength: "Your username must consist of at least 2 characters",
      },
      email: "Please enter a valid email address",
      userPhone: {
        required: "Please provide a valid Phone Number",
        minlength: "Your Phone Number must be at least 10 characters long",
        maxlength: "Your Phone Number cannot be more than 10 characters",
      },
    },
  });

  $("ul#Scrollspy li a[href^='#']").on("click", function (e) {
    // prevent default anchor click behavior
    e.preventDefault();

    // store hash
    var hash = this.hash;

    // animate
    $("html, body").animate(
      {
        scrollTop: $(hash).offset().top,
      },
      1000,
      function () {
        // when done, add hash to url
        // (default click behaviour)
        window.location.hash = hash;
      }
    );
  });

  //Get the button
  var mybutton = document.getElementById("myBtn");

  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction();
  };

  function scrollFunction() {
    if (
      document.body.scrollTop > 20 ||
      document.documentElement.scrollTop > 20
    ) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }

  $("#myBtn").click((e) => {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, 'slow');
  });

});
