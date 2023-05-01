<div class="team-head">
  <?php require('./includes/header.php'); ?>
</div>

<div class="team-body">
  <section id="services" class="padding-top-90">
    <div class="container">
      <div class="row">

        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <div class="heading-wraper text-center margin-bottom-80">
                <h4><?php echo $trans['team_title']; ?></h4>
                <hr class="heading-devider gradient-orange">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <div class="card">
                <img src="<?php echo $trans['team_member1_picUrl']; ?>" alt="John Doe" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $trans['team_member1']; ?></h5>
                  <p class="card-text"><?php echo $trans['team_member1_title']; ?></p>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="card">
                <img src="<?php echo $trans['team_member2_picUrl']; ?>" alt="John Doe" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $trans['team_member2']; ?></h5>
                  <p class="card-text"><?php echo $trans['team_member2_title']; ?></p>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="card">
                <img src="<?php echo $trans['team_member3_picUrl']; ?>" alt="Mike Johnson" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $trans['team_member3']; ?></h5>
                  <p class="card-text"><?php echo $trans['team_member3_title']; ?></p>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="card">
                <img src="<?php echo $trans['team_member4_picUrl']; ?>" alt="Mike Johnson" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $trans['team_member4']; ?></h5>
                  <p class="card-text"><?php echo $trans['team_member4_title']; ?></p>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </section>

  <?php require('./includes/footer.php'); ?>
</div>