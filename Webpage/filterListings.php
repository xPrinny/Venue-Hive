<?php
    include "utils/loadDB.php"; 

    if(isset($_POST['action'])) {
        $sql = "SELECT a.*, GROUP_CONCAT(b.tag) as tags FROM venuehive.listings a 
        INNER JOIN venuehive.Tags b on a.listingId = b.listingId WHERE valid = 1";

        $location = "";
        if(isset($_POST['location']) && count($_POST['location']) > 0) {
            $location = " AND location IN('" . implode("','", $_POST['location']) . "')";
        }

        $category = "";
        if(isset($_POST['category']) && count($_POST['category']) > 0) {
            $category = " AND category IN('" . implode("','", $_POST['category']) . "')";
        }

        $tag = "";
        if(isset($_POST['tag']) && count($_POST['tag']) > 0) {
            $tag = " AND tag IN('" . implode("','", $_POST['tag']) . "')";
        }

        $sql .= $location . $category . $tag . " GROUP BY a.listingId";

        $result = $conn->query($sql);

        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $listingInfo = $row['listingInfo'];
                if(strlen($listingInfo) > 200){
                    $listingDesc = substr($listingInfo,0,200) . " ...";
                }
                else{
                    $listingDesc = $listingInfo;
                }
                $output .='<div class="col-lg-4">
                <div class="card">
                    <img src="'.$row["imagePath"].'" class="card-img-top card-img-thumbnail" alt="'.$row["listingName"].'" style="object-fit:cover;">
                    <a href ="listing.php?listingId='.$row["listingId"].'" style="text-decoration: none; color:black">
                    <div class="card-body" id="card-body-text">
                        <h6 class="bg-customYellow text-center rounded p-1">'.$row["listingName"].'</h6>
                            <p>
                                '.$listingDesc.'<br>
                            </p>      
                        <h5 class="card-title">Price: '.$row["listingPrice"].'</h5>
                    </div>
                    </a>
                </div>
            </div>';
            }
        }
        else {
            $output = "<h5>No Listings Found!</h5>";
        }
        echo $output;
    }
?>
