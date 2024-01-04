<?php
  $conversionRate = [
    'AUD' => 1.624, 
    'EUR' => 1.0,
    'GBP' => 0.865,
    'USD' => 1.092,
  ];


  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['submitBtn'])) {
      $from = $_GET['currencyFrom'] ?? '';
      $to = $_GET['currencyTo'] ?? '';
      $amount = $_GET['currencyAmount'] ?? 0;
      var_dump($_GET);

      if (isset($conversionRate[$from]) && isset($conversionRate[$to]) && is_numeric($amount)) {
        $converted_amount = $amount * ($conversionRate[$to] / $conversionRate[$from]);
        $rounded_amount = number_format($converted_amount, 2);
        echo "<p class='result'>$amount $from is equal to $rounded_amount $to</p>";
      } else {
        echo "<p class='result'>Please select valid currencies and enter a valid amount.</p>";
      }
        // Handle form submission logic here
    } else if (isset($_GET['swapBtn'])) {
        echo "Swap button was clicked! Ö";
        // Handle swap logic here
    }
}
  // // Check if the form is submitted
  // if ($_SERVER['REQUEST_METHOD'] === 'GET' && in_array("submitBtn", $_GET)) {
  //   // Retrieve form data
  //   $from = $_GET['currencyFrom'] ?? '';
  //   $to = $_GET['currencyTo'] ?? '';
  //   $amount = $_GET['currencyAmount'] ?? 0;
  //   var_dump($_GET);
  //   // Perform conversion if valid currencies are selected
  //   if (isset($conversionRate[$from]) && isset($conversionRate[$to]) && is_numeric($amount)) {
  //       $converted_amount = $amount * ($conversionRate[$to] / $conversionRate[$from]);
  //       $rounded_amount = number_format($converted_amount, 2);
  //       echo "<p class='result'>$amount $from is equal to $rounded_amount $to</p>";
  //   } else {
  //       echo "<p class='result'>Please select valid currencies and enter a valid amount.</p>";
  //   }
  // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <main>
    <form id="currencyForm" action="" method="get">
      <div class="optionWrapper">
        <label for="currencyFrom">From:</label>
        <select id="currencyFrom" name="currencyFrom">
          <option value="AUD">AUD</option>
          <option value="EUR">EUR</option>
          <option value="GBP">GBP</option>
          <option value="USD">USD</option>
        </select>
        <button name="swapBtn" class="currencySwap"></button>
        <label for="currencyTo">To:</label>
        <select id="currencyTo" name="currencyTo">
        <option value="AUD">AUD</option>
          <option value="EUR">EUR</option>
          <option value="GBP">GBP</option>
          <option value="USD">USD</option>
        </select>
      </div>
      <div class="amountWrapper">
        <label for="currencyAmount">Amount:</label>
        <input type="number" name="currencyAmount" id="currencyAmount"> 
        <input name="submitBtn" type="submit" id="submitBtn">
        <p class="resultLabel">Result:</p>
        <?php 
        // echo "<p class='result'>$amount $from is equal to $rounded_amount $to</p>";
        ?>
      </div>
    </form>
  </main>
</body>
</html>

