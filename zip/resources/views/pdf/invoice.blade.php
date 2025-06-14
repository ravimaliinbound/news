<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0" />
        <title>Index</title>
        <link rel="icon" href="images//" type="image/gif" sizes="48x48">
    </head>
    <style>
        @page {
                margin: 100px 25px;
            }

            header {
                position: fixed;
                top: -100px;
                left: 0px;
                right: 0px;
                height: 30px;
            }

            footer {
                position: fixed; 
                bottom: 80px; 
                left: 0px; 
                right: 0px;
                height: 50px; 

                /** Extra personal styles **/
                text-align: center;
            }
            main {
                position: fixed;
                top: 100px; 
            }
        table{font-family: Arial, Helvetica, sans-serif; }
        table tr td{ padding: 4px 0; font-size: 16px; color: #000;}
        table.price-table tbody tr td{border-bottom: #000 solid 1px; padding: 7px; }
        table.price-table thead tr td{  padding: 7px; color: #fff; }
        table p{ font-size: 11px; margin: 0px; padding: 11px 0 0 0; }
    </style>
    <body class="enteringpage">
        <header>
            <img src="images/mail-header.jpeg" alt="" width="100%">
        </header>

        <footer style="margin-top: ">
            <img src="images/pdf-footer.jpeg" alt="" width="100%">
        </footer>
        <main>
            <table  cellpadding="0" cellpadding="value" width="100%" style="margin: 0 auto; ">
                <tr>
                    <td style="padding: 0 0 11px;">
                        <table cellpadding="0" cellspacing="0" width="100%" style="padding: 0 20px; vertical-align: top ;" align="start">
                            <tr>
                                <td style="width: 60%; padding: 0 5% 0 0;">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td colspan="2" style="font-weight: bold; color: #99CC5E; font-size: 14px;">To</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 25%; font-weight:bold;">Jober name :</td>
                                            <td style="font-size: 11px;width: 65%;">{{ $data['jober_name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 25%; font-weight:bold;">Quality :</td>
                                            <td style="font-size: 11px;width: 65%;">{{ $data['quality'] }}</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 25%; font-weight:bold;">size :</td>
                                            <td style="font-size: 11px;width: 65%;">{{ $data['size'] }}</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 25%; font-weight:bold;">Length :</td>
                                            <td style="font-size: 11px;width: 65%;">{{ $data['length'] }} </td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 25%; font-weight:bold;" >girth :</td>
                                            <td style="font-size: 11px;width: 65%;">{{ $data['girth'] }}</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 25%; font-weight:bold;" >waist :</td>
                                            <td style="font-size: 11px;width: 65%;">{{ $data['waist'] }}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="width: 40%; vertical-align: middle;float:right">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 10%; font-weight:bold;">Reciept No :</td>
                                            <td style="font-size: 11px;width: 65%;">#{{ $data['receipt_number'] }}</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 35%; font-weight:bold;">Date  :</td>
                                            <td style="font-size: 11px;width: 65%;">{{ $data['created_at'] }}</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 25%; font-weight:bold;">Length :</td>
                                            <td style="font-size: 11px;width: 65%;">{{ $data['length'] }} </td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 35%; font-weight:bold;">petticoat  :</td>
                                            <td style="font-size: 11px;width: 65%;">{{ $data['petticoat'] }} Sq Mt</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 35%; font-weight:bold;">interlock  :</td>
                                            <td style="font-size: 11px;width: 65%;">{{ $data['interlock'] }} Sq Mt</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="price-table" cellpadding="0" cellspacing="0" width="100%" style="padding: 0 20px;">
                            <thead style="background: #99CC5E;">
                                <tr>
                                    <td style="font-size: 11px;width: 40%;">Sr.No</td>
                                    <td style="font-size: 11px;width: 40%;">Description</td>
                                    <td  style="font-size: 11px;width: 20%;">Than </td>
                                    <td  style="font-size: 11px;width: 20%;">Cut</td>
                                    <td  style="font-size: 11px;width: 20%;">Meter</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($packagingSlip->items as $index => $item)
                                <tr>
                                    <td style="font-size: 11px;width: 20%;">{{ $index + 1 }}</td>
                                    <td style="font-size: 11px;width: 20%;">{{ $item->description }}</td>
                                    <td style="font-size: 11px;width: 10%;">{{ $item->than }}</td>
                                    <td style="font-size: 11px;width: 25%;">{{ $item->cut }}</td>
                                    <td style="font-size: 11px;width: 25%;">{{ $item->meter }}</td>
                                </tr>
                            @endforeach                                                              
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        {{-- <table cellpadding="0" cellspacing="0" width="100%" style="padding: 0 20px;">
                            <tr>
                                <td style="width: 50%; padding: 0 5% 0 0;">
                                    <table cellpadding="0" cellspacing="0" width="100%" style="padding:0px  0 0px;">
                                        <tr>
                                            <td colspan="2" style="font-weight: bold; color: #99CC5E; font-size: 12px;">Bank Details </td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 25%; font-weight:bold;">Company name :</td>
                                            <td style="font-size: 11px;width: 65%;"> GUJARAT STATE PLASTIC MANUFACTURERS
                                                ASSOCIATION
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 25%; font-weight:bold;">Bank :</td>
                                            <td style="font-size: 11px;width: 65%;">Bank of India.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 25%; font-weight:bold;">Branch :</td>
                                            <td style="font-size: 11px;width: 65%;">Paldi, Ahmedabad</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 25%; font-weight:bold;">A/c No :</td>
                                            <td style="font-size: 11px;width: 65%;">201120100000151</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 25%; font-weight:bold;">IFSC Code :</td>
                                            <td style="font-size: 11px;width: 65%;">BKID0002011</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 25%; font-weight:bold;">UPI :</td>
                                            <td style="font-size: 11px;width: 65%;">boism-9426426567@boi</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 25%; font-weight:bold;">GSTN :</td>
                                            <td style="font-size: 11px;width: 65%;"> 24AAATG3563A1Z9</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <strong style="color: #005040;">Terms & Conditions:</strong>
                                                <p>1.  You re Requested to deduct the TDS at the rate of 2% u/s 194C.</p>
                                                <p>2.  Additional Discount ** will be applicable only if full payment is made
                                                    before 15th June 2024.
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="width: 50%;">
                                    <table cellpadding="0" cellspacing="0" class="price-table" width="100%" style="padding:0px  0 0px;">
                                        @if(isset($data['booth_price']))
                                            <tr>
                                                <td style="font-size: 11px;color: #99CC5E;">Subtotal </td>
                                                <td style="font-size: 11px;color: #99CC5E;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{ indian_number_format($data['registration_fees'] + $data['stall_rate'] + $data['premium_for_corner_booth']) }}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td style="font-size: 11px;color: #99CC5E;">Subtotal </td>
                                                <td style="font-size: 11px;color: #99CC5E;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{ indian_number_format($data['registration_fees'] + $data['stall_rate']) }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 50%; font-weight:bold;">MSME Discount  </td>
                                            <td style="font-size: 11px;width: 50%;">- <span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{ isset($data['msme_discount']) ? indian_number_format($data['msme_discount']) : 0 }}</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 50%; font-weight:bold;">GSPMA Member Discount</td>
                                            <td style="font-size: 11px;width: 50%;">- <span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{ isset($data['gspma_discount']) ? indian_number_format($data['gspma_discount']) : 0 }}</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 50%; font-weight:bold;">Early Bird Discount</td>
                                            <td style="font-size: 11px;width: 50%;">- <span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{ isset($data['early_bird_discount']) ? indian_number_format($data['early_bird_discount']) : 0 }}</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 50%; font-weight:bold;">Loyalty Discount</td>
                                            <td style="font-size: 11px;width: 50%;">- <span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{ isset($data['loyalty_discount']) ? indian_number_format($data['loyalty_discount']) : 0 }}</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 50%; font-weight:bold;">Special Discount</td>
                                            <td style="font-size: 11px;width: 50%;">- <span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{ isset($data['special_discount']) ? indian_number_format($data['special_discount']) : 0 }}</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 50%; font-weight:bold;">Additional Discount** </td>
                                            <td style="font-size: 11px;width: 50%;">- <span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{ isset($data['cash_discount']) ? indian_number_format($data['cash_discount']) : 0 }}</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #005040;font-size: 11px;width: 50%; font-weight:bold;">Total After Discount </td>
                                            <td style="font-size: 11px;width: 50%;">  <span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{ isset($data['subtotal']) ? indian_number_format($data['subtotal']) : 0 }}</td>
                                        </tr>
                                        @if($data['state'] == 24)
                                            <tr>
                                                <td style="color: #005040;font-size: 11px;width: 50%; font-weight:bold;">SGST 9%</td>
                                                <td style="font-size: 11px;width: 50%;">+ <span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{ isset($data['gst']) ? indian_number_format($data['gst'] / 2) : 0 }}</td>
                                            </tr>
                                            <tr>
                                                <td style="color: #005040;font-size: 11px;width: 50%; font-weight:bold;">CGST 9%</td>
                                                <td style="font-size: 11px;width: 50%;">+ <span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{ isset($data['gst']) ? indian_number_format($data['gst'] / 2) : 0 }}
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td style="color: #005040;font-size: 11px;width: 50%; font-weight:bold;">IGST 18%</td>
                                                <td style="font-size: 11px;width: 50%;">+ <span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{ isset($data['gst']) ? indian_number_format($data['gst']) : 0 }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td style="font-size: 11px;width: 50%; color: #99CC5E;font-weight: bold;">Grand Total </td>
                                            <td style="font-size: 11px;width: 50%; color: #99CC5E;font-weight: bold;">
                                                <span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{ isset($data['grand_amount_before_date']) ? $data['grand_amount_before_date'] : 0 }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table> --}}
                    </td>
                </tr>
            </table>
        </main>
    </body>
</html>