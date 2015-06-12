<?php
	require 'inc/config.inc.php';
	require 'inc/browser-body-class.php';
	require 'inc/functions.php';

	include 'inc/header.inc.php';

	$string = file_get_contents('js/data.json');
	$json = json_decode($string);
	$phone_link = str_replace('.', '', $json->phone);

	if($detect->isMobile() && !$detect->isTablet()) :
		$contact_class = 'text-left';
	else :
		$contact_class = 'text-right';
	endif;

?>
		<div class="row">
			<div class="small-12 medium-3 large-3 columns">
				<div id="contact" class="<?php echo $contact_class; ?>">
					<h3>contact</h3>
					<ul>
						<li><a href="tel:<?php echo $phone_link; ?>"><?php echo $json->phone; ?></a></li>
						<li><a href="mailto:<?php echo hide_email($json->email); ?>"><?php echo hide_email($json->email); ?></a></li>
						<li><a href="<?php echo $json->linkedin; ?>">LinkedIn</a></li>
						<li><a href="<?php echo $json->github; ?>">GitHub</a></li>
					</ul>
					<div class="sub">
						<a href="<?php echo MY_SITEURL; ?>/?p=about">About Me</a><br />
						<a href="<?php echo MY_SITEURL . $json->download; ?>">Download CV</a>
					</div><!--/.sub -->
					
				</div>
			</div><!--/.columns -->
			<?php if (isset($_GET['p']) && $_GET['p'] == 'about') : ?>
				<div class="small-12 medium-9 large-9 columns" id="about">
					<h3><span>abo</span>ut</h3>
					<?php
						foreach ($json->about as $line) :
							echo '<p>' . $line . '</p>';
						endforeach;
					?>
					<a href="<?php echo MY_SITEURL; ?>">Return to CV</a>
				</div><!--/.columns -->
			<?php else : ?>
				<div class="small-12 medium-9 large-9 columns" id="experience">
					<h3><span>exp</span>erience</h3>
					<?php
						foreach ($json->jobs as $job) :
							echo '<div class="row"><div class="small-12 medium-2 columns dates">';
								echo $job->dates;
							echo '</div><!--/.columns -->';
							echo '<div class="small-12 medium-10 columns company">';
								echo $job->company . '<br /><span class="title">' . $job->title . '</span><p>' . $job->description . '</p>';
								echo '<span class="heading">Responsibilities</span>';
								echo '<ul>';
									foreach ($job->points as $point) :
										echo '<li>' . $point . '</li>';
									endforeach;
								echo '</ul>';
								echo '<span class="heading">Skill Set</span>';
									echo '<p>';
										echo implode(', ', $job->skills);
									echo '</p>';
							echo '</div><!--/.columns --></div><!--/.row -->';
						endforeach;
					?>
				</div><!--/.columns -->
				<div class="small-12 medium-9 large-9 columns" id="portfolio">
					<h3><span>por</span>tfolio</h3>
					<?php
						foreach ($json->sites as $site) :
							echo '<div class="row"><div class="small-12 medium-2 columns">';
								
							echo '</div><!--/.columns -->';
							echo '<div class="small-12 medium-10 columns sites">';
								echo $site->company . '<br /><a class="url" href="' . $site->url . '">' . $site->url . '</a><p>' . $site->description . '</p>';
							echo '</div><!--/.columns --></div><!--/.row -->';
						endforeach;
					?>
				</div><!--/.columns -->
			<?php endif; ?>
		</div><!--/.row -->

<?php

	include 'inc/footer.inc.php';