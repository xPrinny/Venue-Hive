<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-gradient-primary-to-secondary p-4">
        <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">User Login</h5>
        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border-0 p-4">
        <!-- * * * * * * * * * * * * * * *-->
        <!-- * * SB Forms Contact Form * *-->
        <!-- * * * * * * * * * * * * * * *-->
        <!-- This form is pre-integrated with SB Forms.-->
        <!-- To make this form functional, sign up at-->
        <!-- https://startbootstrap.com/solution/contact-forms-->
        <!-- to get an API token!-->

        <p>
          For new members, please sign up for a new account
          <a href="register.php">here</a>.
        </p>

        <form action="process_login.php" method="get">


          <!-- Email address input-->
          <div class="form-floating mb-3">
            <label for="email">Email address</label>
            <input class="form-control" name="email" type="email" placeholder="Enter your email">

            <!--<div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>-->
          </div>

          <!-- Password input-->
          <div class="form-floating mb-3">
            <label for="password">Password</label>
            <input class="form-control" name="pwd" type="password" placeholder="Enter your Password">

            <!--<div class="invalid-feedback" data-sb-feedback="password:required">Password is required.</div>
            <div class="invalid-feedback" data-sb-feedback="password:password">Password is not valid.</div>-->
          </div>


          <!-- Login Button-->
          <div class="d-grid"><button class="btn btn-primary rounded-pill btn-lg disabled" name="login" type="submit">Log In</button></div>
        </form>
      </div>
    </div>
  </div>
</div>