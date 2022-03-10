<?php
session_start();
require('connection.php'); 
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \mPDF();

$patientPDF_id =$_SESSION['patientPDF_id'];

$sql3 = "SELECT * FROM patients_details WHERE patient_id = '$patientPDF_id'";
            $run3 = mysqli_query($conn, $sql3);
            $rows3= mysqli_fetch_assoc($run3);

            $name = $rows3['name'];
            $number = $rows3['number'];
            $gender = $rows3['gender'];
            $kin = $rows3['kin'];
            $kin_number = $rows3['kin_number'];
            $reg_date = $rows3['regDate'];
            $dob = $rows3['DOB'];
            $national = $rows3['national_id'];
            $residence = $rows3['residence'];
            $occupation = $rows3['occupation'];
            $marital = $rows3['marital'];
            $insurance_type = $rows3['insurance_type'];
            $insurance_number = $rows3['insurance_number'];


            $sql4= "SELECT * FROM sessions WHERE patient_id = '$patientPDF_id' ORDER BY session_id DESC LIMIT 1";
            $run4= mysqli_query($conn, $sql4);

            $date = date('d/m/y h:i:s');

            $data = "";
            $num = 0;
            while($rows4=mysqli_fetch_assoc($run4)){
                $num++;

                $sql5 = "SELECT * FROM wards WHERE patient_id = '$patientPDF_id' AND session_id = '$rows4[session_id]'";
                    $run5 = mysqli_query($conn, $sql5);
                    $rows5 = mysqli_fetch_assoc($run5);
                $count5 = mysqli_num_rows($run5);

                if($count5 > 0){
                    $more = "
                    <tr>
                        <td colspan='2' style='background-color:orange; text-align: center;' ><b>Patient Was Admitted To The Ward During This Visit. Details Are As Follows:<b></td>
                    </tr>
                    <tr>
                        <td><b>Admitted On:</b></td>
                        <td>$rows5[admission_date]</td>
                    </tr>
                    <tr>
                        <td><b>Admitted By:</b></td>
                        <td>$rows5[admitted_by]</td>
                    </tr>
                    <tr>
                        <td><b>Patient Condition During Check Out:</b></td>
                        <td>$rows5[patient_condition]</td>
                    </tr> 
                    <tr>
                        <td><b>Procedures Done:</b></td>
                        <td>$rows5[procedures_done]</td>
                    </tr> 
                    <tr>
                        <td><b>Medicine Given:</b></td>
                        <td>$rows5[drugs_given]</td>
                    </tr>
                    <tr>
                        <td><b>Check Out Date:</b></td>
                        <td>$rows5[check_out_date]</td>
                    </tr> 
                    <tr>
                        <td><b>Checked Out By:</b></td>
                        <td>$rows5[checked_out_by]</td>
                    </tr>  
                    ";
                }else{
                    $more = '';
                }

                $data.= "
                    <style>
                    td{
                        color: black;
                        padding-left: 15px;
                        border-bottom: 1px solid #ddd;
                    }
                    tr:nth-child(even) {background-color: #f2f2f2;}
                    </style>
                <div style='border: 3px dotted blue; margin-bottom: 5%;'>
                <div style='margin-left: 60%;'>
                    <div><b>Visit no.$num</b></div> 
                    <div><b>Status:</b> $rows4[status]</div>
                    <div><b>Date:</b> $rows4[date]</div>
                </div>
                <table>
                    <tr>
                        <td><b>Blood Pressure:</b></td>
                        <td>$rows4[pressure] mmHg</td>
                    </tr>
                    <tr>
                        <td style='width: 40%;'><b>Oxygen Saturation:</b></td>
                        <td style='width: 60%;'>$rows4[oxygen_saturation] %</td>
                    </tr>
                    <tr>
                        <td><b>Weight:</b></td>
                        <td>$rows4[weight] kg</td>
                    </tr>
                    <tr>
                        <td><b>Temperature:</b></td>
                        <td>$rows4[temp] °C</td>
                    </tr>
                    <tr>
                        <td><b>Heart Rate:</b></td>
                        <td>$rows4[heart_rate] bpm</td>
                    </tr>
                    <tr>
                        <td><b>Symptoms:</b></td>
                        <td>".nl2br($rows4['symptoms'])."</td>
                    </tr>
                    <tr>
                        <td><b>Differential Diagnosis:</b></td>
                        <td>".nl2br($rows4['differential_diagnosis'])."</td>
                    </tr>
                    <tr>
                        <td><b>Lab Tests Required:</b></td>
                        <td>".nl2br($rows4['test_types'])."</td>
                    </tr>
                    <tr>
                        <td><b>Lab Tests Done:</b></td>
                        <td>".nl2br($rows4['lab_test_done'])."</td>
                    </tr>
                    <tr>
                        <td><b>Lab Results:</b></td>
                        <td>".nl2br($rows4['lab_results'])."</td>
                    </tr>
                    <tr>
                        <td><b>Diagnosis:</b></td>
                        <td>".nl2br($rows4['diagnosis'])."</td>
                    </tr>
                    <tr>
                        <td><b>Prescription:</b></td>
                        <td>".nl2br($rows4['prescription'])."</td>
                    </tr> 
                    <tr>
                        <td><b>Any Procedures Done:</b></td>
                        <td>".nl2br($rows4['procedures'])."</td>
                    </tr>
                    <tr>
                        <td><b>Any referal made:</b></td>
                        <td>".nl2br($rows4['referal'])."</td>
                    </tr>
                    <tr>
                        <td><b>Doctor:</b></td>
                        <td>$rows4[doctor_attending]</td>
                    </tr>
                    <tr>
                        <td><b>Drugs Given:</b></td>
                        <td>".nl2br($rows4['drugs_given'])."</td>
                    </tr> 
                    <tr>
                        <td><b>Drugs Not Available:</b></td>
                        <td>".nl2br($rows4['unavailable_drugs'])."</td>
                    </tr>
                    <tr>
                        <td><b>Consultation Fee:</b></td>
                        <td>$rows4[consultation_fee]</td>
                    </tr> 
                    <tr>
                        <td><b>Drugs Fee:</b></td>
                        <td>$rows4[medicine_fee]</td>
                    </tr>
                    <tr>
                        <td><b>Lab Fee:</b></td>
                        <td>$rows4[lab_fee]</td>
                    </tr>
                    <tr>
                        <td><b>Procedure Fee:</b></td>
                        <td>$rows4[procedures_fee]</td>
                    </tr>
                    <tr>
                        <td><b>Next Checkup:</b></td>
                        <td>".nl2br($rows4['next_checkup'])."</td>
                    </tr>   
                    $more  
                </table>
                </div>
                <br>
                <br>
                
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
                    <h3><u>Patient Report OF Current Visit</u></h3>
                    </div>
                    <div style='margin-left: 60%;'><b>Generated on: </b>$date</div>
                    <HR>

                    <table>
                        <tr>
                            <td><b>Patient's Name:</b></td>
                            <td>$name</td>
                            <td><b>Phone Number:</b></td>
                            <td>$number</td>
                        </tr>
                        <tr>
                            <td><b>D.O.B:</b></td>
                            <td>$dob</td>
                            <td><b>Gender:</b></td>
                            <td>$gender</td>
                        </tr>
                        <tr>
                            <td><b>Date of Registration:</b></td>
                            <td>$reg_date</td>
                            <td><b>National ID Number:</b></td>
                            <td>$national</td>
                        </tr>
                        <tr>
                            <td><b>Next of Kin's Phone Number:</b></td>
                            <td>$kin_number</td>
                            <td><b>Next of Kin:</b></td>
                            <td>$kin</td>
                            
                        </tr>
                        <tr>
                            <td><b>Residence:</b></td>
                            <td>$residence</td>
                            <td><b>Occupation:</b></td>
                            <td>$occupation</td>
                        </tr>
                        <tr>
                            <td><b>Marital Status:</b></td>
                            <td>$marital</td>
                            <td><b>Next of Kin:</b></td>
                            <td>$kin</td>
                        </tr>
                        <tr>
                            <td><b>Insurance Type:</b></td>
                            <td>$insurance_type</td>
                            <td><b>Insurance Number:</b></td>
                            <td>$insurance_number</td>
                        </tr>
                    </table>
                    <hr>
                    <br><br>
                    $data
                --------------------------------------------------------------------------END-----------------------------------------------------------------------
                <br><br>
");

$mpdf->Output();

