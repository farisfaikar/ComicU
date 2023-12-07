<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript"src="https://app.stg.midtrans.com/snap/snap.js"data-client-key="{{config('midtrans.client_key')}}"></script>
    <title>Document</title>
</head>
<body>
    <div>
    <table>
        <div>

            <form action="/checkout" method="POST" >
                @csrf
                <div >
                    <label for="qty" >bayar</label>
                    <input type="qty" id="qty" name="qty" required>
                </div>
                <div>
                    <label for="name" >Your
                        nama</label>
                    <input type="name" id="name" name="name"required>
                </div>
                <div>
                    <label for="phone">Your
                        phone</label>
                    <input type="name" id="phone" name="phone"
                      
                        required>
                </div>
                <div>
                    <label for="address" >Your
                        address</label>
                    <input type="name" id="address" name="address"
                      
                        required>
                </div>
                <button type="submit">bayar</button>
            </form>
        </div>
    </body>

    </html>
