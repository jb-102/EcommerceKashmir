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

    date_default_timezone_set('Asia/Kolkata');
    $delivery_date = date('Y-m-d H:i:s');

    $get_details = "SELECT * FROM user_orders WHERE order_id = '".$_POST['order_id']."'";
    $res = $conn->query($get_details);

    $order_data = $res->fetch_assoc();

    if ($order_data['delivery_date'] == '0000-00-00 00:00:00') {
        $delivery_date = date('Y-m-d H:i:s');
    }
    else
    {
        $delivery_date = $order_data['delivery_date'];
    }

    // get the HTML
    ob_start();
    include('res/invoice.php');
    $content = ob_get_clean();

    // convert in PDF
    require_once('../vendor/autoload.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('/home/pinecard/public_html/allow_me/pdf/invoices/invoice_'.$_POST['order_id'].'.pdf', 'F');

        $sql = "UPDATE user_orders SET status = 1, invoice = 'invoice_".$_POST['order_id']."', delivery_date = '$delivery_date' WHERE order_id = '".$_POST['order_id']."'";
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
