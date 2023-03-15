<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-customYellow p-4">
        <h5 class="modal-title font-alt" id="feedbackModalLabel">User Login</h5>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border-0 p-4">
          <form id="contactForm"> 
          <p>
          For new members, please sign up for a new account
          <a href="register.php">here</a>.
        </p>

        <form action="process_login.php" method="get">
            <!-- Email address input-->
            <div class="form-floating mb-3">
              <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
              <label for="email">Email address</label>
              <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
              <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
            </div>

            <!-- Password input-->
            <div class="form-floating mb-3">
              <input class="form-control" id="pwd" type="password" placeholder="Enter your Password" data-sb-validations="required" />
              <label for="password">Password</label>
              <div class="invalid-feedback" data-sb-feedback="password:required">Password is required.</div>
              <div class="invalid-feedback" data-sb-feedback="password:password">Password is not valid.</div>
            </div>

            <!-- Submit success message-->

            <!-- This is what your users will see when the form
                             has successfully submitted-->
            <div class="d-none" id="submitSuccessMessage">
              <div class="text-center mb-3">
                <div class="fw-bolder">Login successful!</div>
              </div>
            </div>

            <!--Submit error message-->

            <!--This is what your users will see when there is
                            an error submitting-->
            <div class="d-none" id="submitErrorMessage">
              <div class="text-center text-danger mb-3">Error sending message!</div>
            </div>

            <!-- Submit Button-->
            <div class="d-grid"><button class="btn btn-primary rounded-pill btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
          </form>
      </div>
    </div>
  </div>
</div>