<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Index</title>
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
            top: -120px;
            height: 30px;
        }

        footer {
            bottom: 80px;
            height: 50px;
            text-align: center;
        }

        main {
            margin-top: 80px;

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
            font-size: 19px;
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
            font-size: 16px;
            margin: 0;
            padding-top: 11px;
        }
    </style>
</head>

<body>
    <header>
        <div style="text-align: center; margin-top:80px">
            <img src="images/Palrecha-Text-Logo.png" alt="Header Image" width="200" height="50">
        </div>
    </header>
    {{--    
    <footer>
        <img src="images/pdf-footer.jpeg" alt="Footer Image" width="100%">
    </footer>
     --}}
    <main>
        <table style="width: 100%; border-collapse: collapse;border: 2px solid black; padding: 0px 20px 0px 20px;">
            <tr>
                <td>
                    <table style="width: 100%;padding: 10px;">
                        <tr>
                            <td style="width: 100%; vertical-align: top; padding: 10px;">
                                <table style="width: 100%;">
                                    <tr>
                                        <td class="label" style="font-weight: bold;border-bottom: 1px solid black;">
                                            Receipt No:</td>
                                        <td style="border-bottom: 1px solid black">#{{ $data['id'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label"
                                            style="font-weight: bold;border-bottom: 1px solid black;border-top: 1px solid black">
                                            Jober Name:</td>
                                        <td style="border-bottom: 1px solid black;border-top: 1px solid black">
                                            {{ $data['name'] }}</td>
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
                        style="width: 100%; padding:3px; text-align: center;border: 2px solid black; border-collapse: collapse;">
                        <thead>
                            <tr style="border-top: 2px solid black; border-bottom: 2px solid black;">
                                <td style="padding: 10px; font-weight: bold; border-right: 2px solid black">Quality
                                </td>
                                <td style="padding: 10px; font-weight: bold; border-right: 2px solid black;">Total  Quantity</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding: 8px; border-bottom: 1px solid black; border-right: 2px solid black">
                                    {{ $data['quality'] }}</td>
                                <td
                                    style="padding: 8px; border-bottom: 1px solid black; border-right: 1px solid black;">
                                    {{    $data['quantity'] }}</td>
                            </tr>

                        </tbody>
                    </table>


                </td>
            </tr>

            <tr>
                <td>
                    <table style="width: 100%; padding: 10px;">
                        <tr>
                            <td style="width: 100%; vertical-align: top; padding: 10px;">
                                {{-- <table style="width: 100%;">

                                    <tr>
                                        <td class="label" style="font-weight: bold;;border-bottom: 1px solid black;">
                                            Car Number:</td>
                                        <td style=";border-bottom: 1px solid black;">{{ $data['car_number'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label" style="font-weight: bold;border-bottom: 1px solid black;">
                                            Driver Name:</td>
                                        <td style="border-bottom: 1px solid black;">{{ $data['driver_name'] }}</td>
                                    </tr>
                                </table> --}}
                                <table style="width: 100%;padding-top: 50px">
                                    <tr>
                                        <td style=""></td>
                                        <td style=""></td>
                                    </tr>

                                    <tr>
                                        <td class="label" style="font-weight: bold;">Signature</td>
                                        <td class="label" style="font-weight: bold; text-align: center;">Signature</td>
                                    </tr>

                                </table>
                            </td>

                        </tr>
                    </table>
                </td>
            </tr>
        </table>

    </main>
</body>

</html>
