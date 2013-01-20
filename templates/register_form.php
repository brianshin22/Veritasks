<!-- Form for registering an account -->

<script src="js/confirmRegistration.js"></script>

<h3> Register </h3>
<form id="register" action="register.php" method="post">
    <fieldset>
        <div class="control-group">
            <input autofocus name="email" placeholder="Email/User ID" id="email" 
                   type="text" title="Must be a valid Harvard email address." />
        </div>
        
        <div class="control-group">
            <input autofocus name="username" placeholder="Full Name" id="username" 
                   type="text" title="Enter your full name." />
        </div>
        
        <div class="control-group">
            <input name="password" placeholder="Password" id = "password" type="password"
                   title="Password must contain at least 6 alphanumeric characters"/>
        </div>
        
        <div class="control-group">
            <input name="confirmation" placeholder="Re-enter Password" id="confirmation" type="password"
                   title="Passwords must match"/>
        </div>
        
        <div class="control-group">
            <input name="paypalemail" placeholder="Paypal Email" id = "paypalemail" type="text"
                   title="Please enter your Paypal email to receive payments"/>
        </div>
        
        <div class="control-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </fieldset>
</form>

<div>
    <a class = "btn btn-primary" href="login.php">Log In</a> 
</div>
