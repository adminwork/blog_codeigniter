<div>
    <form action="action_login.php" method="post" id="form" style="padding-left: 200px">
        <div>
            <ul>
                <li><font>Log in</font></li>
                <li>
                    <label for="user_login">Username:</label>
                    <input type="text" name="username" id="username" required>
                    <span></span>
                </li>
                <li>
                    <label for="pass">Password:</label>
                    <input type="password" name="pass" id="pass" required>
                    <span></span>
                </li>
                <li><input type="submit" name="login" class="button" value="Log In" /></li>
            </ul>
            <p class="regtext">No account yet? <a href="registration.php" >Register Here</a>!</p>
            <p class="regtext">Forgot your password? <a href="lostpass.php" >Restore password here</a>!</p>
    </form>
</div>


