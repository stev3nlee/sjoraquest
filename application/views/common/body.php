<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Sjora Quest</title>
<meta name="viewport" content="target-densitydpi=device-dpi; width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
<meta name="HandheldFriendly" content="true" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>templates/css/sjoraquest.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>templates/css/fontAttach/stylesheet.css">
<script>var baseUrl='<?php echo base_url() ?>/templates/';</script>
<script src="<?php echo base_url() ?>templates/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url() ?>templates/js/jquery.countdown.min.js"></script>
<script src="<?php echo base_url() ?>templates/js/tapMe.js"></script>
<script src="<?php echo base_url() ?>templates/js/main.js"></script>
<script src="<?php echo base_url() ?>templates/js/velocity.min.js"></script>
</head>

<body>

<?php $this->load->view($content)?>

</body>
</html>

<script>

var link_back="<?php echo site_url()?>";
window.fbAsyncInit = function() {
    FB.init({
      appId      : <?php echo APP_ID?>,
      xfbml      : true,
      version    : 'v2.5'
    });
    // FB.Event.subscribe('auth.login', function () {
    //     window.location = 'berikan-aksi-pledge';
    // });
};

(function(d, s, id){
 var js, fjs = d.getElementsByTagName(s)[0];
 if (d.getElementById(id)) {return;}
 js = d.createElement(s); js.id = id;
 js.src = "//connect.facebook.net/en_US/sdk.js";
 fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


$(document).ready(function() {
	    $(".facebook_login").click(function(e){
		//pledge=1;
        e.preventDefault();
        checkLoginState();
    });
});

  function checkLoginState() {
<?php 

$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
$chrome   = stripos($_SERVER['HTTP_USER_AGENT'],"Chrome");
$crios   = stripos($_SERVER['HTTP_USER_AGENT'],"crios");

if( ($iPod || $iPhone ) && ($crios || $chrome)){?>
	alert("Facebook login is disabled for Chrome IOS. Please use safari to continue");
<?php }else{?>
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
<?php }?>
  }


    // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
	  console.log('www');
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
	  testAPI();
      console.log( 'Please log ' +
        'into this appx.');
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
	  //FB.login();
      console.log( 'Please log ' +
        'into Facebook1.');
		testAPI();
		
		
    }
  }


  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    
    
    FB.login(function(response) {
        if (response.authResponse) {
            var token=response.authResponse.accessToken;
            FB.api('/me?field=email,name', function(response) {
       			console.log(response);
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url().'login/fb/';?>',
                    data: {
                        name : response.name,
                        facebook_id:response.id,
                        token:token
                    },
                    dataType:"JSON",
                    success: function(data){
						
							window.location='<?php echo site_url('login')?>';			
						
					}
                });//ajax
            
            });//fb.api
             
        }
		else{
			console.log('111');
		}
        //if
    },{scope: 'public_profile,email'});
}
</script>