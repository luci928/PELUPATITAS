<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
    <div id="paypal-button-container"></div>
    <script src="https://www.paypal.com/sdk/js?client-id=ASZC_yBnkjcMoNhT1mpVmKZs-RQ2W6QaAOFFolkhH6-yAgBNlHXtmao4pgyVg1ZA0Su6jfogluVOwuJa&currency=MXN"></script>
    <script>
        paypal.Buttons({
            style: {
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: 
                    [{
                        amount: 
                        {
                            value: '100.00' 
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {//cuando se aprueba el pago 
                return actions.order.capture().then(function(detalles) {
                    window.location.href="completado.html"
                });
            },
            onCancel: function(data) {//se cancela el pago
                alert("Pago cancelado");
                console.log('Order ID:', data.orderID);//mostrar id
            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>
