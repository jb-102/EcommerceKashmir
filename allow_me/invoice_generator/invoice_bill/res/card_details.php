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