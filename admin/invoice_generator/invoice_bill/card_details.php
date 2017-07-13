<?php

include '/home/pinecard/public_html/allow_me/php/connection.php';

if (isset($_POST['order_id'])) {
    # code...
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


    $get_details = "SELECT * FROM user_order_card_details WHERE order_id = '".$_POST['order_id']."'";
    $card_details = $conn->query($get_details);

    $card_data = $card_details->fetch_assoc();


    // get the HTML
    ob_start();
    include('res/card_details.php');
    $content = ob_get_clean();

    // convert in PDF
    require_once('../vendor/autoload.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('/home/pinecard/public_html/allow_me/pdf/order_details/card_details_'.$_POST['order_id'].'.pdf', 'F');

        $sql = "UPDATE user_order_card_details SET full_card_details = 'card_details_".$_POST['order_id'].".pdf' WHERE order_id = '".$_POST['order_id']."'";
        if ($conn->query($sql) === TRUE) {
            echo "success";
        }
        else
        {
            echo "failed to update!";
        }
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
}
?>
