<?php
 require_once '/xampp/htdocs/PROJECT/includes/conn.php';
 require_once '/xampp/htdocs/PROJECT/admin/dompdf/autoload.inc.php';

 use Dompdf\Dompdf;
    if(isset($_POST['editbtn'])){
      $files = glob("/admin/DOCUMENTS/*.php");
      foreach($files as $file) include_once($file);
      $document=new Dompdf();
      $OWNERID=$_POST['edit_id'];
      $kuf= "SELECT CARREG,OWNERNAME,OWNERID,CONTACT,EMAIL,CARMAKE,CARTYPE,COLOUR,RESIDENCE from driver where OWNERID=$OWNERID ";
      $kuf_run = mysqli_query($conn,$kuf);
    if(mysqli_num_rows($kuf_run)>0){
        foreach($kuf_run as $dod){
            $OWNERNAME=$dod['OWNERNAME'];
            $CONTACT=$dod['CONTACT'];
            $CARREG=$dod['CARREG'];
            $EMAIL=$dod['EMAIL'];
            $CARMAKE=$dod['CARMAKE'];
            $CARTYPE=$dod['CARTYPE'];
            $COLOUR=$dod['COLOUR'];
            $RESIDENCE=$dod['RESIDENCE'];

        }
    }

    $pdf='<style>
    .kuk{
        width:200vh;
        height: 80vh;
      
      }
      .sidepage{
        border: 4px;
        color: #495057;
        padding: 40px;
        margin-bottom: 14px;
      }
      .headie{
        background: #e5e7eb;
        width: 100%;
        width: 1000px;
      }
      .top{
        background-color: #f3f5f7;
        padding: 12px 20px 12px 20px;
      }
      .top h3{
        font-size: 18px;
        font-weight: 400;
        text-align: left;
      }
      .rest{
        width: 100%;
        padding: 40px;
        display: flex;
        flex-direction: row;
      }
      .division{
        display: flex;
        color: rgba(73,80,87);
        flex-direction: row;
        flex-wrap: wrap;
        line-height: 24px;
      
      }
      .part1{
        display: flex;
        color: rgba(73,80,87);
        width: 100%;
        margin-bottom: 1.25rem;
        flex-direction: column;
        margin-right: 40px;
        width: 487px;
        
      }
      .part2{
        margin-right: 40px;
        font-weight: 500;
        font-size: 18px;
      }
      .part3{
          colour: 2px solid black;
      }
      .division2
      {
        display:flex;
        flex-direction: column;
        margin-bottom: 20px;
      }
    </style>
    <div class="kuk">
    <div class="sidepage">
        <div class="headie">
            <div class="top">
                <h3>DRIVER DETAILS</h3>
            </div>
            <div class="rest">
                    <div class="part1">
                        <div class="division2">  
                                <div class="part2">CAR REGISTRATION:</div>
                                <div class="part3">'.$CARREG.'</div>
                            </div>
                        <div class="division2">  
                            <div class="part2">OWNER:</div>
                            <div class="part3">'.$OWNERNAME.'</div>
                        </div>
                        <div class="division2">  
                            <div class="part2">ID #:</div>
                            <div class="part3">'.$OWNERID.'</div>
                        </div>
                        <div class="division2">  
                            <div class="part2">CONTACT:</div>
                         <div class="part3">'.$CONTACT.'</div>
                        </div>
                        <div class="division2">  
                            <div class="part2">EMAIL:</div>
                            <div class="part3">'.$EMAIL.'</div>
                        </div>
                        <div class="division2">  
                            <div class="part2">RESIDENCE:</div>
                            <div class="part3">'.$RESIDENCE.'</div>
                        </div>
                        <div class="division2">  
                            <div class="part2">CAR MAKE:</div>
                            <div class="part3">'.$CARMAKE.'</div>
                        </div>
                        <div class="division2">  
                             <div class="part2">CAR TYPE:</div>
                             <div class="part3">'.$CARTYPE.'</div>
                        </div>
                          <div class="division2">  
                          <div class="part2">COLOUR:</div>
                          <div class="part3">'.$COLOUR.'</div>
                        </div>
                        
                    </div>
                </div>
            </div>';
    $document->loadHtml($pdf);
    $document->setPaper('A4', 'landscape');
    $document->render();
    $mm = $document->output();
    $name='Complaints'.$CARREG.'.pdf';
    $document->stream("DRIVERS", array("Attachment"=>0));
  }
         