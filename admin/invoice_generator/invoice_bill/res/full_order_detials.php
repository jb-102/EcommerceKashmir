<page>
    <div style="color: #333">

        <table style=" border: 1px #ccc; background: #eee; padding:10px; width: 720px;">
            <tr>
                <th style=" width: 730px; text-align: center;">FULL ORDER DETAILS</th>
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
                <th colspan="2" style=" border: 1px grey; background: lightgrey; padding: 5px; width: 710px; text-align: center">Shipping Address</th>
            </tr>
            <?php

                $shipping_address = explode(",", $order_data['shipping_address']);
                $billing_address = explode(",", $order_data['billing_address']);

            ?>
            <tr>
                <td style=" padding:5px; width: 345px; text-align: left"><?= $shipping_address[0] ?><?php if($shipping_address[1] != '' && $shipping_address[1] != 'undefined'){ echo '<br/><br/>'.$shipping_address[1]; } ?><br/><br/><?= $shipping_address[2] ?><br/><br/><?= $shipping_address[3] ?></td>
                <td style=" padding:5px;  width: 345px; text-align: right"><?= $shipping_address[4] ?> <?php if($shipping_address[5] != '' && $shipping_address[5] != 'undefined'){ echo ', '.$shipping_address[5]; } ?><br/><br/><?= $shipping_address[6] ?><br/><br/><?= $shipping_address[7] ?><br/><br/><?= $shipping_address[8] ?></td>
            </tr>
            <tr>
                <th colspan="2" style=" border: 1px grey; background: lightgrey; padding: 5px; width: 710px; text-align: center">Billing Address</th>
            </tr>
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
                <td style=" padding:5px; width: 710px; text-align: left"><?=$order_data['payment_mode'];?></td>
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
    </div>
</page>
<page>
    <div style="color: #333">

        <div style="height: 30px;"></div>

        <table style=" padding:8px; width: 720px;">  
            <tr>
                <th colspan="2" style=" border: 1px grey; background: lightgrey; padding: 10px; width: 700px; text-align: center;">Card Details for Order #<?= $_POST['order_id']; ?></th>
            </tr>
            <tr style=" padding: 5px; width: 690px;">
                <td colspan="2" style=" padding: 10px; width: 700px; text-align: center; ">
                    <br/><br/>MRS. & MR. <?= $card_data['mr_mrs']; ?> <br/> cordially invites you to grace and bless the auspecious invitation of the marriage of their <?= $card_data['relation']; ?>
                </td>
            </tr>
            <?php

                $couples = explode(" , ", $card_data['couples']);
                for ($i=0; $i < sizeof($couples); $i++) { 
            ?>
            <tr style=" padding: 5px; width: 690px;">

                <td colspan="2" style=" padding: 10px; width: 700px; text-align: center; ">
                    <?= rtrim($couples[$i]); ?>
                </td>

            </tr>
            <?php

                }

            ?>
            <tr style=" padding: 5px; width: 690px;">
                <td colspan="2" style=" padding: 10px; width: 700px; text-align: center; ">
                    Son(s)/Daughter(s) of <?= $card_data['in_law_mr_mrs']; ?> respectively 
                </td>
            </tr>
            <tr style=" padding: 5px; width: 690px;">
                <td colspan="2" style=" padding: 10px; width: 700px; text-align: center; ">
                    at there residence <br/> <?= $card_data['residence']; ?> <br/> as per program 
                </td>
            </tr>
            <tr style=" padding: 5px; width: 690px;">

                <td colspan="2" style=" padding: 10px; width: 700px; text-align: center; ">
                    <table style=" padding: 5px; width: 690px; ">
                        <tr>
                            <th style=" padding: 5px; width: 120px; ">FUNCTION</th>
                            <th style=" padding: 5px; width: 120px; ">DAY & DATE</th>
                            <th style=" padding: 5px; width: 120px; ">TIME</th>
                            <th style=" padding: 5px; width: 120px; ">GENTS</th>
                            <th style=" padding: 5px; width: 120px; ">LADIES</th>
                        </tr>
                    <?php

                        $functions = explode(" , ", $card_data['functions']);

                        for ($i=0; $i < sizeof($functions); $i++) { 


                        $first_explode = explode(' on ', $functions[$i]);
                        $second_explode = explode(' at ', $first_explode[1]);
                        $third_explode = explode(' = ', $second_explode[0]);
                        $fourth_explode =  explode(' and ', $second_explode[1]);
                        $fifth_explode = explode(' = ', $fourth_explode[0]);
                        $sixth_explode = explode(' = ', $fourth_explode[1]);


                    ?>
                        <tr>
                            <td style=" padding: 5px; width: 120px; "><?= rtrim($first_explode[0]); ?></td>
                            <td style=" padding: 5px; width: 120px; "><?= rtrim($third_explode[1]); ?></td>
                            <td style=" padding: 5px; width: 120px; ">gents : <?= rtrim($fifth_explode[1]); ?><br/>ladies : <?= rtrim($sixth_explode[1]); ?></td>
                            <td style=" padding: 5px; width: 120px; ">---</td>
                            <td style=" padding: 5px; width: 120px; ">---</td>
                        </tr>

                    <?php

                        }

                    ?>

                    </table> 
                </td>

            </tr>
            <tr style=" padding: 5px; width: 690px;">
                <td style=" width: 340px; padding:5px; text-align: center;">R.S.V.P<br/><?= $card_data['rsvp']; ?></td>
                <td style=" width: 340px; padding:5px; text-align: center;">BEST COMPLIMENTS<br/><?= $card_data['compliments']; ?></td>
            </tr>
            <tr style=" padding: 5px; width: 690px;">
                <?php 

                    if ($card_data['labels_file'] != NULL || rtrim($card_data['labels_file']) != '') {
                        $link = "http://cardpine.com/allow_me/labels/".$card_data['labels_file'];
                ?>
                <td colspan="2" style=" padding: 10px; width: 700px; text-align: center;"><br/>LABELS FILE : <a href="<?= $link; ?>"><?= $card_data['labels_file']; ?></a></td>

                <?php

                    } 

                ?>
            </tr>
        </table>

    </div>
</page>