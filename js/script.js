//ABOUT PAGE IMG GALLERY//
let modalId = $('#image-gallery');


$(document)
  .ready(function () {

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when you're at either end of the gallery
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// LEFT AND RIGHT ARROW KEYS TO SCROLL THROUGH IMAGES
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    // e.preventDefault(); // prevent the default action (scroll / move caret)
  });
//END OF ABOUT PAGE IMG GALLERY


//EQUIPMENT PAGE IMAGE PANNELS
$(".panel").addClass("panelShadow");

$(".panel").mouseenter(function (e){
  $(this).addClass("open openActive");
  $(this).removeClass("panelShadow");
});

$(".panel").mouseleave(function (e){
  $(this).removeClass("open openActive panelShadow");
  $(this).addClass("panelShadow");
});
//END OF EQUIPMENT PAGE IMAGE PANNELS


//EQUIPMENT PAGE BACK TO TOP BUTTON
backToTop = document.getElementById("backToTop");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if ((document.documentElement.scrollTop > 1500) && (document.documentElement.scrollTop < 8400)) {
    backToTop.style.opacity = 1;
  }  
  else {
    backToTop.style.opacity = 0;
  }
}

function scrollFunctionHide() {
  if (document.body.scrollTop >= 9000 || document.documentElement.scrollTop >= 9000) {
    backToTop.style.display = "none";
  }
}
scrollFunctionHide();

// When the user clicks on the button, scroll to the top of the document (with offset)
function topFunction() {
  window.scrollTo({top: 700, behavior: "smooth"});
}
//End of equipment page.


//Showreel Page//

//stop video when modal is closed **/ (fucked if I can group them at the min though!!)
$('#modal1').on('hidden.bs.modal', function (e) {
  $('#modal1 iframe').attr("src", $("#modal1 iframe").attr("src"));
});
$('#modal2').on('hidden.bs.modal', function (e) {
  $('#modal2 iframe').attr("src", $("#modal2 iframe").attr("src"));
});
$('#modal3').on('hidden.bs.modal', function (e) {
  $('#modal3 iframe').attr("src", $("#modal3 iframe").attr("src"));
});
$('#modal4').on('hidden.bs.modal', function (e) {
  $('#modal4 iframe').attr("src", $("#modal4 iframe").attr("src"));
});
$('#modal5').on('hidden.bs.modal', function (e) {
  $('#modal5 iframe').attr("src", $("#modal5 iframe").attr("src"));
});
$('#modal6').on('hidden.bs.modal', function (e) {
  $('#modal6 iframe').attr("src", $("#modal6 iframe").attr("src"));
});
$('#modal7').on('hidden.bs.modal', function (e) {
  $('#modal7 iframe').attr("src", $("#modal7 iframe").attr("src"));
});
$('#modal8').on('hidden.bs.modal', function (e) {
  $('#modal8 iframe').attr("src", $("#modal8 iframe").attr("src"));
});
$('#modal9').on('hidden.bs.modal', function (e) {
  $('#modal9 iframe').attr("src", $("#modal9 iframe").attr("src"));
});
$('#modal10').on('hidden.bs.modal', function (e) {
  $('#modal10 iframe').attr("src", $("#modal10 iframe").attr("src"));
});
$('#modal11').on('hidden.bs.modal', function (e) {
  $('#modal11 iframe').attr("src", $("#modal11 iframe").attr("src"));
});
$('#modal12').on('hidden.bs.modal', function (e) {
  $('#modal12 iframe').attr("src", $("#modal12 iframe").attr("src"));
});

//PLAY BUTTON ON VIDEO THUMBNAIL HOVER
$(".fa-play").hover(
  function () {
    // $(this).nextAll().addClass('hoverDark');
    $(this).siblings().find(".carousel-item").addClass('hoverDark');
  }, 
  function () {
    // $(this).nextAll().removeClass('hoverDark');
    $(this).siblings().find(".carousel-item").removeClass('hoverDark');
  }
  );


  //STOPPING THE CAROUSEL FROM PAUSING ON HOVER
  $(".carousel").carousel({
    pause: "false"
  });


  //ADDING NEW INPUT FIELDS FOR STOCK FORM
  $(document).ready(function() {

    $("#addMore").click(function(){ 
        var html = $(".copy").html();
        $(".after-add-more").append(html);
    });

    $("body").on("click",".remove",function(){ 
        $(this).parent().closest(".control-group").remove();
    });
  });

