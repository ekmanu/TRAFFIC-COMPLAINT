<?php
 require_once '/xampp/htdocs/PROJECT/admin/dompdf/autoload.inc.php';

 use Dompdf\Dompdf;

    $files = glob("/admin/DOCUMENTS/*.php");
    foreach($files as $file) include_once($file);
    $document=new Dompdf();
    $kuf = "SELECT complaintdriver.DRIVERCOMPLAINTID,complaintdriver.CARREG, complaintdriver.IncidentDATE,complaintdriver.IncidentDESC,complaintdriver.CITY,complaintdriver.STREET,complaintdriver.MEDIA, driver.OWNERNAME, driver.email FROM complaintdriver
    JOIN driver on complaintdriver.CARREG=DRIVER.CARREG WHERE DRIVERCOMPLAINTID= '$pd' ";
    $kuf_run = mysqli_query($conn,$kuf);
    if(mysqli_num_rows($kuf_run)>0){
        foreach($kuf_run as $dod){
            $email23 =$dod['email'];
            $jina2p=$dod['OWNERNAME'];
            $date29=$dod['IncidentDATE'];
            $CITYTY=$dod['CITY'];
            $STREET12=$dod['STREET'];
            $DESCRIP=$dod['IncidentDESC'];
            $CARREGISS=$dod['CARREG'];
            $MEDIAs=$dod['MEDIA'];

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
      .division2
      {
        display:flex;
        flex-direction: column;
        margin-top: 40px;
      }
    </style>
    <div class="kuk">
    <div class="sidepage">
        <div class="headie">
            <div class="top">
                <h3>Complaint Details</h3>
            </div>
            <div class="rest">
                    <div class="part1">
                        <div class="division">  
                            <div class="part2">Complaint#</div>
                            <div class="part3">'.$pd.'</div>
                        </div>
                        <div class="division">  
                            <div class="part2">Date/Time</div>
                            <div class="part3">'.$date29.'</div>
                        </div>
                        <div class="division">  
                            <div class="part2">Location</div>
                        <div class="part3">'.$STREET12.', '.$CITYTY.'</div>
                        </div>
                        <div class="division">  
                            <div class="part2">OffenderCARNO.</div>
                            <div class="part3">'.$CARREGISS.'</div>
                        </div>
                        <div class="division">  
                            <div class="part2">OffenderName</div>
                            <div class="part3">'.$jina2p.'</div>
                        </div>
                        <div class="division2">  
                            <div class="part2">Complaint Details </div>
                        </div>
                        <div class="division2">  
                            <div class="part3">'.$DESCRIP.'</div>
                        </div>
                    </div>
                </div>
            </div>';
    $document->loadHtml($pdf);
    $document->setPaper('A4', 'landscape');
    $document->render();
    $mm = $document->output();
    $name='Complaints'.$pd.'.pdf';
    file_put_contents('DOCUMENTS/'.$name,$mm); 
         