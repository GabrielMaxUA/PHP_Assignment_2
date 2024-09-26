<?php
require('../model/database.php');
$queryProducts = 'SELECT * FROM customers';
$statement = $db-> prepare($queryProducts);
$statement-> execute();
$customers = $statement->fetchAll();
$statement-> closeCursor();

?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>SportsPro Technical Support</title>
    <link rel="stylesheet" type="text/css"
          href="../main.css">
</head>

<!-- the body section -->
<body>
<header>
    <h1>SportsPro Technical Support</h1>
    <p>Sports management software for the sports enthusiast</p>
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
        </ul>
    </nav>
</header>
    <main>
      <h2>Customer Search</h2>
      <form action="customer_search_list.php" method = "post">
        <label for="">Last Name: </label>
        <input type="hidden" name = "custID" value = "<?php echo $customer['custID'];?>"/>  
        <input type="submit" value = "Search"/>
      </form>
  
    <table>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>City</th>
        <th>&nbsp</th> <!-- for delete button -->
      </tr>
        <?php foreach($customers as $customer):?> <!--: instead of { } like in other languages -->
         <tr>
          <td><?php echo ($customer['firstName'] . ' ' . $customer['lastName']);?></td>
          <td><?php echo $customer['email'];?></td>
          <td><?php echo $customer['city'];?></td>
          <td>
            <form action = "delete_tech.php" method = "post">
            <input type="hidden" name = "custID" value = "<?php echo $customer['custID'];?>"/>  
            <input type="submit" value = "Select"/>
            </form>
          </td> <!-- for delete button -->
         </tr>
        <?php endforeach; ?> <!-- end of forearch loop -->
    </table>
    <p class = "option"><a href="add_technician_form.php">Add a technician</a></p>
</main>
    
<?php include '../view/footer.php'; ?>