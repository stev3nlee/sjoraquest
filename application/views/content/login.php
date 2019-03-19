<section id="personalData">
        <div id="personalDataLogo" class="logo"><img src="<?php echo base_url() ?>templates/images/sjora-quest-logo.png"></div>
        <div id="personalDataForm" class="contentBox">
        	<h3>Isi Data Diri Kamu</h3>
            <form method="post" id="login" action="<?php echo site_url('login/do_login') ?>" onsubmit="return false;">
            <div class="defForm" >
            	<table border="0" width="100%">
                	<tr>
                    	<td width="40%">Nama</td>
                        <td><input type="text" class="defInput" id="nama" name="nama" value="<?php echo $this->session->userdata('name'); ?>" required></td>
                    </tr>
                    <tr>
                    	<td>Email</td>
                        <td><input type="text" class="defInput" id="email" name="email" required></td>
                    </tr>
                    <tr>
                    	<td>No. Telp.</td>
                        <td><input type="text" class="defInput" id="telp" name="telp" required></td>
                    </tr>
                </table>
            </div>
            <!-- <input type ="submit" value="submit" id="submitBtn" class="defBtn"> -->
            <a href="javascript:void(0)" id="submitBtn" class="defBtn">Submit</a>
            </form>
        </div>
    </section>
    
	<script>
    $(document).ready(function(){
        $("#submitBtn").click(function(){

            var name = $('#nama').val();
            var email = $('#email').val();
            var telp = $('#telp').val();
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 

            var n = telp.indexOf("08");

            if(n==0){

                if(email != ''){
                    if (mailformat.test(email)){  
                        $.ajax({
                                type:"POST",
                                url: "<?php echo site_url("login/check_data"); ?>",
                                data:$("#login").serialize(),
                                success: function(temp){

                                    if(temp == 1) {

                                        var formData = new FormData($('#login')[0]);
                                            $.ajax({
                                                type: "POST",
                                                url: "<?php echo site_url("login/do_login"); ?>",
                                                data: formData,
                                                contentType: false,
                                                processData: false,
                                                async: false,
                                                success: function(result){
                                                    //ga('send', 'pageview', '/theforceawakens/submitsucceeded');
                                                    alert("Submit Success");
                                                    window.location = '<?php echo site_url('game') ?>';
                                                }
                                            });
                                    }
                                    else{
                                        alert('Email Sudah Terdaftar');
                                    }
                                }
                        });
                    }
                    else{
                        alert("Format Email Salah");
                    }
                }
                else
                {
                    alert("Email harus di isi");
                }

            }
            else{
                    alert("Nomor telepon harus diawali dengan 08");
                }
        })

    });
    </script>