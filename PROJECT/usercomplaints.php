<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
    <title>Document</title>
    <link rel="stylesheet" href="./complaints.css">

</head>
<body>
<div class="complaint">
    <div class="part2">
            <div class="part1">
                <a href="./index.php"><img src="./img/android-chrome-512x512.png" alt="teta logo"></a>
                <h1>Complaint About the Road User</h1>
                <p>Kindly note That the information to be filled on this form will be analysed by the Agency and procedures will be followed to check whether the complaints are valid or not.</p>
                <p>Follow the instructions to fill in the form correctly and submit it.</p>
                    <?php
                        if(isset($_GET["error"])){
                             if ($_GET["error"] == "emptyinput"){
                                echo "<p class='small'>FILL IN ALL THE REQUIRED FIELDS</p>";
                          }} ?>
                     <?php
                        if(isset($_GET["error"])){
                             if ($_GET["error"] == "problem"){
                                echo "<p class='small'>AN ERROR OCURRED WHILE MAKIN A COMPLAINT</p>";
                          }} ?>
                           <?php
                        if(isset($_GET["error"])){
                             if ($_GET["error"] == "emailsent"){
                                echo "<p class='small'>SUCCESSFULLY SUBMITTED.</p>
                                <p class='small'>AN EMAIL HAS BEEN SENT TO CONFIRM THE COMPLAINT HAS BEEN RECEIVED.</p>
                                <p class='small'>Hit the TETA ICON to head to the MAIN page</p>
                                ";
                          }} ?>
                          
            </div>
            <fieldset class="complaintdetails">
                <legend>Complaint Details</legend>
                <form action="roadcomplaints.php" method="POST" class="form1" enctype="multipart/form-data">
                <p><b>Where</b> did the incident(s) that led to your complaint happen? Include street details and any intersections near it, even landmarks are included. </p>
                    <label for="location" >Street name/Location</label>
                    <input class="input" type="text" name="street" placeholder="e.g. along Machakos road">
                    <label for="city">City</label>
                    <input  class="input" type="text" name="city" placeholder="e.g. NAIROBI">
                <p><b>When</b> did the incident occur. Fill in the time and date the it occurred.</p>
                <label for="Incident"></label>
                    <input class="input"type="datetime-local" name="IncidentDATE">
                    <p>Enter the Number plate of the car involved in the incident </p>
                    <input class="input" type="text" name="carreg" placeholder="i.e. KAB 599P">
                    <p>What is your complaint about?</p>
                    <p>Describe in detail what the complaint is about.</p>
                    <ul>
                        <li>Outline if you were involved directly in the incident or you were a witness to the incident that occurred.</li>
                        <li>Describe the actions of the road user whether driving recklessly or aggressively</li>
                        <li>Outline which traffic rules the motorist/motorcyclist broke</li>
                        <li>In addition describe the physcial appearance of the driver(optional)</li></li>


                    </ul>
                    <p>Complaints made may be screened out if they are invalid or out of context.Invalid meaning that the complaints made are done ith clear evidence that it was made for on imprope motive with the intention of deceiving the Agency.
                     Complaints may aslo be screened out if they are frivolous meaning that the complaint made does not reveal any allegation of misconduct or breach of any traffic rules.</p>
                     <p>In addition describe the Physical appearance of the road user</p>
                    <textarea name="details" class="details" maxlength="3000" rows="9" title="10 characters minimum"></textarea>
                    <label for="photo">Upload media file(image or video) that will help with in the investigation of the complaint</label>
                    <input type="file" id="photo" name="media">
                    <button type="submit" name="submit">SUBMIT</button>
                </form>
            </fieldset>
    </div>
</div>
</body>
</html>