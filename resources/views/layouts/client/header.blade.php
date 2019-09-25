<header>
	<?php 
	$agent = new \Jenssegers\Agent\Agent();
	if($agent->isDesktop()):
	?>
	
	@include('layouts.client.menudesktop')

	<?php else: ?>

	@include('layouts.client.menumobile')

	<?php endif; ?>
</header>