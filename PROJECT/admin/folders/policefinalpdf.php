<?php
 require_once '/xampp/htdocs/PROJECT/admin/dompdf/autoload.inc.php';
 require_once '/xampp/htdocs/PROJECT/includes/conn.php';


 use Dompdf\Dompdf;

    if(isset($_POST['editbtn'])){
    $pd=$_POST['editd'];
    $files = glob("/admin/DOCUMENTS/*.php");
    foreach($files as $file) include_once($file);
    $document=new Dompdf();
    $kuf = "SELECT preport.IncidentDATE,preport.POLICECOMPLAINTID, preport.BADGENO,preport.CITY,preport.STREET,preport.IncidentDESC,preport.PCOMPSTATUS,preport.Judgement,preport.STATUSS, policeofficer.FULLNAME,policeofficer.secondname
    FROM preport INNER JOIN policeofficer ON preport.BADGENO=policeofficer.BADGENO WHERE preport.POLICECOMPLAINTID='$pd';";
    $kuf_run = mysqli_query($conn,$kuf);
    if(mysqli_num_rows($kuf_run)>0){
        foreach($kuf_run as $dod){
            $DATE =$dod['IncidentDATE'];
            $jina2p=$dod['FULLNAME'];
            $second=$dod['secondname'];
            $CITYTY=$dod['CITY'];
            $STREET12=$dod['STREET'];
            $DESCRIP=$dod['IncidentDESC'];
            $BADGENO=$dod['BADGENO'];
            $judge=$dod['Judgement'];
            $status=$dod['STATUSS'];

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
                <h3>COMPLAINT REPORT</h3>
            </div>
            <div class="rest">
                    <div class="part1">
                         <div class="division2">  
                            <div class="part2">STATUS:</div>
                            <div class="part3">'.$status.'</div>
                    </div>
                        <div class="division2">  
                            <div class="part2">COMPLAINT#:</div>
                            <div class="part3">'.$pd.'</div>
                        </div>
                        <div class="division2">  
                            <div class="part2">DATE/TIME OF INCIDENT:</div>
                            <div class="part3">'.$DATE.'</div>
                        </div>
                        <div class="division2">  
                            <div class="part2">LOCATION:</div>
                        <div class="part3">'.$STREET12.', '.$CITYTY.'</div>
                        </div>
                        <div class="division2">  
                            <div class="part2">OFFENDERS BADGENO:.</div>
                            <div class="part3">'.$BADGENO.'</div>
                        </div>
                        <div class="division2">  
                            <div class="part2">OFFENDERS NAME:</div>
                            <div class="part3">'.$jina2p.' '.$second.'</div>
                        </div>
                        <div class="division2">  
                            <div class="part2">COMPLAINT DETAILS:</div>
                        </div>
                        <div class="division2">  
                            <div class="part3">'.$DESCRIP.'</div>
                        </div>
                        <div class="division2">  
                            <div class="part2">RESULTS OF THE COMPLAINT:</div>
                        </div>
                        <div class="division2">  
                            <div class="part3">'.$judge.'</div>
                        </div>
                    </div>
                </div>
            </div>';
    $document->loadHtml($pdf);
    $document->setPaper('A4', 'landscape');
    $document->render();
    $mm = $document->output();
    $name='Complaints'.$pd.'.pdf';
    $document->stream('DRIVER'.$pd.'', array("Attachment"=>0));
    }