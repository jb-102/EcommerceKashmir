<?php 

include '/home/pinecard/public_html/allow_me/php/connection.php';

if (isset($_POST['order_id'])) {

    /**
     * HTML2PDF Library - example
     *
     * HTML => PDF convertor
     * distributed under the LGPL License
     *
     * @package   Html2pdf
     * @author    Laurent MINGUET <webmaster@html2pdf.fr>
     * @copyright 2016 Laurent MINGUET
     *
     * isset($_GET['vuehtml']) is not mandatory
     * it allow to display the result in the HTML format
     */
    // get the HTML

    $get_details = "SELECT * FROM user_orders WHERE order_id = '".$_POST['order_id']."'";
    $res = $conn->query($get_details);

    $order_data = $res->fetch_assoc();

    ob_start();
    include('res/bill.php');
    $content = ob_get_clean();

    // convert in PDF
    require_once('../vendor/autoload.php');
    require_once('../vendor/spipu/pjmail/pjmail.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $content_PDF = $html2pdf->Output('', true);   
        $mail = new PJmail(); 
        $mail->setAllFrom('contact@cardpine.com', "cardpine.com"); 
        $mail->addrecipient($_POST['user_email']); 
        $mail->addsubject("Bill for the order ".$_POST['order_id']); 
        $mail->text = "Your Order has beed confirmed! Here is bill for your order! \r\n \r\n \r\n \r\nThis is a system generated email please don't reply to this!";
        $mail->addbinattachement('bill_'.$_POST['order_id'].'.pdf', $content_PDF); 
        $res = $mail->sendmail();
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
}
?>