//BOUNCHING ARROW HIDES WHEN SCROLL DOWN
  $(window).scroll(function(){
    $(".arrow").css("opacity", 1 - $(window).scrollTop() / 250);
  });

//TAKES YOU TO AN ID ANCHOR ON EACH PAGE
  $("#aboutBounceBtn").click(function() {
    $('html, body').animate({
        scrollTop: $("#imgGalleryWrapper").offset().top - 100
    }, 2000);
});
//TAKES YOU TO AN ID ANCHOR ON THE PAGE
$("#equipBounceBtn").click(function() {
  $('html, body').animate({
      scrollTop: $("#panel1").offset().top - 100
  }, 2000);
});
//TAKES YOU TO AN ID ANCHOR ON THE PAGE
$("#clientBounceBtn").click(function() {
  $('html, body').animate({
      scrollTop: $("#imgGalleryWrapper").offset().top - 100
  }, 2000);
});
//TAKES YOU TO AN ID ANCHOR ON THE PAGE
$("#showreelBounceBtn").click(function() {
  $('html, body').animate({
      scrollTop: $("#showreelAnchor").offset().top - 80
  }, 2000);
});
//TAKES YOU TO AN ID ANCHOR ON THE PAGE
$("#contactBounceBtn").click(function() {
  $('html, body').animate({
      scrollTop: $("#contactDetails").offset().top + 30
  }, 2000);
});
//TAKES YOU TO AN ID ANCHOR ON THE PAGE
$("#recceBtn").click(function() {
  $('html, body').animate({
      scrollTop: $("#smallRecce").offset().top - 20
  }, 2000);
});
//TAKES YOU TO AN ID ANCHOR ON THE PAGE
$("#heavyliftBtn").click(function() {
  $('html, body').animate({
      scrollTop: $("#heavylift").offset().top + 40
  }, 2000);
});
//TAKES YOU TO AN ID ANCHOR ON THE PAGE
$("#lightliftBtn").click(function() {
  $('html, body').animate({
      scrollTop: $("#lightlift").offset().top + 40
  }, 2000);
});
//TAKES YOU TO AN ID ANCHOR ON THE PAGE
$("#vehicleBtn").click(function() {
  $('html, body').animate({
      scrollTop: $("#carmount").offset().top + 40
  }, 2000);
});
//TAKES YOU TO AN ID ANCHOR ON THE PAGE
$("#lighttetherBtn").click(function() {
  $('html, body').animate({
      scrollTop: $("#lighttether").offset().top + 40
  }, 2000);
});
//TAKES YOU TO AN ID ANCHOR ON THE PAGE
$("#specialsystemsBtn").click(function() {
  $('html, body').animate({
      scrollTop: $("#specialsystems").offset().top + 40
  }, 2000);
});





//ENABLES THE SEND MESSAGE BUTTON IN CONTACT US WHEN INPUTS ARE FILLED IN
function manage() {
  var bt = document.getElementById('contactSendBtnBtn');
  if (nameInput.value != '' && messageInput.value != '' && emailInput.value != '') 
  {
      bt.disabled = false;
  }
  else {
      bt.disabled = true;
  }
}

//UNDISABLES THE SEND MESSAGE BUTTON IN STOCK WHEN INPUTS ARE FILLED IN (this is same as above only with jquery instead of vanilla JS)
function filledIn() {
  let btn = $("#btnStockSubmit");
  let request = $('select').on('change', function() {
    ( $(this).find(":selected").val() );
  });

  if($("#nameInput").val() != '' && $("#emailInput").val() != '' && 
  $(request).val() !== "Stock Section...*" && $("#tcIn").val() != '' && $("#tcOut").val() != '') {

    btn.attr("disabled", false);
  }
  else {
    btn.attr("disabled", true);
  };
  
};


//MOVING THE SELECTED CLASS TO THE CORRECT SELECTED OPTION
$(document).on("change","select",function(){
  $("option[value=" + this.value + "]", this)
  .attr("selected", true).siblings()
  .removeAttr("selected")
});


//MAKING THE TOP LOGO TAKE YOU BACK TO HOME
$("#logo-main").click(function() {
  window.location="index.php";
});


//HERO BG VIDEO
var heroVideo = new vidbg("#heroVideo", {
  mp4: "/CineCopters - 2018 Recap NO SOUND.mp4",
});
