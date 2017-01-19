<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php
  $ID=$_GET['ID'];
  ?>
</head>
<body>

<div class="container">
<br>
  <div class="panel panel-primary">
    <div class="panel-heading">Edit Form For Ticket ID: <?php Echo $ID;?></div>
    <div class="panel-body"><div class="margin-bottom-40"></div>

					<!-- Comments -->
					<form action="assets/php/demo-comment-process.php" method="post" id="sky-form5" class="sky-form">
						<header>Comment form</header>

						<fieldset>
							<div class="row">
								<section class="col col-4">
									<label class="label">Name</label>
									<label class="input">
										<i class="icon-append fa fa-user"></i>
										<input type="text" name="name">
									</label>
								</section>
								<section class="col col-4">
									<label class="label">E-mail</label>
									<label class="input">
										<i class="icon-append fa fa-envelope-o"></i>
										<input type="email" name="email">
									</label>
								</section>
								<section class="col col-4">
									<label class="label">Website</label>
									<label class="input">
										<i class="icon-append fa fa-globe"></i>
										<input type="url" name="url">
									</label>
								</section>
							</div>

							<section>
								<label class="label">Comment</label>
								<label class="textarea">
									<i class="icon-append fa fa-comment"></i>
									<textarea rows="4" name="comment"></textarea>
								</label>
								<div class="note">You may use these HTML tags and attributes: &lt;a href="" title=""&gt;, &lt;abbr title=""&gt;, &lt;acronym title=""&gt;, &lt;b&gt;, &lt;blockquote cite=""&gt;, &lt;cite&gt;, &lt;code&gt;, &lt;del datetime=""&gt;, &lt;em&gt;, &lt;i&gt;, &lt;q cite=""&gt;, &lt;strike&gt;, &lt;strong&gt;.</div>
							</section>

							<section>
								<label class="label">Enter characters below</label>
								<label class="input input-captcha">
									<img src="assets/plugins/sky-forms-pro/skyforms/captcha/image.php?<?php echo time(); ?>" width="100" height="32" alt="Captcha image" />
									<input type="text" maxlength="6" name="captcha" id="captcha2">
								</label>
							</section>
						</fieldset>

						<footer>
							<button type="submit" name="submit" class="button">Add comment</button>
						</footer>

						<div class="message">
							<i class="rounded-x fa fa-check"></i>
							<p>Your comment was successfully added!</p>
						</div>
					</form>
					<!-- End Comments-->
				</div>Form</div>
  </div>
</div>

</body>
</html>
