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
            margin: 1px 25px;
            border: #000 solid 1px;
            padding: 0px 10px 0px 10px;
        }

        header,
        footer {
            position: fixed;
            left: 0;
            right: 0;
            width: 100%;
        }

        header {
            top: -50px;
            height: 30px;
        }

        footer {
            bottom: 80px;
            height: 50px;
            text-align: center;
        }

        main {
            margin-top: 120px;

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
            font-size: 16px;
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

        .box-container {
            margin-top: 30px;
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            
        }
        table p {
            font-size: 11px;
            margin: 0;
            padding-top: 11px;
        }

        .box {
            font-size: 15px;

            width: 25px;
            height: 50px;
            margin: 0px 5px 5px 0px;
            display: inline-block;
            text-align: center;
            border: 1px solid #ccc;
            position: relative;
        }

        .box .upper-number {
            position: absolute;
            top: 5px;
            width: 100%;
        }

        .box .lower-number {
            position: absolute;
            bottom: 5px;
            width: 100%;
        }
        .partition-line {
        width: 80%;
        height: 1px;
        background-color: black;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: 50%;
    }
     /* Add space for the footer and header when the page is broken */
     .page-break {
        page-break-before: always;
        margin-top: 120px; /* Add space for the header */
        padding-bottom: 10px; /* Avoid conflict with footer */
    }

    @media print {
        header { display: table-header-group; }
        footer { display: table-footer-group; }
        .no-print { display: none; }
        .page-break { page-break-before: always; margin-top: 120px; padding-bottom: 80px; }
    }
    </style>
</head>

<body>
    <header>
        <div style="text-align: center; margin-top:80px">
            <img src="images/Palrecha-Text-Logo.png" alt="Header Image" width="200" height="50">
        </div>
    </header>
       
    <footer>
        {{-- <img src="images/pdf-footer.jpeg" alt="Footer Image" width="100%"> --}}
    </footer>
    
    <main>
        <table style="width: 100%; border-collapse: collapse; padding: 0px 10px 0px 10px;">
            <tr>
                <td style="width: 50%; vertical-align: top; padding: 10px; border-right: 2px solid black;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <td class="label" style="font-weight: bold; border-bottom: 1px solid black; padding: 5px;">Receipt No:</td>
                            <td style="border-bottom: 1px solid black; padding: 5px;">#{{ $data['receipt_number'] }}</td>
                        </tr>
                       
                        <tr>
                            <td class="label" style="font-weight: bold; border-bottom: 1px solid black; padding: 5px;">Quality:</td>
                            <td style="border-bottom: 1px solid black; padding: 5px;">{{ $data['quality'] }}</td>
                        </tr>
                        
                     
                    </table>
                </td>
                <td style="width: 50%; vertical-align: top; padding: 10px;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <td class="label" style="font-weight: bold; border-bottom: 1px solid black; padding: 5px;">Date:</td>
                            <td style="border-bottom: 1px solid black; padding: 5px;">{{ $data['created_at'] }}</td>
                        </tr>
                       
                        <tr>
                            <td class="label" style="font-weight: bold; border-bottom: 1px solid black; padding: 5px;">Than:</td>
                            <td style="border-bottom: 1px solid black; padding: 5px;">{{ $data['than'] }}</td>
                        </tr>
                       
                      
                    </table>
                </td>
            </tr>
        </table>
        <center>
            <div class="box-container">
                @for ($i = 1; $i <= 392; $i++)
                    @php
                        $box = $packagingSlip->color->firstWhere('color', 'color_' . $i);
                    @endphp
                    <div class="box">
                        <div class="upper-number">{{ $i }}</div>
                        <div class="partition-line"></div>
                        <div class="lower-number">{{ $box ? $box->quantity : '' }}</div>
                    </div>
        
                    {{-- @if ($i % 20 === 0)
                        <div style="clear: both;"></div>
                    @endif --}}
        
                    @if ($i % 240 === 0) 
                        <div class="page-break"></div> <!-- Page break every 100 items -->
                    @endif
                @endfor
            </div>
            
    </center>

    </main>
</body>

</html>
