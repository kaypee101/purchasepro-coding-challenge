<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
        }

        .container {
            max-width: 850px;
            margin: 10px auto 0;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        h5 {
            color: #333;
        }

        p {
            color: #666;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="block-user">
            <h3>Hello {{ $cartInfo->user->name }}!</h3>
        </div>

        <div class="block-content">
            <p>{{ $message1 }}</p>

            <table>
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Item Name</td>
                        <td>Item Type</td>
                        <td>Quantity</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartInfo->products as $i => $product)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_type }}</td>
                            <td>{{ $product->product_quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <p>{{ $message2 }}</p>
            <p>{{ $message3 }}</p>
        </div>




    </div>
</body>

</html>
