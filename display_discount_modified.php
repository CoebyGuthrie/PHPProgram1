
<?php
    // Get the form data
    $product_description = filter_input(INPUT_POST, 'product_description');
    $list_price = filter_input(INPUT_POST, 'list_price');
    $discount_percent = filter_input(INPUT_POST, 'discount_percent');

    // Data validation
    $list_price = floatval($list_price);  // Ensure the list price is a float
    $discount_percent = floatval($discount_percent);  // Ensure discount percent is a float
    if ($list_price <= 0 || $discount_percent <= 0) {
        exit('Error: All input must be greater than zero.');
    }

    // Calculate the discount
    $discount = $list_price * $discount_percent * 0.01;
    $discount_price = $list_price - $discount;

    // Calculate the sales tax based on the discounted price
    $sales_tax_rate = 8;
    $sales_tax = $discount_price * ($sales_tax_rate / 100);
    $total_price = $discount_price + $sales_tax;

    // Format the numbers to be displayed
    $list_price_f = "$" . number_format($list_price, 2);
    $discount_percent_f = $discount_percent . "%";
    $discount_f = "$" . number_format($discount, 2);
    $discount_price_f = "$" . number_format($discount_price, 2);
    $sales_tax_f = "$" . number_format($sales_tax, 2);
    $total_price_f = "$" . number_format($total_price, 2);
?>
