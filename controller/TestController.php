<?php

class TestController {
     public function __construct($args) {
         
     }
    function actionIndex() {
        echo "asdasdas";
        echo "<pre>";
        $mailer = new Mail;

        $body = '        <h2 style="margin-bottom: 20px; margin-left: 20px;">A new has registered</h2>

    <table>

    <tr><td>Dealer Id:</td>
    <td>D2D52</td></tr>
    
    <tr><td>Name:</td>
    <td>Subramaniam Sahoo</td></tr>
    
    <tr><td>Email Id:</td>
    <td>subaaimt@gmail.com</td></tr>
   
    <tr><td>Company Name:</td>
    <td>xcv</td></tr>
    
    <tr><td>Mobile No.:</td>
    <td>9176964912</td></tr>
    
    <tr><td>Address:</td>
    <td>xcvxcv</td></tr>
    
    <tr><td>City:</td>
    <td>Mohali</td></tr>
   
    <tr><td>Area:</td>
    <td>PHASE -6</td></tr>
       
</table>             ';


        $mailsent = $mailer->sendMail('subaaimt@gmail.com', 'Forget Password', $body);
        var_dump($mailsent);
        die;
    }

}

?>
