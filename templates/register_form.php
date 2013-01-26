<!-- Form for registering an account -->

<div class="row">
    <div class="span4 offset5">
        <div class="well">
            <h3> Register </h3>
            <form id="register" action="register.php" method="post">
                <fieldset>
                    <div class="control-group">
                        
                        <input autofocus name="email" placeholder="Email/User ID" id="email" 
                               type="text" title="Must be a valid Harvard email address." required/>
                    </div>
                    
                    <div class="control-group">
                        
                        <input autofocus name="username" placeholder="Full Name" id="username" 
                               type="text" title="Enter your full name." required/>
                    </div>
                    
                    <div class="control-group">
                        
                        <input name="password" placeholder="Password" id = "password" type="password"
                               title="Please enter a password" required/>
                    </div>
                    
                    <div class="control-group">
                        
                        <input name="confirmation" placeholder="Re-enter Password" id="confirmation" type="password"
                               title="Passwords must match" required/>
                    </div>
                    
                    <div class="control-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

