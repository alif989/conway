<?php Flight::set('innerPageBannerTitle', 'Contact Us')?>
<div class="row mb-5">
	<div class="col-lg-6">
		<div class="col-lg-12 ml-lg-auto mr-lg-auto">
			<h3 class="mb-3">
				Myrtle Beach Locksmith is based on Myrtle Beach, SC with main offices located at:
			</h3>

			<img src="<?php echo assets('img/myrtle-beach-locksmith-contact.jpg');?>"
				alt="Myrtle Beach Locksmith in Myrtle Beach, SC" class="img-fluid" width="650">

			<h3 class="text-uppercase size-3 light-font lead mb-2 pb-0 mt-3">Address:</h3>

			<p>
				<a href="#" target="_blank">
					<img src="<?php echo assets('img/google_map_icon.png');?>" width="25" Myrtle Beach
						alt="Myrtle Beach Locksmith Map Location">
				</a>
				&nbsp;
				Address: 
				 Myrtle Beach, SC  ,
				United States

			</p>

			<div class="row">

				<div class="col-12 col-sm-6">
					<h3 class="text-uppercase size-3 light-font lead mb-2 pb-0 mt-3">Phone: </h3>
					<p>
						<a title="Call Now"
							onclick="return gtag_report_conversion('tel:<?php echo phone(true, false)?>');"
							class="size-3 light-font"
							href="tel:<?php echo phone(true, false)?>"><?php echo phone(true, false) ?></a>
					</p>
				</div>
				<div class="col-12 col-sm-6">
					<h3 class="text-uppercase size-3 light-font lead mb-2 pb-0 mt-3">E-mail: </h3>
					<p><a class="text-lowercase text-dark" href="mailto:<?php echo Flight::get('fromMail'); ?>"
							title="E-mail"><i class="fal fa-envelope text-dark d-inline-block"></i>
							<?php echo Flight::get('fromMail'); ?></a></p>
				</div>


			</div>


			<div class="row">

				<div class="col-12 col-sm-6">
					<h3 class="text-uppercase size-3 light-font lead mb-2 pb-0 mt-3">Business Hours: </h3>
					Mon : Open 24 hours <br>
					Tue : Open 24 hours <br>
					Wed : Open 24 hours <br>
					Thu : Open 24 hours <br>
					Fri : Open 24 hours <br>
					Sat : Closed <br>
					Sun : Open 24 hours
				</div>
				<div class="col-12 col-sm-6">
					<h3 class="text-uppercase size-3 light-font lead mb-2 pb-0 mt-3">Connect with us:</h3>
					<?php echo partial ('social-link-icons');   ?>
				</div>


			</div>

		</div>
	</div>
	<div class="col-lg-5  contact-form ">
		<!-- <img src="<?php echo assets('img/contact.jpg')?>" class="img-fluid" alt=""> -->
		<h2 class="text-uppercase mb-4 mt-5"><i class="fal fa-envelope-open mr-3 highlight"></i>Write To Us</h2>
		<p>For locksmith consulation, suggestions, comments, complaints or estimates you may call us directly or contact
			us via the form below.</p>
		<form action="<?php echo url('sendmail') ?>" class="theForm">
			<input type="hidden" name="subject" value="Contact Page Form">
			<div class="form-group mb-3">
				<input type="text" name="name" placeholder="Name" class="form-control">
			</div>
			<div class="form-group mb-3">
				<input type="email" name="email" placeholder="Email" class="form-control">
			</div>
			<div class="form-group mb-4">
				<input type="text" name="phone" placeholder="Phone" class="form-control">
			</div>
			<div class="form-group mb-4">
				<textarea name="message" rows="6" placeholder="Message" class="form-control"></textarea>
			</div>
			<button type="submit" class="submitBtn button button_transparent base w-25 ">SUBMIT</button>
		</form>
	</div>
</div>