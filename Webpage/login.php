<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-customYellow p-4">
        <h5 class="modal-title font-alt" id="feedbackModalLabel">User Login</h5>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border-0 p-4">
          <form id="contactForm" action="utils/processLogin" method="post"> 
            <p>
              For new members, please sign up for a new account
              <a href="register">here</a>.
            </p>

            <!-- Username input-->
            <div class="form-floating mb-3">
              <input class="form-control" id="uname" name="uname" type="text" placeholder="Enter your Username" required/>
              <label for="email">Username</label>
            </div>

            <!-- Password input-->
            <div class="form-floating mb-3">
              <input class="form-control" id="pwd" name="pwd" type="password" placeholder="Enter your Password" required/>
              <label for="password">Password</label>
            </div>

            <!-- Submit Button-->
            <div class="d-grid"><button class="btn btn-primary rounded-pill btn-lg" id="submitButton" type="submit">Submit</button></div>
          </form>
      </div>
    </div>
  </div>
</div>