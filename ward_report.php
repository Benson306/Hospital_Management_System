<?php
session_start();
require('connection.php'); 
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \mPDF('c', 'A4-L');

                $num = 0;
                $date = date('d/m/y h:i:s');

            $sql4 = "SELECT * FROM wards ORDER BY admission_date ASC";
            $run4 = mysqli_query($conn,$sql4);

            while($rows4=mysqli_fetch_assoc($run4)){
                $sql5 = "SELECT * FROM patients_details WHERE patient_id = '$rows4[patient_id]'";
                $run5 = mysqli_query($conn,$sql5);
                $rows5 = mysqli_fetch_assoc($run5);

               $admission_date = $rows4['check_out_date'];

                if($admission_date != NULL){
                    $remarks = 'yes';
                }else{
                    $remarks = 'no';
                }
               $num++;
                $data.= "
                    <tr>
                        <td>$num</td>
                        <td>$rows5[name]</td>
                        <td>$rows4[ward_number]</td>
                        <td>$rows4[bed_number]</td>
                        <td>".nl2br($rows4['patient_condition'])."</td>
                        <td>".nl2br($rows4['drugs_given'])."</td>
                        <td>".nl2br($rows4['procedures_done'])."</td>
                        <td>$rows5[number]</td>
                        <td>$rows4[admitted_by]</td>
                        <td>$rows4[admission_date]</td>
                        <td>$rows4[checked_out_by]</td>
                        <td>$rows4[check_out_date]</td>
                        <td>$remarks</td>
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
                <h2><u>COMBINED WARD REPORT</u></h2>
                <h4>List of All Patients Admitted.</h4>
                </div>
                <div style='margin-left: 80%;'><b>Generated on: </b>$date</div>
                <HR>

                <table style='border-collapse: collapse;'>
                    <tr>
                        <th></th>
                        <th>Patients Name</th>
                        <th>Ward Number</th>
                        <th>Bed Number</th>
                        <th>Patient Condition</th>
                        <th>Drugs Given</th>
                        <th>Procedures Done</th>
                        <th>Phone Number</th>
                        <th>Admitted By</th>
                        <th>Admitted On</th>
                        <th>Checked Out on:</th>
                        <th>Checked Out By:</th>
                        <th>Discharged</th>
                    </tr>
                    $data  
                </table>
                <br>
                -------------------------------------------------------------------------------------------------------END-------------------------------------------------------------------------------------------------
                <br><br>
");

$mpdf->Output();

