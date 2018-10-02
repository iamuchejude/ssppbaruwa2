
<section class="modalArea" id="about">
	<a class="modalTrigger close" href="#about">X</a>
	<div class="content" style="width: 100vw">
		About Content
	</div>
</section>

<section class="modalArea" id="programmes">
	<a class="modalTrigger close" href="#programmes">X</a>
	<div class="content" style="width: 100vw">
		Programmes Content
	</div>
</section>

<section class="modalArea" id="gallery">
	<a class="modalTrigger close" href="#gallery">X</a>
	<div class="content" style="width: 100vw">
		<div class="contentHeader">
			<h1>Gallery Page</h1>
		</div>
		<div class="contentContent">
			<div class="galleries clear">
				<?php
					for($i=1; $i<25; $i++) {
				?>
				<div class="gallery" id="relative-caption">
					<a href="https://goo.gl/cbkjxu" data-sub-html=".caption">
						<img src="https://goo.gl/cbkjxu"/>
						<div class="caption">
							<h4>Image caption for this one</h4>
							<p>Description for this image caption with small sense and use of brain</p>
						</div>
					</a>
				</div>
				<div class="gallery" id="relative-caption">
					<a href="https://goo.gl/x7Hixz" data-sub-html=".caption">
						<img src="https://goo.gl/x7Hixz"/>
						<div class="caption">
							<h4>Image caption for this two</h4>
							<p>Description for this image caption with small sense and use of brain</p>
						</div>
					</a>
				</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>
</section>

<section class="modalArea active" id="contact">
	<a class="modalTrigger close" href="#contact">X</a>
	<div class="content" style="width: 100vw">
		<div class="contentHeader">
			<h1>Gallery Page</h1>
		</div>
		<div class="clear contactSection">
			<div class="contacts clear">
				<div class="other">
					<p>
					Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus suscipit tortor eget felis porttitor volutpat.
					</p>
				</div>
				<div class="form">
					<form action="" method="POST">
						Formm
					</form>
				</div>
			</div>
			<div class="contactMap">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.475348341214!2d3.2600114174438475!3d6.587683100000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b900caa777d23%3A0x945346388a93ad85!2sSs+Peter+and+Paul+Catholic+Church!5e0!3m2!1sen!2sng!4v1526431855858" frameborder="0" style="border:0; width: 100% !important; min-height: 400px !important;" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</section>
