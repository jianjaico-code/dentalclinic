<style>
    * {
    font-size: 12px;
    font-family: 'Times New Roman';
}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.description,
th.description {
    width: 75px;
    max-width: 75px;
}

td.quantity,
th.quantity {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

td.price,
th.price {
    width: 200px;
    max-width: 810px;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 210px;
    max-width: 210px;
}

img {
    max-width: inherit;
    width: inherit;
}

@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
</style>

<?php 
    require_once "connection.php";

    $getDetails = $conn -> prepare("SELECT * FROM _tblpos_detail a INNER JOIN tblmaterials b ON a.MaterialID = b.MaterialID WHERE a.ORNumber = ?");
    $getDetails -> execute([$_GET['ornumber']]);
    $getDetails = $getDetails -> fetchAll();

    $total = 0;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css">
        <title>Receipt</title>
    </head>
    <body>
        <div class="ticket">
            <img src="./assets/img/logo-ct.png" alt="Logo">
            <p class="centered">
                Lourdes Clinic Portal<br>
                <br>Cagayan de Oro City</p>

            OR Number: <b>#<?php echo $_GET['ornumber'] ?></b><br>
            INV Number: <b>#<?php echo $_GET['invoicenumber'] ?></b>
            
            <table style="margin-top:5px;">
                <thead>
                    <tr>
                        <th class="quantity">Q</th>
                        <th class="description">Description</th>
                        <th class="price">Price</th>
                        <th class="price">Amnt</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($getDetails as $detail): $total += $detail['FinalAmount']; ?>
                    <tr>
                        <td class="quantity"><?php echo number_format($detail['Quantity']) ?></td>
                        <td class="description"><?php echo $detail['MaterialDescription'] ?></td>
                        <td class="price">₱<?php echo number_format($detail['price'], 2) ?></td>
                        <td class="price">₱<?php echo number_format($detail['FinalAmount'], 2) ?></td>
                    </tr>
                    <?php endforeach ?>
                    <tr>
                        <td class="quantity"></td>
                        <td class="description">TOTAL</td>
                        <td class="price"></td>
                        <td class="price">₱<?php echo number_format($total, 2) ?></td>
                    </tr>
                </tbody>
            </table>
            <p class="centered">Thanks for your purchase!
                <!-- <br>insourceit.com</p> -->
        </div>
    </body>
</html>

<script>

        window.print();

</script>