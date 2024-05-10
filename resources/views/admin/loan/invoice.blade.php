<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        p {
            font-size: 18px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Invoice</h1>
        <p><strong>Pembayaran pada Bulan:</strong>{{ $invoice->month }}</p>
        <p><strong>Status:</strong> {{ $invoice->status }}</p>
       <p><strong>Amount:</strong> Rp{{ number_format($invoice->amount, 2, ',', '.') }}</p>
    </div>
</body>
</html>
