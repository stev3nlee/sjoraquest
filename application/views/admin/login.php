<section>
    <div class="loginCon">
        <h2>Login</h2>
        <div class="loginForm">
        <form class="loginForm" method="post" action="<?php echo site_url('sjoraadmin/login/do_login');?>">
            <span>Username</span>
            <div class="formInput"><input name="username" id="username" type="text" class="inputTxt"></div>
            <span>Password</span>
            <div class="formInput"><input name="password" id="password" type="password" class="inputTxt"></div>
            <label style="color:#F00"><?php if($this->session->flashdata('notif')){ echo $this->session->flashdata('notif');}?></label>
            <span><input name="" type="submit" value="Login" class="loginBtn"></span>
        </form>
        </div>
    </div>
</section>

