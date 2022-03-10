<?php
session_start();
require('connection.php'); 
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \mPDF();


        

                $num = 0;
                $date = date('d/m/y h:i:s');

            $sql4 = "SELECT * FROM store_received ORDER BY date ASC";
            $run4 = mysqli_query($conn,$sql4);
            while($rows4=mysqli_fetch_assoc($run4)){
                if($rows4['received_from']!= ''){
                    $var = 'Received';
                }else{
                    $var = 'Issued';
                }
               $num++;
                $data.= "
                
                    <tr>
                        <td>$num</td>
                        <td>$rows4[type]</td>
                        <td>$rows4[name]</td>
                        <td>$rows4[quantity]</td>
                        <td>$rows4[received_from]</td>
                        <td>$rows4[received_by]</td>
                        <td>$rows4[issued_to]</td>
                        <td>$rows4[issued_by]</td>
                        <td>$rows4[date]</td>
                        <td>$var</td>

                    </tr>
                
                
                ";
            };
        


$footer = "
<div class='footer'>
<hr>
    Designed By: KIMTech Solutions ~ Tel: 0707357072 ~ Email: bnkimtai@gmail.com
</div>
";


$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLFooter($footer);
$mpdf->WriteHTML("
                <style>

                    td{
                        color: black;
                        padding-left: 15px;
                        border-bottom: 1px solid #ddd;
                    }
                    tr:nth-child(even) {background-color: #f2f2f2;}
                    </style>

                    <link rel='stylesheet' media='print' href='style8.css' />
                    
                
                <div class='pdftitle'>
                <h3><u>COMBINED STORE REPORT</u></h3>
                <h5>Enlists All Equipments, Medicine, Stationery and Any other Item in the store that has been received and issued out</h5>
                </div>
                <div style='margin-left: 60%;'><b>Generated on: </b>$date</div>
                <HR>

                <table style='border-collapse: collapse;'>
                    <tr>
                        <th></th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Received From</th>
                        <th>Received By</th>
                        <th>Issued To</th>
                        <th>Issued By</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                    $data  
                </table>
                <br>
                --------------------------------------------------------------------------END-----------------------------------------------------------------------
                <br><br>
");

$mpdf->Output();

