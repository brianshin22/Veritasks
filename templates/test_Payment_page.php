<!-- (Testing version) Page where task creator pays for task-->
<h3>Click the button below to submit payment for your newly created task</h3>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

	<!-- Identify your business so that you can collect the payments. -->
	<input type="hidden" name="business" value="Dora_1354846300_biz@college.harvard.edu">

	<!-- Specify a Buy Now button. -->
	<input type="hidden" name="cmd" value="_xclick">

	<!-- Specify details about the item that buyers will purchase. -->
	<input type="hidden" name="item_name" value="Task">
	<input type="hidden" name="amount" value="<?= $price ?>">
	<input type="hidden" name="currency_code" value="USD">

    <!-- Paypal cannot return to the localhost version <input type="hidden" name="return" value="./payment_Confirmed.php"> -->
    <input type="hidden" name="return" value="http://hcs.harvard.edu/cs50-veritasks/payment_Confirmed.php">
    
    <!-- <input type="hidden" name="notify_url" value="./ipn.php"> -->
    <input type="hidden" name="notify_url" value="http://hcs.harvard.edu/cs50-veritasks/ipn.php">
    
	<!-- Display the payment button. -->
	<input type="image" name="submit" border="0"
	src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif"
	alt="PayPal - The safer, easier way to pay online">
	<img alt="" border="0" width="1" height="1"
	src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>

