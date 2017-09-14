<?php 
header("content-type:text/html;charset=utf-8");
$alerts = yii::$app->session->getFlash("alerts");
$alerts_url = is_array($alerts['url']) ? $alerts['url'] :array();
foreach ($alerts_url as $key => $value) {
	    $url = $value;
}
 ?>
 <?php if($alerts['stae'] == 0 && isset($alerts) ): ?>
<div class="alert alert-block">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>Error!<?= $alerts['msg']."<span id='time'>".$alerts['time']."</span>"."秒后跳转" ?></h4>
</div>
<?php elseif( $alerts['stae'] == 1 && isset($alerts) ): ?>
<div class="alert alert-block">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>Success!<?= $alerts['msg']."<span id='time'>".$alerts['time']."</span>"."秒后跳转" ?></h4>
</div>

<?php endif ?>
<?php if(isset($alerts['url'])) { ?>
<script>
	
		  setInterval(function(){
		  var time = document.getElementById('time').innerHTML;
		  time -= 1;
		  document.getElementById('time').innerHTML = time;
			if(time == 1)
				<?php if($alerts['stae'] == 0) { ?>
					  window.history.go(-1);
				<?php } else{ if($alerts['acc']){ ?>
					  window.location.href =  "<?= $url ?>";
				<?php }else {?>
				 window.history.go(-1);  
				 <?php  }} ?>
			 },1000)
			
</script>
<?php } ?>
