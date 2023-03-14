<!DOCTYPE html>
<html lang="en">
<head>
<script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./complaints.css">
</head>
<body>
<div class="complaint">
    <div class="part2">
            <div class="part1">
                <a href="./index.php"><img src="./img/android-chrome-512x512.png" alt="teta logo"></a>
                <h1>Complaint About the Traffic Police</h1>
                <p>Kindly note That the information to be filled on this form will be analysed by the Agency and procedures will be followed to check whether the complaints are valid or not.</p>
                <p>Follow the instructions to fill in the form correctly and submit it.</p>
                <?php
                        if(isset($_GET["error"])){
                             if ($_GET["error"] == "emptyinput"){
                                echo "<p class='small'>FILL IN ALL THE REQUIRED FIELDS</p>";
                          }} ?>
                 <?php
                        if(isset($_GET["error"])){
                             if ($_GET["error"] == "emailsent"){
                                echo "<p class='small'>SUCCESSFULLY SUBMITTED.</p>
                                <p class='small'>AN EMAIL HAS BEEN SENT TO CONFIRM THE COMPLAINT HAS BEEN RECEIVED.</p>";
                          }} ?>
            </div>

            <fieldset class="complaintdetails">
                <legend>Complaint Details</legend>
                <form action="complaintspolice.php" method ="POST" class="form1" enctype="multipart/form-data">
                <p><b>Where</b> did the incident(s) that led to your complaint happen? Include street details and any intersections near it, even landmarks are included. </p>
                    <label for="location">Location/Street</label>
                    <input class="input" type="text" name="street" placeholder="e.g. along Machakos road">
                    <label for="city">City</label>
                    <input  class="input" type="text" name="city" placeholder="e.g. NAIROBI">
                <p><b>When</b> did the incident occur. Fill in the time and date the it occurred.</p>
                <label for="Incident"></label>
                    <input class="input"type="datetime-local" name="IncidentDATE">
                    <p>Enter the badge Number of the police involved in the incident </p>
                    <input class="input" type="text" name="badgeNo" placeholder="e.g. 987456">
                    <p>What is your complaint about?</p>
                    <p>Describe in detail what the complaint is about.</p>
                    <ul>
                        <li>Outline if you were involved directly in the incident or you were a witness to the incident that occurred.</li>
                        <li>Describe the actions of the police officer whether malicious or corrupt or the actions of the traffic police was out of conduct</li>
                        <li>Outline whether the traffic police officer did not act according to the traffic act and carry out his/her job(i.e. accepting bribes from drivers with unroadworthy vehicles instead of arresting them)</li>
                        <li>In addition describe the physical appearance of the traffic officer(optional)</li>

                    </ul>
                    <p>Complaints made may be screened out if they are invalid or out of context.Invalid meaning that the complaints made are done ith clear evidence that it was made for on imprope motive with the intention of deceiving the Agency.
                     Complaints may aslo be screened out if they are frivolous meaning that the complaint made does not reveal any allegation of misconduct or breach of any code of conduct.
                     </p>
                     <p>Fill in your complaint below</p>
                    <textarea name="details" class="details" maxlength="3000" rows="9" title="10 characters minimum"></textarea>
                    <label for="photo">Upload any media file that will help with in the investigation of the complaint</label>
                    <input type="file" accept="" id="photo" name="media">
                    <button type="submit" name="submits">SUBMIT</button>
                </form>
            </fieldset>
    </div>
</div>
</body>
</html>