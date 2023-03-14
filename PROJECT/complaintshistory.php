<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comaplaints</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="./complaintshistory.css">
</head>
<body>
<?php
include ('./mail.php');
include ('./headers/header.php');

?>
    <div class="page2">
         <div class="compl">
            <div class="page">
                <h1>Complaint History</h1>
            </div>
         </div>
    </div>
<div class="paragraph1">
            <div class="col4">
                    <a href="./pendingsearch.php">
                        <img src="./img/pending.png" alt="Icon complaint process">
                        <span>PENDING COMPLAINTS</span>
                    </a>
            </div>
            <div class="col4">
                <p>
                    <a href="./activesearch.php">
                        <img src="./img/active.png" alt="Icon complaint">
                        <span>ACTIVE COMPLIANTS</span>
                    </a>
                </p>
            </div>
            <!-- <div class="col4">
                <p>
                    <a href="./closedcomplaints.php">
                        <img src="./img/done.PNG" alt="Complaint results">
                        <span>CLOSED COMPLAINTS</span>
                    </a>
                </p>
            </div> -->
        </div>

</div>
</div>    
</body>
</html>