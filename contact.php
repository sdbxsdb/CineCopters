
<?php include("phpIncludes/contactMeta.php") ?>
<?php include("phpIncludes/header.php") ?>
<?php include("phpIncludes/nav.php") ?>


<section id="contact">

  <div class="imgContainer">
        <div class=bgImg>
          <div id="title">
            <h1>GET  IN  TOUCH</h1>
          </div>
            <div class="aboutText">
              <p>If you have any questions about -</p>
              <ul>
                <li>Equipment or Additional Services</li>
                <li>Technical Specs</li>
                <li>Feasibility of an Idea</li>
                <li>Stock Footage</li>
              </ul>
              <p> - or would like to book a CineCopters crew, send us an email or give us a call. <br><br> We'd be delighted to hear from you!  </p>
              <div id="contactBounceBtn" class="arrow bounce"><i class="fa fa-angle-down fa-3x" aria-hidden="true"></i></div>
          </div>
        </div>
  </div>


  <div class="container" id="contactDetails">
    <div class="row">
      
      <div class="col">
      <i class="fas fa-paper-plane"></i>
      </div>  

        <div class="col">
        <i class="fas fa-mobile-alt"></i>
        </div>
    </div>

    <div class="row ">
      <div class="col-md">
      <h4>Bookings &amp; Enquiries</h4>
        <a href="mailto:info@cinecopters.co.uk?subject=Drone Filming Services">
        <cite>info@cinecopters.co.uk</cite>
        </a>
        <h4 id="accounts">Accounts</h4>
        <a href="mailto:accounts@cinemedia.ie?subject=Drone Filming Accounts Enquiry">
        <cite>accounts@cinemedia.ie</cite>
        </a>
      </div>


      <div class="col-md">
        <cite>
          Belfast |
          <a href="tel:00442890448286"> +4428 90 4482 86<a>
              <br><br>
              Dublin | 
              <a href="tel:0035314869770">+353 1486 9770</a>
              <!-- <br><br>
              Glasgow | 
              <a href="tel:00441414590259">+44 141 459 0259</a> -->
              <br><br><hr>
              Technical  | 
              <a href="tel:00447540251374">+4475 402 51374</a>
              <br><br>
              Technical  | 
              <a href="tel:00447780586444">+4477 805 86444</a>
        </cite>
      </div>
    </div>
  </div>


  <form id="contactForm" class="container" method="post" action="contactThanks.php">
    <h3>Contact Us</h3>
    <div class="row">
      
      <div class="col-md">
        <div class="form-group">
          <input id="nameInput" type="text" name="name" onkeyup="manage(this)" class="form-control" placeholder="Name *" value="" />
        </div>
        <div class="form-group">
          <input id="emailInput" type="text" name="email" onkeyup="manage(this)" class="form-control" placeholder="Email *" value="" />
        </div>
        <div class="form-group">
          <input type="text" name="theirSubject" class="form-control" placeholder="Subject" value="" />
        </div>
        <div class="form-group">
          <input type="text" name="company" class="form-control" placeholder="Company" value="" />
        </div>
      </div>

      <div id="formAdd" class="col">
        <div class="form-group">
          <textarea id="messageInput" name="message" onkeyup="manage(this)" class="form-control" placeholder="* Please give us as many details as possible (what - where - when and if you know what equipment you'd like to use)."></textarea>
        </div>
      </div>
  </form>

<div id="contactSendBtn" class="container">

<input id="contactSendBtnBtn" type="submit" name="btnSubmit" disabled class="btn btn-success" value="Send Message" />
</div>







</section>


<?php include ("phpIncludes/footer.php") ?>