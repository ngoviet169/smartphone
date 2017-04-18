<script type="text/javascript">
    function checkForm(){
        var fullname = document.getElementById('fullname').value;
        var user_name = document.getElementById('user_name').value;
        var email = document.getElementById('email').value;
        //var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9])/;
        var password = document.getElementById('password').value;
        var repassword = document.getElementById('repassword').value;

        if(fullname == ''){
            alert('Full name can not required !');
            return false;
        }

        if(fullname.length < 3){
            alert('Full name must be 3 character at least !');
            return false;
        }

        if(user_name == ''){
            alert('User name can not required !');
            return false;
        }

        if(user_name.length < 3){
            alert('User name must be 3 character at least !');
            return false;
        }

        if(password == ''){
            alert('Password can not required !');
            return false;

        }

        if(password.length < 8){
            alert('Password must be 8 character at least');
            return false;
        }

        if(repassword == ''){
            alert('Please retype password !');
            return false;
        }

        if(repassword != password){
            alert('Password and repassword are not match !');
            return false;
        }

        return true;
        

    }
</script>

<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Registration</div>
                    <div class="panel-body">
                        <form action="signup-auth.php" method="post">
                            <div>
                                <label>Full Name</label>
                                <input type="text" class="form-control" placeholder="Full Name" id="fullname" name="fullname" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <div>
                                <label>User name</label>
                                <input type="text" class="form-control" placeholder="User name" id="user_name" name="user_name" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <div>
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" id="email" name="email" aria-describedby="basic-addon1"
                                >
                            </div>
                            <br>    
                            <div>
                                <label>Pasword</label>
                                <input type="password" class="form-control" name="password" id="password" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <div>
                                <label>Retype Password</label>
                                <input type="password" class="form-control" id="repassword" name="repassword" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-default" name="signup" onClick="checkForm()">Sign Up
                            </button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>