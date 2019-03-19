<section id="howToPlay">
        <div id="howToLogo" class="logo"><img src="<?php echo base_url() ?>templates/images/sjora-quest-logo.png"></div>
        <div id="howTo" class="contentBox">
        	<h3>Cara Bermain</h3>
            <p>
            	<b>1.</b> Klik gambar gelas Sjora sebanyak-banyaknya. Pemain dinyatakan kalah jika memilih gambar yang salah.
                <br><br>
				<b>2.</b> Jika mendapat skor akhir di atas 100, kamu bisa memenangkan voucher Sjora yang akan dikirimkan via email.
                <br><br>
            </p>
            <div id="playBtn" class="defBtn">Play</div>
        </div>
    </section>
    
    <section id="gamePlay">
    	<div id="gamePlayLogo" class="logo"><img src="<?php echo base_url() ?>templates/images/sjora-quest-logo.png"></div>
        <div id="gamePlayContainer" class="gamePlayContainer">
        	<div class="gameMenu">
            	<ul>
                    <li><a id="btnHowToPlay" href="#">How To Play</a></li>
                    <li><a id="btnDisclaimer" href="#">Disclaimer</a></li>
                </ul>
            </div>
            <div class="gameArea">
            	<div class="gameTapArea">
                	<div class="tapContainer">
                    	<div class="tapMe"></div>
                        <div class="tapMe"></div>
                        <div class="tapMe"></div>
                        <div class="tapMe"></div>
                        <div class="tapMe"></div>
                        <div class="tapMe"></div>
                        <div class="tapMe"></div>
                        <div class="tapMe"></div>
                        <div class="tapMe"></div>
                    </div>
                </div>
                <div class="gameInfoArea">
                	<div class="gameTimer">
                    	<div class="timerContainer"><span id="timeLeft">5</div>
                    </div>
                    <div class="gameScore">
                    	<div class="scoreContainer">
                        	Score
                            <div id="theScore">0</div>
                        </div>
                    </div>
                    <div class="gameLevel">
                    	<div class="levelContainer">
                        	Level
                            <div id="theLevel">1</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="gameOverFail">
        <div id="gameOverLogo" class="logo"><img src="<?php echo base_url() ?>templates/images/sjora-quest-logo.png"></div>
        <div id="gameOverFailContent" class="contentBox">
            <p>
            	<br><br><br>
            	Kamu belum berhasil!
                <br><br><br>
            </p>
            <div id="tryAgainBtn" class="defBtn">Coba Lagi</div>
            <div class="sjoraFusionLogo"><img src="<?php echo base_url() ?>templates/images/sjora-fusion-logo.png"></div>
        </div>
    </section>
    
    <section id="gameOverSuccess">
        <div id="gameOverLogo" class="logo"><img src="<?php echo base_url() ?>templates/images/sjora-quest-logo.png"></div>
        <div id="gameOverSuccessContent" class="contentBox">
        	<h3>Score: <span id="gameOverScore">100</span></h3>
            <p>
            	<b>Selamat, kamu berhasil!</b><br>
                Share hasilnya di Facebook &amp; dapatkan voucher Sjora.
                <br><br><br>
            </p>
            <div id="shareBtn" data-id="<?php echo $this->session->userdata('user_id'); ?>" class="defBtn sharefb">Share</div>
            <div class="sjoraFusionLogo"><img src="<?php echo base_url() ?>templates/images/sjora-fusion-logo.png"></div>
        </div>
    </section>
    
    <div id="popupDisclaimer" class="popup">
    	<div id="howToLogo" class="logo"><img src="<?php echo base_url() ?>templates/images/sjora-quest-logo.png"></div>
        <div id="disclaimer" class="contentBox">
        	<h3>Disclaimer</h3>
            <p>
				<b>sjoratap.co.id adalah situs permainan milik Nestl&eacute; Indonesia. Setelah melakukan registrasi, peserta otomatis terdaftar dalam database Nestl&eacute; Indonesia.</b>
            </p>
            <a class="closeBtn" href="#">close</a>
        </div>
    </div>
    
    <div id="overlay" class="overlay"></div>

     <?php $fblink = "https://www.facebook.com/dialog/feed?app_id=".APP_ID."&display=popup&link=".urlencode('http://www.nestle.com/')."&redirect_uri=".urlencode(site_url('closefb')); ?>
    <input type="hidden" id="fb_fact" value="<?php echo $fblink;?>">

    <script>
    $(document).ready(function(e) {
    
    $(".sharefb").click(function(){        
        id=$(this).data('id');
        fblink=$("#fb_fact").val();
        var url_to_open=fblink;
        var width = 1000;   
        var height = 550;
        var left = parseInt((screen.availWidth/2) - (width/2));
        var top = parseInt((screen.availHeight/2) - (height/2));
        window.open(url_to_open, "Facebook", 'height=350,width=700,left=' + left + ',top=' + top + ',screenX=' + left + ',screenY=' + top);
        window.location='<?php echo site_url('home/share')?>';
        
        // $.ajax({        
        //     type: "POST",
        //     url: '<?php echo site_url('game/share_fb')?>',
        //     dataType:"JSON",
        //     data:{ fact_id:id },
        //     success:function(result){   
        //         console.log(result);  
        //     }
        // });
        // return false;
    });

    });
    </script>