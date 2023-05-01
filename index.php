<?php require_once('./includes/header.php'); ?>

<section id="introduction" class="gradient-violat padding-top-90 home-slider">
  <div id='stars'></div>
  <div id="home-slider" class="owl-carousel">
    <div>
      <div class="sliding-card-with-bottom-image text-center padding-top-90">
        <h2 class="cta-heading text-white"><?php echo $trans['welcome1']; ?></h2>
        <p class="text-white slider-para"><?php echo $trans['welcome1l1']; ?></p>
        <p class="text-white slider-para"> </p>
        <div class="image-container text-center sm-display-none">
          <img class="img-responsive" src="images/mockuo2.png" alt="">
        </div>
      </div>
    </div>

    <div>
      <div class="container">
        <div class="row">
          <div class="image-right-slide-bg clearfix" style="background-image:url(images/mockuo.png)">
            <div class="col-md-12">
              <h2 class="cta-heading text-white"><?php echo $trans['welcome2']; ?></h2>
              <p class="text-white slider-para"><?php echo $trans['welcome2l1']; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="feature" class="padding-top-bottom-120 bg-image-fit-50" style="background:url(images/1_back.png)">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="feature-wiget">
          <div class="icon-wraper">
            <i class="ion-android-person-add"></i>
          </div>
          <div class="content">
            <h4 class="bottom-line"><?php echo $trans['feature_t1']; ?></h4>
            <p><?php echo $trans['feature_c1']; ?></p>
          </div>
        </div>
        <div class="feature-wiget">
          <div class="icon-wraper">
            <i class="ion-android-hand"></i>
          </div>
          <div class="content">
            <h4 class="bottom-line"><?php echo $trans['feature_t2']; ?></h4>

            <ion-icon name="accessibility-outline"></ion-icon>
            <p><?php echo $trans['feature_c2']; ?></p>
          </div>
        </div>
        <div class="feature-wiget">
          <div class="icon-wraper">
            <i class="ion-android-phone-portrait"></i>
          </div>
          <div class="content">
            <h4 class="bottom-line"><?php echo $trans['feature_t3']; ?></h4>
            <p><?php echo $trans['feature_c3']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="services" class="padding-top-90">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <img class="img-responsive sm-display-none" src="images/hand_phone.png" alt="">
      </div>
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-6">
            <div class="heading-wraper text-center margin-bottom-80">
              <h4><?php echo $trans['service_title']; ?></h4>
              <hr class="heading-devider gradient-orange">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <h5 class="service-title"><?php echo $trans['service_t1']; ?></h5>
            <p class="services-content margin-bottom-25"><?php echo $trans['service_c1']; ?></p>
          </div>
          <div class="col-md-6 col-sm-6">
            <h5 class="service-title"><?php echo $trans['service_t2']; ?></h5>
            <p class="services-content margin-bottom-25"><?php echo $trans['service_c2']; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <h5 class="service-title"><?php echo $trans['service_t3']; ?></h5>
            <p class="services-content margin-bottom-25"><?php echo $trans['service_c3']; ?></p>
          </div>
          <div class="col-md-6 col-sm-6">
            <h5 class="service-title"><?php echo $trans['service_t4']; ?></h5>
            <p class="services-content margin-bottom-25"><?php echo $trans['service_c4']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="cta" class="gradient-violat cta padding-top-bottom-90">

  <div id='stars'></div>
  <div id='stars2'></div>
  <div id='stars3'></div>

  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h3 class="cta-heading text-white"><?php echo $trans['power_message_a']; ?> </h3>
        <p class="text-white"><?php echo $trans['power_message_a1']; ?> </p>
      </div>
    </div>
  </div>
</section>

