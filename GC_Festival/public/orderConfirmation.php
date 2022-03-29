<?php
require_once ('header.php');
require_once ('../src/databaseFunctions.php');

//check for order
if(isset($_POST['order'])){
    $order = db_insertData("INSERT INTO orders (userID, ticketID, amount ) VALUES ('". $_POST['userID'] . "', '" . $_POST['ticketSelect'] . "', '" . $_POST['amount'] . "')");
    $newOrder = db_getData("SELECT * FROM orders INNER JOIN tickets ON orders.ticketID = tickets.id WHERE orders.id = " . $order);

}
?>


    <div class="page orderConfirmation">
        <div class="container">
            <h1>Bedankt voor de bestelling!</h1>
            <table class="orderOverview" border="1">
                <tr>
                    <th>Ticket</th>
                    <th>Aantal</th>
                    <th>Prijs</th>
                </tr>
                <tr>
                    <?php
                    while($orderData = $newOrder->fetch_assoc()){
                        ?>
                        <td><?php echo $orderData['name'];?></td>
                        <td><?php echo $orderData['amount'];?></td>
                        <td><?php echo $orderData['amount'] * $orderData['price'];?></td>
                    <?php } ?>
                </tr>
            </table>
        </div>
    </div>



<?php
require_once ('footer.php');

?>