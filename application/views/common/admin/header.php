<header class="headerMenu">
    <div class="topMenuContent">
        <h1><a href="#" id="topMenuLogo"><img src="<?php echo base_url()?>templates/images/mainLogo.png"></a></h1>
        <span id="date_time"></span>
        <div class="rightTopLink">
            <span>Hi, <a href="#" class="loginName">Admin!</a></span>
            <a href="#" class="menuRight"></a>
            <div class="optionButton">
                <div class="optionCon">
                    <a href="#" class="option"></a>
                    <div class="optionWrap">
                        <div class="optionBox">
                            <ul>
                                <!--li><a href="#">My Account</a></li>
                                <li><a href="#">Change Password</a></li>
                                <li><a href="#">Settings</a></li>
                                <li><a href="#">Customize Left Menu</a></li-->
                                <li><a href="<?php echo site_url('sjoraadmin/dashboard/logout'); ?>">Logout</a></li>
                            </ul>
                        </div>
                        <div class="pointerBox">
                            <div class="pointer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>