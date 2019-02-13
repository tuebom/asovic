		<!--content-->
		<div class="content">
			<!--login-->
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12">
								<a href="#" class="active" id="reset-form-link">Reset Password</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div id="infoMessage"><?php echo $message;?></div>
								<form id="reset-form" action="<?= site_url('auth/forgot_password') ?>" method="post" role="form" style="display: block;">
									<?php if (isset($this->data['message'])) echo $this->data['message'];?>
									<div class="form-group has-feedback">
										<input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="<?php echo lang('auth_your_email') ?>">
										<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
									</div>
									<div class="row">
										<div class="col-md-6 col-md-offset-3">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--login-->
		</div>
		<!--content-->
