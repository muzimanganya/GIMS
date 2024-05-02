<?php
use yii\helpers\Html;
?>
<figure class="table" style="width:100.0%;">
    <table style=";">
        <tbody>
            <tr>
                <td style="padding:0cm 5.75pt 7.2pt;vertical-align:top;width:270.6pt;">
                    <h2 style="margin-left:0cm;">Company Name</h2>
                    <p style="margin-left:0cm;"><i>Company Slogan</i></p>
                    <p style="margin-left:0cm;">Company Address</p>
                    <p style="margin-left:0cm;">Phone: Enter phone</p>
                    <p style="margin-left:0cm;">Fax: Enter fax</p>
                </td>
                <td style="padding:0cm 0cm 7.2pt;vertical-align:top;width:269.4pt;">
                    <p style="margin-left:0cm;text-align:right;"><span style="color:rgb(89,89,89);"><strong>PURCHASE ORDER</strong></span></p>
                    <h2 style="margin-left:0cm;text-align:right;">#&nbsp;<?= Html::encode($model->purchase_number) ?></h2>
                    <h2 style="margin-left:0cm;text-align:right;">Date: &nbsp;<?= Html::encode($model->po_date) ?></h2>
                </td>
            </tr>
        </tbody>
    </table>
</figure>
<figure class="table" style="width:100.0%;">
    <table>
        <tbody>
            <tr>
                <td style="height:72.0pt;padding:0cm 5.75pt 2.9pt;vertical-align:top;width:270.0pt;">
                    
                <h3 style="margin-left:0cm;">Vendor</h3>
                    <p style="margin-left:0cm;">Name:&nbsp;<?= Html::encode($supplier->NAME) ?></p>
                    <p style="margin-left:0cm;">Address:&nbsp;<?= Html::encode($supplier->address) ?></p>
                    <p style="margin-left:0cm;">Contact Person:&nbsp;<?= Html::encode($supplier->contact_person) ?></p>
                    <p style="margin-left:0cm;">Contact Phone:&nbsp;<?= Html::encode($supplier->contact_phone) ?></p>
                </td>
                <td style="height:72.0pt;padding:0cm 5.75pt 2.9pt;vertical-align:top;width:270.0pt;">
                    <p style="margin-left:0cm;">&nbsp;</p>
                </td>
            </tr>
        </tbody>
    </table>
</figure>
<p style="margin-left:0cm;">&nbsp;</p>
<figure class="table">
    <table style=";">
        <thead>
            <tr>
                <th style="border-bottom-width:1.0pt;border-color:windowtext;border-left-width:1.0pt;border-right-width:1.0pt;border-style:solid;border-top-width:1.5pt;padding:2.15pt 5.75pt;vertical-align:top;width:94.4pt;">
                    <h4 style="margin-left:0cm;text-align:center;">QUANTITY</h4>
                </th>
                <th style="border-bottom:1.0pt solid windowtext;border-left-style:none;border-right:1.0pt solid windowtext;border-top:1.5pt solid windowtext;padding:2.15pt 5.75pt;vertical-align:top;width:283.35pt;">
                    <h4 style="margin-left:0cm;text-align:center;">DESCRIPTION</h4>
                </th>
                <th style="border-bottom:1.0pt solid windowtext;border-left-style:none;border-right:1.0pt solid windowtext;border-top:1.5pt solid windowtext;padding:2.15pt 5.75pt;vertical-align:top;width:76.5pt;">
                    <h4 style="margin-left:0cm;text-align:center;">UNIT PRICE</h4>
                </th>
                <th style="border-bottom:1.0pt solid windowtext;border-left-style:none;border-right:1.0pt solid windowtext;border-top:1.5pt solid windowtext;padding:2.15pt 5.75pt;vertical-align:top;width:85.25pt;">
                    <h4 style="margin-left:0cm;text-align:center;">TOTAL</h4>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item): ?>
            <tr>
                
                
                <td style="border-bottom-style:solid;border-color:windowtext;border-left-style:solid;border-right-style:solid;border-top-style:none;border-width:1.0pt;padding:2.15pt 5.75pt;vertical-align:top;width:94.4pt;">
                    <p style="margin-left:0cm;">&nbsp;<?= Html::encode($item->quantity) ?></p>
                </td>
                <td style="border-bottom:1.0pt solid windowtext;border-left-style:none;border-right:1.0pt solid windowtext;border-top-style:none;padding:2.15pt 5.75pt;vertical-align:top;width:283.35pt;">
                    <p style="margin-left:0cm;">&nbsp;<?= Html::encode($item->product0->NAME) ?></p>
                </td>
                <td style="border-bottom:1.0pt solid windowtext;border-left-style:none;border-right:1.0pt solid windowtext;border-top-style:none;padding:2.15pt 5.75pt;vertical-align:top;width:76.5pt;">
                    <p style="margin-left:0cm;text-align:right;">&nbsp;<?= Html::encode($item->price) ?></p>
                </td>
                <td style="border-bottom:1.0pt solid windowtext;border-left-style:none;border-right:1.0pt solid windowtext;border-top-style:none;padding:2.15pt 5.75pt;vertical-align:top;width:85.25pt;">
                    <p style="margin-left:0cm;text-align:right;">&nbsp;<?= Html::encode($item->quantity*$item->price) ?></p>
                </td>
            </tr>
            <?php endforeach; ?>
            
            <tr>
                <td style="border-bottom-style:solid;border-color:windowtext;border-left-style:solid;border-right-style:solid;border-top-style:none;border-width:1.0pt;padding:2.15pt 5.75pt;vertical-align:top;width:94.4pt;" colspan="3" rowspan="3">
                    <p style="margin-left:100cm;text-align:right;"><strong>SUB TOTAL</strong></p>
                    <p style="margin-left:100cm;text-align:right;"><strong>TAX</strong></p>
                    <p style="margin-left:100cm;text-align:right;"><strong>TOTAL</strong></p>
                </td>
                <td style="border-bottom:1.0pt solid windowtext;border-left-style:none;border-right:1.0pt solid windowtext;border-top-style:none;padding:2.15pt 5.75pt;vertical-align:top;width:85.25pt;">
                    <p style="margin-left:0cm;text-align:right;">&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td style="border-bottom:1.0pt solid windowtext;border-left-style:none;border-right:1.0pt solid windowtext;border-top-style:none;padding:2.15pt 5.75pt;vertical-align:top;width:85.25pt;">
                    <p style="margin-left:0cm;text-align:right;">&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td style="border-bottom:1.0pt solid windowtext;border-left-style:none;border-right:1.0pt solid windowtext;border-top-style:none;padding:2.15pt 5.75pt;vertical-align:top;width:85.25pt;">
                    <p style="margin-left:0cm;text-align:right;">&nbsp;</p>
                </td>
            </tr>
        </tbody>
    </table>
</figure>
<p>&nbsp;&nbsp;</p>
<figure class="table" style="width:100.0%;">
    <table style=";">
        <tbody>
            <tr>
                <td style="padding:14.4pt 5.75pt 5.75pt;vertical-align:top;width:539.5pt;">
                    <p style="margin-left:0cm;">Make all checks payable to Company Name.</p>
                    <p style="margin-left:0cm;">If you have any questions concerning this invoice, contact: Your Nameat Phoneor Email.</p>
                </td>
            </tr>
            <tr>
                <td style="padding:0cm 5.75pt;vertical-align:top;width:539.5pt;">
                    <h4 style="margin-left:0cm;text-align:center;">Thank you for your business!</h4>
                </td>
            </tr>
        </tbody>
    </table>
</figure>
<p style="margin-left:0cm;">&nbsp;</p>