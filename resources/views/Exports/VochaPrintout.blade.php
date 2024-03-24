<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOCHA LIST</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .page {
            width: 8.27in; /* A4 width */
            height: 11.69in; /* A4 height */
            margin: 0 auto;
            padding: 0.5in; /* Adjust padding as needed */
        }
        .rectangle {
            width: 2in; /* Rectangle width */
            height: 1in; /* Rectangle height */
            border: 1px solid #000; /* Rectangle border */
            margin-bottom: 0.2in; /* Spacing between rectangles */
            padding: 0.2in; /* Padding inside rectangle */
            float: left;
            margin-right: 0.2in; /* Spacing between rectangles */
            position: relative;
        }
        .transaction-id {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .barcode {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="page">
        @foreach($vocha as $voc)
            <div class="rectangle">
                <div class="transaction-id">vocha: {{ $voc->voucher_value }}</div>
                <div class="transaction-code">Code: {{ $voc->voucher_code }}</div>
                <div class="barcode">
                    {!! DNS1D::getBarcodeHTML($voc->voucher_code, 'C39', 1, 50) !!} <!-- Barcode for Transaction ID -->
                    
                </div>
            </div>
            @if ($loop->iteration % 50 == 0)
                <div style="page-break-after: always;"></div> <!-- Page break after every 50 rectangles -->
            @endif
        @endforeach
    </div>
</body>
</html>
