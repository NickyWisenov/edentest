<!doctype html>
<?php
$session = Yii::$app->session;
 use yii\helpers\Html;
 use yii\helpers\Url;
use app\assets\frontend\ChatAsset;
$this->title = 'chat';
$this->params['breadcrumbs'][] = $this->title;
?>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <link rel="shortcut icon" href="https://s3.amazonaws.com/sendbird-static/favicon/favicon.ico" type="image/x-icon">

  <link href='https://fonts.googleapis.com/css?family=Exo+2:400,900italic,900,800italic,800,700italic,700,600italic,600,500italic,500,400italic,300italic,200italic,200,100italic,100,300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,900italic,900,800italic,800,700italic,700,600italic,600,500italic,500,400italic,300italic,200italic,200,100italic,100,300' rel='stylesheet' type='text/css'>

  <!--<link rel="stylesheet" href="/static/bootstrap/bootstrap.min.css">-->
  <!--<link rel="stylesheet" href="/static/css/sample-index.css">-->
  <link rel="stylesheet" href="/web/frontend/static/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="/web/frontend/static/css/sample-index.css">

  <!-- <title>Web SDK Sample</title> -->
</head>
<body class="sample-background">
  <div class="container">
    <div class="row">

      <!-- top -->
      <div class="index-section index-top">
        <div class="text-sort text-sort--right">
          <!--<img src="/static/img/logo_landing.svg">-->
          <img src="/web/frontend/static/img/logo_landing.svg">
        </div>
        <div class="text-sort text-sort--left">
          <label class="index-title">Sample Chat</label>
        </div>
      </div>
      <?php
       $id =  $session['user_id'].PHP_EOL;
       $name =  $session['user_name'].PHP_EOL; 
      ?>

      <!-- user info -->
      <div class="index-section index-input">
        <input type="text" class="index-userid" placeholder="Enter User ID" id="user_id"> <br /> <br />
       <input type="text" class="index-nickname" maxlength="12" placeholder="Enter User nickname" id="user_nickname">
        <button type="button" onclick="" class="index-button" id="btn_start">DONE</button>
      </div>

      <!-- description -->
      <div class="index-section index-text">
        Start chatting on SendBird by choosing your display name.<br>
        This can be changed anytime and will be shown on 1-on-1 and group messaging.
        <br />
        <br />
        <a href="https://github.com/smilefam/SendBird-JavaScript/" class="download-sample">Download Sample</a>
      </div>
<!-- 
      <div class="index-section index-bottom">
        <img src="/static/img/image-landing-01.png" width="624">
        <img src="static/img/image-landing-01.png" width="624">
      </div> -->

    </div>
  </div>
  <!-- <div style="text-align: center;">
    <img src="/static/img/image-landing-02.png" width="960">
    <img src="/web/frontend/static/img/image-landing-02.png" width="960">
  </div> -->

  <!--<script src="/static/js/jquery-1.11.3.min.js"></script>-->
  <!--<script src="/static/js/util.js"></script>-->
  <!--<script src="/static/js/index.js"></script>-->
  <script src="/web/frontend/static/js/jquery-1.11.3.min.js"></script>
  <script src="/web/frontend/static/js/util.js"></script>
  <!-- <script src="/web/frontend/static/js/index.js"></script> -->
<script type="text/javascript">
 var userId = '';
var nickname = '';

function login(){
  if (nickname.isEmpty()) {
    alert('Please enter user nickname');
    return;
  }

  window.location.href= 'joblog/chatview?userid=' + encodeURIComponent(userId) + '&nickname=' + encodeURIComponent(nickname);
}

$('#user_nickname').change(function() {
  userId = $('#user_id').val().trim();
  nickname = $('#user_nickname').val().trim();
});

$('#user_nickname').keydown(function(e){
  if (e.which == 13) {
    nickname = $('#user_nickname').val().trim();
    login();
  }
});

$('#btn_start').click(function() {
  login();
});

$(document).ready(function() {
  $('#user_nickname').val('');
  $('#user_nickname').focus();

  $('#user_id').val(getUserId());
});
</script>


</body>
</html>