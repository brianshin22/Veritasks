<!-- Page where task creator pays for task-->
<h5>Click the button below to submit payment for your newly created task</h5>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

	<!-- Identify your business so that you can collect the payments. -->
	<input type="hidden" name="business" value="veritasks.harvard@gmail.com">

	<!-- Specify a Buy Now button. -->
	<input type="hidden" name="cmd" value="_xclick">

	<!-- Specify details about the item that buyers will purchase. -->
	<input type="hidden" name="item_name" value="Task">
	<input type="hidden" name="amount" value="<?= $price ?>">
	<input type="hidden" name="currency_code" value="USD">

    <input type="hidden" name="return" value="./payment_Page.php">
    
    <input type="hidden" name="notify_url" value="./ipn.php">
    
	<!-- Display the payment button. -->
	<input type="image" name="submit" border="0"
	src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif"
	alt="PayPal - The safer, easier way to pay online">
	<img alt="" border="0" width="1" height="1"
	src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>

