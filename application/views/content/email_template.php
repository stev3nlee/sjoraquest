<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Sjora Quest | Email Template</title>

	<style>
		body{
			font-family:Arial, Helvetica, sans-serif;
			font-size:14px;
			color:#666;
		}
		a{
			width:50%;
			display:block;
			background: #f7bc14 none repeat scroll 0 0 padding-box;
			height:30px;
			line-height:30px;
			border-radius: 5px;
			border-top: 3px solid #ce9902;
			color: #fff;
			overflow: hidden;
			text-align:center;
			text-decoration:none;
			text-transform: uppercase;
			margin:20px auto 0;
		}
		h4{
			font-size:20px;
			margin:0 0 10px;
		}
		p{
			margin:0 0 20px;
		}
		section{
			width:100%;
			max-width:960px;
			margin:0 auto;
		}
		section img{
			width:100%;
		}
	</style>
</head>

<body>

    <section>
    	<img style="max-width:40%;display:block;margin:0 auto 20px;" src="<?php echo base_url() ?>templates/images/sjora-quest-logo.png">
        <h4>Selamat!</h4>
        <p>Kamu berhasil mendapatkan voucher dari Sjora!<br>mainkan terus Sjora Quest dan kumpulkan vouchernya</p>
        <img src="<?php echo base_url() ?>templates/images/e-voucher.png">
        <a href="<?php echo site_url('voucher/index/'.$voucher_id) ?>">Gunakan Voucher</a>
    </section>
</body>
</html>
