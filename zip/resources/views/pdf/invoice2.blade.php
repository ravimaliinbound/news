<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $data['jober_name'] }}</title>
    <link rel="icon" href="images/favicon.ico" type="image/gif" sizes="48x48">
    <style>
        @page {
            margin: 100px 25px;
        }

        header,
        footer {
            position: fixed;
            left: 0;
            right: 0;
            width: 100%;
        }

        header {
            top: -100px;
            height: 30px;
        }

        .table-container {
            flex-grow: 1;
            overflow: hidden;
        }

        table {
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            padding: 4px 0;
            font-size: 13px;
            color: #000;
        }

        .price-table tbody td {
            border-bottom: 1px solid #000;
            padding: 7px;
        }

        .price-table thead td {
            padding: 7px;
            color: #fff;
            background: #99CC5E;
        }

        table p {
            font-size: 15px;
            margin: 0;
            padding-top: 11px;
        }

        /* Force proper table breaking */
        table,
        tr,
        td,
        th {
            page-break-inside: avoid;
            /* page-break-after: auto; */
        }
    </style>
</head>

<body>
    <header>
        <div style="text-align: center; margin-top:10px">
            <img src="images/Palrecha-Text-Logo.png" alt="Header Image" width="200" height="50">
        </div>
    </header>
    {{--    
    <footer>
        <img src="images/pdf-footer.jpeg" alt="Footer Image" width="100%">
    </footer>
     --}}
    <main>
        <table style="width: 100%; border: 2px solid black; border-collapse: collapse; padding: 0px 20px 0px 20px;">
            <tr>
                <td>
                    <table style="width: 100%; border-bottom: 2px solid black; padding: 10px;">
                        <tr>
                            <td style="width: 50%; vertical-align: top; padding: 10px;">
                                <table style="width: 100%;">
                                    <tr>
                                        <td class="label" style="font-weight: bold;">Receipt No:</td>
                                        <td>#{{ $data['receipt_number'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label" style="font-weight: bold;">Jober Name:</td>
                                        <td>{{ $data['jober_name'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label" style="font-weight: bold;">Quality:</td>
                                        <td>{{ $data['quality'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label" style="font-weight: bold;">Size:</td>
                                        <td>{{ $data['size'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label" style="font-weight: bold;">Party's Choice:</td>
                                        <td style="font-size: 13px">{{ $data['petticoat'] }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="width: 50%; vertical-align: top; padding: 10px;">
                                <table style="width: 100%;">
                                    <tr>
                                        <td class="label" style="font-weight: bold;">Date:</td>
                                        <td>{{ $data['created_at'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label" style="font-weight: bold;">Waist:</td>
                                        <td>{{ $data['waist'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label" style="font-weight: bold;">Girth:</td>
                                        <td>{{ $data['girth'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label" style="font-weight: bold;">Length:</td>
                                        <td>{{ $data['length'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label" style="font-weight: bold;">Interlock:</td>
                                        <td>{{ $data['interlock'] }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="price-table table-container"
                        style="width: 100%; text-align: center; border-collapse: collapse;">
                        <thead>
                            <tr style="border-top: 2px solid black; border-bottom: 2px solid black;">
                                <td style="padding: 10px; font-weight: bold;">Sr.No</td>
                                <td style="padding: 10px; font-weight: bold; border-right: 2px solid black">Description
                                </td>
                                <td style="padding: 10px; font-weight: bold; border-right: 2px solid black;">Than</td>
                                <td style="padding: 10px; font-weight: bold; border-right: 2px solid black;">Cut</td>
                                <td style="padding: 10px;">Meter</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packagingSlip->items as $index => $item)
                                <tr>
                                    <td style="padding: 8px; border-bottom: 1px solid black;">{{ $index + 1 }}</td>
                                    <td
                                        style="padding: 8px; border-bottom: 1px solid black; border-right: 2px solid black">
                                        {{ $item->description }}</td>
                                    <td
                                        style="padding: 8px; border-bottom: 1px solid black; border-right: 1px solid black;">
                                        {{ $item->than }}</td>
                                    <td
                                        style="padding: 8px; border-bottom: 1px solid black; border-right: 1px solid black;">
                                        {{ $item->cut }}</td>
                                    <td style="padding: 8px; border-bottom: 1px solid black;">{{ $item->meter }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <!-- Total Row at the bottom -->
                        <tfoot style="font-weight: bold; margin-top: 222px !important;">
                            <tr style="font-weight: bold; border-top: 2px solid black;">
                                <td colspan="2"
                                    style="padding: 10px; text-align: right;border-right: 1px solid black; ">Total:</td>
                                <td style="padding: 10px; ">{{ $packagingSlip->items->sum('than') }}</td>
                                <td style="padding: 10px;"></td>
                                <td style="padding: 10px;">{{ $packagingSlip->items->sum('meter') }}</td>
                            </tr>
                        </tfoot>
                    </table>


                </td>
            </tr>

            
        </table>

    </main>
</body>

</html>
