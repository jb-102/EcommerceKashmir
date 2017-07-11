

<page>
    <div style="color: #333">

        <table style=" border: 1px #ccc; background: #eee; padding:10px; width: 720px;">
            <tr>
                <th style=" width: 730px; text-align: center;">INVOICE</th>
            </tr>
        </table>
        <br/>
        <table style=" padding:8px; width: 720px;">            
            <tr style=" padding: 5px; width: 710px;">
                <td style=" width: 360px; text-align: left"><img src="cardpine.png"></td>
                <td style=" width: 360px; text-align: right">OD #: <?=$_POST['order_id'];?><br/><br/>order date: <?=$order_data['order_date'];?></td>
            </tr>
        </table>
        <br/>
        <table style=" padding:8px; width: 720px;">
            <tr>
                <th colspan="2" style=" border: 1px grey; background: lightgrey; padding: 5px; width: 710px; text-align: center">Customer Details</th>
            </tr>
            <?php

                $billing_address = explode(",", $order_data['billing_address']);


            ?>
            <tr>
                <td style=" padding:5px; width: 345px; text-align: left"><?= $billing_address[0] ?><?php if($billing_address[1] != '' && $billing_address[1] != 'undefined'){ echo '<br/><br/>'.$billing_address[1]; } ?><br/><br/><?= $billing_address[2] ?><br/><br/><?= $billing_address[3] ?></td>
                <td style=" padding:5px;  width: 345px; text-align: right"><?= $billing_address[4] ?> <?php if($billing_address[5] != '' && $billing_address[5] != 'undefined'){ echo ', '.$billing_address[5]; } ?><br/><br/><?= $billing_address[6] ?><br/><br/><?= $billing_address[7] ?><br/><br/><?= $billing_address[8] ?></td>
            </tr>
        </table>
        <br/>
        <table style=" padding:8px; width: 720px;">
            <tr>
                <th style=" padding:5px; border: 1px grey; background: lightgrey; width: 710px; text-align: center">Payment Method</th>
            </tr>
            <tr>
                <td style=" padding:5px; width: 710px; text-align: left"><?= $order_data['payment_mode']; ?></td>
            </tr>
        </table>
        <br/>
        <table style=" border: 1px #ccc; padding:8px; width: 720px;">
            <tr style=" border: 1px grey; background: lightgrey;">
                <th style=" padding:5px; width: 223px; text-align: left">Item(s)</th>
                <th style=" padding:5px;  width: 223px; text-align: center;">Quantity</th>
                <th style=" padding:5px;  width: 223px; text-align: right">Price</th>
            </tr>

            <?php 

                $details = $conn->query("SELECT * FROM order_details WHERE order_id = '".$_POST['order_id']."'");

                $total = 0;

                while ($single_data = $details->fetch_assoc()) {

                    $total += $single_data['total_price'];
            ?>

            <tr>
                <td style=" padding:5px; width: 223px; text-align: left"><?=$single_data['item_name']?></td>
                <td style=" padding:5px; width: 223px; text-align: center"><?=$single_data['item_quantity']?></td>
                <td style=" padding:5px; width: 223px; text-align: right">RS <?=$single_data['total_price']?></td>
            </tr>

            <?php
                }

                $vat = 0.05 * $total;
                $grand_total = $total+$vat;
            ?>

            <tr style=" border: 1px grey; background: #eee;">
                <th colspan="2" style=" padding:5px; width: 446px; text-align: left">Subtotal</th>
                <th style=" padding:5px;  width: 223px; text-align: right">RS <?=$total?></th>
            </tr>
            <tr style=" border: 1px grey; background: #eee;">
                <th colspan="2" style=" padding:5px; width: 446px; text-align: left">Vat</th>
                <th style=" padding:5px;  width: 223px; text-align: right">RS <?=$vat?></th>
            </tr>
            <tr style=" border: 1px grey; background: #eee;">
                <th colspan="2" style=" padding:5px; width: 446px; text-align: left">Grand Total</th>
                <th style=" padding:5px;  width: 223px; text-align: right">RS <?=$grand_total?></th>
            </tr>
        </table>
        <br/><br/>
        <table style=" border: 1px #ccc; background: #eee; padding:10px; width: 720px;">
            <tr>
                <th style=" width: 730px; text-align: center;">THANK YOU, VISIT AGAIN.<br/><br/><a href="www.cardpine.com">www.cardpine.com</a></th>
            </tr>
        </table>


    </div>
</page>
