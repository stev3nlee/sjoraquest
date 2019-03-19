
    <section id="shareSuccess">
        <div id="shareSuccessLogo" class="logo"><img src="<?php echo base_url() ?>templates/images/sjora-quest-logo.png"></div>
        <div id="shareSuccess" class="contentBox">
            <h3>kamu sudah bermain hari ini</h3>
            <p>
                Kamu bisa kembali bermain dalam
                <br><br>
                <div id="countDown"></div>
                <br><br>
            </p>
            <a href="<?php echo base_url() ?>" id="backToHomeBtn" class="defBtn">Close</a>
            <div class="sjoraFusionLogo"><img src="<?php echo base_url() ?>templates/images/sjora-fusion-logo.png"></div>
        </div>
    </section>

    <input type="hidden" class="defInput" id="next_play" name="next_play" value="<?php echo $next_play; ?>">

    <script>
    var backUrl = '<?php echo base_url() ?>';
    var next_play = $('#next_play').val();
    </script>
    
    <script>
        $(document).ready(function(){
            $("#countDown").countdown(next_play, function(event){
                $(this).text(event.strftime('%H:%M:%S'));
            }).on('finish.countdown', function(event){
                changeCloseBtn(backUrl);
            });
        });

        // function formatDate(date) {
        //     var hours = date.getHours();
        //     var minutes = date.getMinutes();
        //     var second = date.getSeconds();

        //     var ampm = hours >= 12 ? 'pm' : 'am';
        //     hours = hours % 12;
        //     hours = hours ? hours : 12; // the hour '0' should be '12'
        //     minutes = minutes < 10 ? '0'+minutes : minutes;
        //     var strTime = hours + ':' + minutes + ' ' + ampm;
        //     return date.getMonth()+1 + "/" + date.getDate() + "/" + date.getFullYear() + "  " + strTime;
        // }

        // var d = new Date();
        // var e = formatDate(d);

        // alert(e);
    </script>