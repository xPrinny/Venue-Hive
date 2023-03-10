<form class="search-form">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="location">Location</label>
      <select class="form-control" id="location" name="location">
        <option selected>Select a location</option>
        <option value="new-york">New York</option>
        <option value="los-angeles">Los Angeles</option>
        <option value="san-francisco">San Francisco</option>
        <option value="chicago">Chicago</option>
        <option value="miami">Miami</option>
      </select>
    </div>
    <div class="col-md-4 mb-3">
      <label for="event-type">Event Type</label>
      <select class="form-control" id="event-type" name="event-type">
        <option selected>Select an event type</option>
        <option value="wedding">Wedding</option>
        <option value="corporate">Corporate</option>
        <option value="private">Private</option>
        <option value="other">Other</option>
      </select>
    </div>
    <div class="col-md-4 mb-3">
      <label for="capacity">Capacity</label>
      <select class="form-control" id="capacity" name="capacity">
        <option selected>Select a capacity</option>
        <option value="50">50</option>
        <option value="100">100</option>
        <option value="150">150</option>
        <option value="200">200</option>
        <option value="250">250</option>
      </select>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Search</button>
</form>