<section id="customer-support" class="overflow-x-hidden">
  <div class="row">
    <div class="col-md-6">
      <div class="image-wraper">
        <img class="img-responsive" src="images/support.jpg" alt="">
      </div>
    </div>
    <div class="col-md-5">
      <div class="customer-support-content padding-top-bottom-120 sm-padding-top-bottom-50-75">
        <h4><?php echo $trans['support_title']; ?></h4>
        <p class="margin-top-bottom-30"><?php echo $trans['support_content']; ?></p>
        <a class="btn btn-orange border-none btn-rounded-corner" href="https://api.whatsapp.com/send?phone=+573138408816&text=Support%20request%20from%20Website" target="_blank"><?php echo $trans['support_action']; ?><span class="icon-on-button"><i class="ion-ios-arrow-thin-right"></i></span></a>
      </div>
    </div>
  </div>
</section>

<section id="testimonial" class="testimonial-section padding-top-bottom-90 gradient-violat">
  <div class="container">
    <div class="heading-wraper text-center hide">
      <h4 class="text-white"><?php echo $trans['testim_title']; ?></h4>
      <hr class="heading-devider gradient-orange">
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div id="testimonial-carousel" class="owl-carousel">
          <div>
            <div class="testimonial-container">
              <div class="client-details text-center">
                <img src="images/t-1.png" alt="">
                <h5 class="client-name"><?php echo $trans['testim_t1']; ?></h5>
                <p class="client-designation"><?php echo $trans['testim_t1d']; ?></p>
              </div>
              <div class="testimonial-content">
                <p><i class="ion-quote"></i></p>
                <p class="testimonial-speech"><?php echo $trans['testim_c1']; ?></p>
              </div>
            </div>
          </div>
          <div>
            <div class="testimonial-container">
              <div class="client-details text-center">
                <img src="images/t-2.png" alt="">
                <h5 class="client-name"><?php echo $trans['testim_t2']; ?></h5>
                <p class="client-designation"><?php echo $trans['testim_t2d']; ?></p>
              </div>
              <div class="testimonial-content">
                <p><i class="ion-quote"></i></p>
                <p class="testimonial-speech"><?php echo $trans['testim_c2']; ?></p>
              </div>
            </div>
          </div>
          <div>
            <div class="testimonial-container">
              <div class="client-details text-center">
                <img src="images/t-3.png" alt="">
                <h5 class="client-name"><?php echo $trans['testim_t3']; ?></h5>
                <p class="client-designation"><?php echo $trans['testim_t3d']; ?></p>
              </div>
              <div class="testimonial-content">
                <p><i class="ion-quote"></i></p>
                <p class="testimonial-speech"><?php echo $trans['testim_c3']; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="contactus" class="padding-top-bottom-120 contact">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="row thankyou">
          <div class="col-md-12 text-center margin-bottom-30">
            <h2 class="text-upper"><?php echo $trans['contact_title']; ?></h2>
            <p><?php echo $trans['contact_tagline']; ?></p>
          </div>
          <form class="contact-form">

            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" id="name" placeholder="<?php echo $trans['contact_name_tag']; ?>">
              </div>
              <div class="form-group">
                <input required type="email" class="form-control" id="email" placeholder="<?php echo $trans['contact_email_tag']; ?>">
              </div>
              <div class="form-group">
                <select class="form-control" id="subject" name="subject">
                  <option value="notSelected"><?php echo $language == "es" ? "- Por favor seleccione un motivo -" : "- Please select a Subject -"; ?> </option>
                  <option value="<?php echo $trans['contact_subject_a']; ?>"><?php echo $trans['contact_subject_a']; ?></option>
                  <option value="<?php echo $trans['contact_subject_b']; ?>"><?php echo $trans['contact_subject_b']; ?></option>
                  <option value="<?php echo $trans['contact_subject_c']; ?>"><?php echo $trans['contact_subject_c']; ?></option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <textarea class="form-control" rows="6" id="message" placeholder="<?php echo $trans['contact_message']; ?>"></textarea>
              </div>
            </div>

            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-orange border-none btn-rounded-corner"><?php echo $trans['contact_btn_send']; ?><span class="icon-on-button"><i class="ion-ios-arrow-thin-right"></i></span></button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once('./includes/footer.php'); ?>