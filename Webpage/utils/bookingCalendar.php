<?php 
    $listingId = $_GET['listingId'];
    $query = "SELECT startdate, enddate FROM listings WHERE listingId = $listingId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $startDate = $row['startdate'];
    $endDate = $row['enddate'];

    $dates = array();
    $currentDate = $startDate;
    while ($currentDate <= $endDate) {
        $dates[] = $currentDate;
        $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
    }

    $query = "SELECT bookingDate FROM bookings WHERE listingId = $listingId";
    $result = mysqli_query($conn, $query);
    $bookedDates = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $bookedDates[] = $row['bookingDate'];
    }
    
    $availableDates = array_diff($dates, $bookedDates);
    
    $availableDatesString = implode("', '", $availableDates);
    $disabledDatesString = implode("', '", $bookedDates);
?>