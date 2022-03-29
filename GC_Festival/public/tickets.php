<?php
require_once ('header.php');
require_once ('../src/databaseFunctions.php');
require_once ('../src/userFunctions.php');

$tickets = db_getData('select * from tickets');

//Check users login.
$user = null;
if (isset($_POST['login'])){
    $user = getUser($_POST['email'], $_POST['password']);
}
?>
    <div class="page tickets">
        <div class="container">
            <h1>Tickets bestellen</h1>
            <div class="ticketList">
                <?php if ($user !== "No user found" && $user !== null){?>
                    <form action="orderConfirmation.php" method="post">
                        <div class="inputRow">
                            <?php
                            while($userData = $user->fetch_assoc()){
                                ?>
                                    <label for="userID">Gebruikers ID</label>
                                    <input type="number" name="userID" value="<?php echo $userData['id']; ?>">
                                <?php
                            }
                            ?>
                    </div>
                    <div class="inputRow">
                        <label for="ticketSelect">Ticket</label>
                        <select name="ticketSelect">
                            <?php
                            while($ticket = $tickets->fetch_assoc()){
                                ?>
                                <option value="<?php echo $ticket['id']; ?>"><?php echo $ticket['name']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="inputRow">
                        <label for="amount">Hoeveelheid</label>
                        <input type="number" name="amount">
                    </div>
                    <div class="inputRow">
                        <input type="submit" value="Bestellen" name="order">
                    </div>
                </form>
            <?php }else{ ?>
                <form action="#" method="post">
                    <div class="inputRow">
                        <label for="email">Email</label>
                        <input type="email" name="email">
                    </div>
                    <div class="inputRow">
                        <label for="password">wachtwoord</label>
                        <input type="password" name="password">
                    </div>
                    <div class="inputRow">
                        <input type="submit" value="login" name="login">
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
<?php
require_once ('footer.php');
?>