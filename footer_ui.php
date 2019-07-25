		<script>
			$(function() {
				$('.aBtn').click(function() {
					$('.myform').attr('method', 'post');
					$('.myform').attr('action', '<?php echo($site_home); ?>');
					$('.myform').submit();
				});
			});
		</script>
	</div>
	<!-- 하단 내용 Start -->
	<div class="pre-footer">
		<div class="container">
			<div class="row">
				<!-- 소개 & 버튼 BLOCK Start -->
				<div class="col-md-4 col-sm-6 pre-footer-col">
					<!-- 소개 BLOCK Start -->
					<h2>About us</h2>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod tincidunt ut laoreet dolore magna aliquarm erat sit volutpat.</p>
					<!-- 소개 BLOCK End -->
					<!-- 버튼 x 15 BLOCK Start -->
					<div class="photo-stream">
						<h2>Photos Stream</h2>
						<ul class="list-unstyled">
							<li><a href="#"><img alt="" src="<?php echo($site_home); ?>/assets/frontend/pages/img/people/img5-small.jpg"></a></li>
							<li><a href="#"><img alt="" src="<?php echo($site_home); ?>/assets/frontend/pages/img/works/img1.jpg"></a></li>
							<li><a href="#"><img alt="" src="<?php echo($site_home); ?>/assets/frontend/pages/img/people/img4-large.jpg"></a></li>
							<li><a href="#"><img alt="" src="<?php echo($site_home); ?>/assets/frontend/pages/img/works/img6.jpg"></a></li>
							<li><a href="#"><img alt="" src="<?php echo($site_home); ?>/assets/frontend/pages/img/works/img3.jpg"></a></li>
							<li><a href="#"><img alt="" src="<?php echo($site_home); ?>/assets/frontend/pages/img/people/img2-large.jpg"></a></li>
							<li><a href="#"><img alt="" src="<?php echo($site_home); ?>/assets/frontend/pages/img/works/img2.jpg"></a></li>
							<li><a href="#"><img alt="" src="<?php echo($site_home); ?>/assets/frontend/pages/img/works/img5.jpg"></a></li>
							<li><a href="#"><img alt="" src="<?php echo($site_home); ?>/assets/frontend/pages/img/people/img5-small.jpg"></a></li>
							<li><a href="#"><img alt="" src="<?php echo($site_home); ?>/assets/frontend/pages/img/works/img1.jpg"></a></li>
							<li><a href="#"><img alt="" src="<?php echo($site_home); ?>/assets/frontend/pages/img/people/img4-large.jpg"></a></li>
							<li><a href="#"><img alt="" src="<?php echo($site_home); ?>/assets/frontend/pages/img/works/img6.jpg"></a></li>
							<li><a href="#"><img alt="" src="<?php echo($site_home); ?>/assets/frontend/pages/img/works/img3.jpg"></a></li>
							<li><a href="#"><img alt="" src="<?php echo($site_home); ?>/assets/frontend/pages/img/people/img2-large.jpg"></a></li>
							<li><a href="#"><img alt="" src="<?php echo($site_home); ?>/assets/frontend/pages/img/works/img2.jpg"></a></li>
						</ul>
					</div>
					<!-- 버튼 x 15 BLOCK End -->
				</div>
				<!-- 소개 & 버튼 BLOCK End -->
				<!-- 하단 중간 부분 Start -->
				<div class="col-md-4 col-sm-6 pre-footer-col">
					<h2>Our Contacts</h2>
					<address class="margin-bottom-40">
						35, Lorem Lis Street, Park Ave<br>
						California, US<br>
						Phone: 300 323 3456<br>
						Fax: 300 323 1456<br>
						Email: <a href="mailto:info@metronic.com">info@metronic.com</a><br>
						Skype: <a href="skype:metronic">metronic</a>
					</address>
					<div class="pre-footer-subscribe-box pre-footer-subscribe-box-vertical">
						<h2>Newsletter</h2>
						<p>Subscribe to our newsletter and stay up to date with the latest news and deals!</p>
						<form action="#">
							<div class="input-group">
								<input type="text" placeholder="youremail@mail.com" class="form-control">
								<span class="input-group-btn">
									<button class="btn btn-primary" type="submit">Subscribe</button>
								</span>
							</div>
						</form>
					</div>
				</div>
				<!-- 하단 중간 부분 End -->

				<!-- BEGIN TWITTER BLOCK --> 
				<div class="col-md-4 col-sm-6 pre-footer-col">
					<h2 class="margin-bottom-0">Latest Tweets</h2>
					<a class="twitter-timeline" href="https://twitter.com/twitterapi" data-tweet-limit="2" data-theme="dark" data-link-color="#57C8EB" data-widget-id="455411516829736961" data-chrome="noheader nofooter noscrollbar noborders transparent">Loading tweets by @keenthemes...</a>
				</div>
				<!-- END TWITTER BLOCK -->
			</div>
		</div>
	</div>
    <!-- 하단 내용 End -->

	<!-- 최 하단 Bar Start -->
	<div class="footer">
		<div class="container">
			<div class="row">
				<!-- BEGIN COPYRIGHT -->
				<div class="col-md-6 col-sm-6 padding-top-10">
					2016 © 3dwebart.com. ALL Rights Reserved. <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
				</div>
				<!-- END COPYRIGHT -->
				<!-- BEGIN PAYMENTS -->
				<div class="col-md-6 col-sm-6">
					<ul class="social-footer list-unstyled list-inline pull-right">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-skype"></i></a></li>
						<li><a href="#"><i class="fa fa-github"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
						<li><a href="#"><i class="fa fa-dropbox"></i></a></li>
					</ul>
				</div>
				<!-- END PAYMENTS -->
			</div>
		</div>
	</div>
	<!-- 최 하단 Bar End -->
	<?php include_once('footer.base-script.php'); ?>
</form>
</body>
<!-- END BODY -->
</html>