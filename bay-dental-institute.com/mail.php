<?php
    include "conn.php";
    session_start();
    date_default_timezone_set('Asia/Kolkata');
    function convertToWords($number)    {
        $no = round($number);
        $hundred = null;
        $digits_1 = strlen($no);
        $i = 0;
        $str = array();
        $words = array('0' => '', '1' => 'One', '2' => 'Two',
            '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
            '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
            '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
            '13' => 'Thirteen', '14' => 'Fourteen',
            '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
            '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
            '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
            '60' => 'Sixty', '70' => 'Seventy',
            '80' => 'Eighty', '90' => 'Ninety');
        $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
        while ($i < $digits_1) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += ($divider == 10) ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number] .
                    " " . $digits[$counter] . $plural . " " . $hundred
                    :
                    $words[floor($number / 10) * 10]
                    . " " . $words[$number % 10] . " "
                    . $digits[$counter] . $plural . " " . $hundred;
            } else $str[] = null;
        }
        $str = array_reverse($str);
        $result = implode('', $str);
        return "&#x20b9; " . $result . " only";
    }

    function prependZeros($number)  {
        if ($number < 10)
            return '00' . $number;
        else if ($number >= 10 && $number < 100)
            return '0' . $number;
        else
            return '' . $number;
    }

    function checkAfterApril() {
        $todays_year = date('Y');
        $previous_year = date("Y",strtotime("-1 year"));
        $next_year = date("Y", strtotime("+1 year"));

        $today_date = date("Y-m-d H:i:s");
        $check_date = $todays_year . "-04-01 00:00:00";

        if ($today_date < $check_date)    {
            return $previous_year . "-" . substr($todays_year, 2);
        }   else   {
            return $todays_year . "-" . substr($next_year, 2);
        }

    }


    // Generate the invoice number
    $result_array = array();
    $query = 'select * from `transactions_new` order by invoice_id desc;';
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result))   {
        array_push($result_array, $row);
    }
    $recent_invoice = $result_array[0]["invoice_number"];
    $recent_invoice_array = explode("/", $recent_invoice);

    if (checkAfterApril() == $recent_invoice_array[1])
        $new_invoice_number = prependZeros(((int)$recent_invoice_array[0])+1);
    else
        $new_invoice_number = prependZeros(1);

    $final_invoice_number = $new_invoice_number . "/" . checkAfterApril();

    // Get customer details
    $customer_query = "select * from `client` where username = '" . $_SESSION["username"] . "';";
    $customer_result = mysqli_query($conn, $customer_query);
    $customer_row = mysqli_fetch_assoc($customer_result);

    // Form the mail body
    $total_cost = 0;
    $razor_pay_transaction_id = isset($_POST['razorpay_payment_id']) ? $_POST['razorpay_payment_id'] : 'Sample';
    $mail_body = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <title></title>   
        <style>
            html {font-family: sans-serif;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;}
            h1 {font-size: 2em;margin: 0.67em 0;}
            table {border-collapse: collapse;border-spacing: 0;}
            td,th {padding: 0;}
            @media print {
                *,*:before,*:after {color: #000 !important;text-shadow: none !important;background: transparent !important;-webkit-box-shadow: none !important;box-shadow: none !important;}
                thead {display: table-header-group;}
                tr,img {page-break-inside: avoid;}
                p,h2,h3 {orphans: 3;widows: 3;}
                h2,h3 {page-break-after: avoid;}
                .table {border-collapse: collapse !important; background-color: transparent;}
                .table td,.table th {background-color: #fff !important;}
                .table-bordered th,.table-bordered td {border: 1px solid #ddd !important;}
            }
            .text-center {text-align: center}
            .container {padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;}
            @media (min-width: 768px) {.container {width: 750px;}}
            @media (min-width: 992px) {.container {width: 970px;}}
            @media (min-width: 1200px) {.container {width: 1170px;}}  
            table col[class*="col-"] {position: static;display: table-column;float: none;}
            table td[class*="col-"],table th[class*="col-"] {position: static;display: table-cell;float: none;}
            .table {width: 100%;max-width: 100%;margin-bottom: 20px;}
            .table > thead > tr > th,.table > tbody > tr > th,.table > tfoot > tr > th,.table > thead > tr > td,.table > tbody > tr > td,.table > tfoot > tr > td {padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;}
            .table > thead > tr > th {vertical-align: bottom;border-bottom: 2px solid #ddd;}
            .table > caption + thead > tr:first-child > th,.table > colgroup + thead > tr:first-child > th,.table > thead:first-child > tr:first-child > th,.table > caption + thead > tr:first-child > td,.table > colgroup + thead > tr:first-child > td,.table > thead:first-child > tr:first-child > td {border-top: 0;}
            .table > tbody + tbody {border-top: 2px solid #ddd;}
            .table .table {background-color: #fff;}
            .table-condensed > thead > tr > th,.table-condensed > tbody > tr > th,.table-condensed > tfoot > tr > th,.table-condensed > thead > tr > td,.table-condensed > tbody > tr > td,.table-condensed > tfoot > tr > td {padding: 5px;}
            .table-bordered {border: 1px solid #ddd;}
            .table-bordered > thead > tr > th,.table-bordered > tbody > tr > th,.table-bordered > tfoot > tr > th,.table-bordered > thead > tr > td,.table-bordered > tbody > tr > td,.table-bordered > tfoot > tr > td {border: 1px solid #ddd;}
            .table-bordered > thead > tr > th,.table-bordered > thead > tr > td {border-bottom-width: 2px;}
            .table-striped > tbody > tr:nth-of-type(odd) {background-color: #f9f9f9;}
            .table-hover > tbody > tr:hover {background-color: #f5f5f5;}
            .table > thead > tr > td.active,.table > tbody > tr > td.active,.table > tfoot > tr > td.active,.table > thead > tr > th.active,.table > tbody > tr > th.active,.table > tfoot > tr > th.active,.table > thead > tr.active > td,.table > tbody > tr.active > td,.table > tfoot > tr.active > td,.table > thead > tr.active > th,.table > tbody > tr.active > th,.table > tfoot > tr.active > th {background-color: #f5f5f5;}
            .table-hover > tbody > tr > td.active:hover,.table-hover > tbody > tr > th.active:hover,.table-hover > tbody > tr.active:hover > td,.table-hover > tbody > tr:hover > .active,.table-hover > tbody > tr.active:hover > th {background-color: #e8e8e8;}
            .table > thead > tr > td.success,.table > tbody > tr > td.success,.table > tfoot > tr > td.success,.table > thead > tr > th.success,.table > tbody > tr > th.success,.table > tfoot > tr > th.success,.table > thead > tr.success > td,.table > tbody > tr.success > td,.table > tfoot > tr.success > td,.table > thead > tr.success > th,.table > tbody > tr.success > th,.table > tfoot > tr.success > th {background-color: #dff0d8;}
            .table-hover > tbody > tr > td.success:hover,.table-hover > tbody > tr > th.success:hover,.table-hover > tbody > tr.success:hover > td,.table-hover > tbody > tr:hover > .success,.table-hover > tbody > tr.success:hover > th {background-color: #d0e9c6;}
            .table > thead > tr > td.info,.table > tbody > tr > td.info,.table > tfoot > tr > td.info,.table > thead > tr > th.info,.table > tbody > tr > th.info,.table > tfoot > tr > th.info,.table > thead > tr.info > td,.table > tbody > tr.info > td,.table > tfoot > tr.info > td,.table > thead > tr.info > th,.table > tbody > tr.info > th,.table > tfoot > tr.info > th {background-color: #d9edf7;}
            .table-hover > tbody > tr > td.info:hover,.table-hover > tbody > tr > th.info:hover,.table-hover > tbody > tr.info:hover > td,.table-hover > tbody > tr:hover > .info,.table-hover > tbody > tr.info:hover > th {background-color: #c4e3f3;}
            .table > thead > tr > td.warning,.table > tbody > tr > td.warning,.table > tfoot > tr > td.warning,.table > thead > tr > th.warning,.table > tbody > tr > th.warning,.table > tfoot > tr > th.warning,.table > thead > tr.warning > td,.table > tbody > tr.warning > td,.table > tfoot > tr.warning > td,.table > thead > tr.warning > th,.table > tbody > tr.warning > th,
            .table > tfoot > tr.warning > th {background-color: #fcf8e3;}
            .table-hover > tbody > tr > td.warning:hover,.table-hover > tbody > tr > th.warning:hover,.table-hover > tbody > tr.warning:hover > td,.table-hover > tbody > tr:hover > .warning,.table-hover > tbody > tr.warning:hover > th {background-color: #faf2cc;}
            .table > thead > tr > td.danger,.table > tbody > tr > td.danger,.table > tfoot > tr > td.danger,.table > thead > tr > th.danger,.table > tbody > tr > th.danger,.table > tfoot > tr > th.danger,.table > thead > tr.danger > td,.table > tbody > tr.danger > td,.table > tfoot > tr.danger > td,.table > thead > tr.danger > th,.table > tbody > tr.danger > th,.table > tfoot > tr.danger > th {background-color: #f2dede;}
            .table-hover > tbody > tr > td.danger:hover,.table-hover > tbody > tr > th.danger:hover,.table-hover > tbody > tr.danger:hover > td,.table-hover > tbody > tr:hover > .danger,.table-hover > tbody > tr.danger:hover > th {background-color: #ebcccc;}
            .table-responsive {min-height: 0.01%;overflow-x: auto;}
            @media screen and (max-width: 767px) {.table-responsive {width: 100%;margin-bottom: 15px;overflow-y: hidden;-ms-overflow-style: -ms-autohiding-scrollbar;border: 1px solid #ddd;}
            .table-responsive > .table {margin-bottom: 0;}
            .table-responsive > .table > thead > tr > th,.table-responsive > .table > tbody > tr > th,.table-responsive > .table > tfoot > tr > th,.table-responsive > .table > thead > tr > td,.table-responsive > .table > tbody > tr > td,.table-responsive > .table > tfoot > tr > td {white-space: nowrap;}
            .table-responsive > .table-bordered {border: 0;}
            .table-responsive > .table-bordered > thead > tr > th:first-child,.table-responsive > .table-bordered > tbody > tr > th:first-child,.table-responsive > .table-bordered > tfoot > tr > th:first-child,.table-responsive > .table-bordered > thead > tr > td:first-child,.table-responsive > .table-bordered > tbody > tr > td:first-child,.table-responsive > .table-bordered > tfoot > tr > td:first-child {border-left: 0;}
            .table-responsive > .table-bordered > thead > tr > th:last-child,.table-responsive > .table-bordered > tbody > tr > th:last-child,.table-responsive > .table-bordered > tfoot > tr > th:last-child,.table-responsive > .table-bordered > thead > tr > td:last-child,.table-responsive > .table-bordered > tbody > tr > td:last-child,.table-responsive > .table-bordered > tfoot > tr > td:last-child {border-right: 0;}
            .table-responsive > .table-bordered > tbody > tr:last-child > th,.table-responsive > .table-bordered > tfoot > tr:last-child > th,.table-responsive > .table-bordered > tbody > tr:last-child > td,.table-responsive > .table-bordered > tfoot > tr:last-child > td {border-bottom: 0;}}          
        </style>
        </head>
        <body>
        <div class="container">
            <div style="border: solid black; padding: 0 20px 0 20px">
                <h2 class="text-center">INVOICE</h2>
                <h5 class="text-center">Mobile: 9820958880</h5>
                <h1 class="text-center">Bay Dental Training Institute</h1>
                <h3 class="text-center">(Prop: Shravan Kishore Chawla HUF)</h3>
                <h6 class="text-center">Regd, off. :-404-A, Neela Kanth Building, 98, Marine Drive, Mumbai-400002</h6>
                <p class="text-center"><b>Invoice No. ' . $final_invoice_number . '</b></p>
                <div class="text-center"><b> Date : ' . date("d/m/Y") . '</b></div>
                <p><b>' . $customer_row["username"] . '</b></p>
                <p><b>Tel. No. ' . $customer_row["mobileNo"] . '</b></p>
                <br>
                <p><b>Address:- ' . $customer_row["address"] . '</b></p>
                <h4 class="text-center"><b>Your Course Has Been Booked!</b></h4>
            </div>
            <br>
            <div>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th width="10%" class="text-center">Sr. No.</th>
                            <th class="text-center">Description of Course</th>
                            <th class="text-center">Amount</th>
                        </tr>
                    </thead>
                    <tbody>';
                    // Get courses from cart
                    $query = "select courses.course_name, courses.course_cost from `courses` inner join `cart` on courses.course_id = cart.course_id where cart.username = '" . $_SESSION['username'] . "';";
                    $result = mysqli_query($conn, $query);
                    $index = 1;
                    while($row = mysqli_fetch_assoc($result))   {
                        $mail_body .= '<tr>';
                        $mail_body .= '<td>' . $index++ . '</td>';
                        $mail_body .= '<td>' . $row['course_name'] . '</td>';
                        $total_cost += (int)$row['course_cost'];
                        $mail_body .= '<td> &#x20b9; ' . $row['course_cost'] . '/- </td>';
                        $mail_body .= '</tr>';
                    }

                    // Get courses from store
                    $query = "select store_products.product_name, store_products.product_price from `store_products` inner join `store_cart` on store_products.id = store_cart.product_id where store_cart.username = '" . $_SESSION['username'] . "';";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($result))   {
                        $mail_body .= '<tr>';
                        $mail_body .= '<td>' . $index++ . '</td>';
                        $mail_body .= '<td>' . $row['product_name'] . '</td>';
                        $total_cost += (int)$row['product_price'];
                        $mail_body .= '<td> &#x20b9; ' . $row['product_price'] . '/-</td>';
                        $mail_body .= '</tr>';
                    }

                    $mail_body .= '<tr>';
                    $mail_body .= '<td></td>';
                    $mail_body .= '<td><b>Total : </b></td>';
                    $mail_body .= '<td> &#x20b9; ' . $total_cost . '/-</td>';
                    $mail_body .= '</tr>';

                    $mail_body .= '<tr><td></td><td colspan="2"><b>' . convertToWords($total_cost) . '</b></td>';
                    $mail_body .= '</tbody></table>';
                    $mail_body .= '</div></div><br>';

                    $mail_body .= '
                    <div class="container"
                        <div style="border: solid black; padding: 10px 20px 10px 20px; margin-bottom: 40px">
                            <div class="row">
                                <div class="col-md-8">Remarks:-</div>
                                <div class="col-md-4">For Bay Dental Training Institute</div>
                            </div>
                            <br>
                            <p> &#x20b9; ' . $total_cost . '/- received on ' . date("d/m/Y") . ' with <b>Payment Reference No. ' . $razor_pay_transaction_id . '</b></p>
                            <h4>This is an auto-generated invoice.</h4>
                            <b>GST Not applicable as firm is yet to qualify in order to obtain GST Number.</b>
                        </div>
                    </div></body></html>';