	<ul class="nav nav-tabs">
		<li><a href="#Description" data-toggle="tab" aria-expanded="true">Description</a></li>
		<li><a href="#Activités" data-toggle="tab" aria-expanded="false">Activites</a></li>
		<li><a href="#Reformuler" data-toggle="tab" aria-expanded="false">Reformuler</a></li>
		<li><a href="#Liens" data-toggle="tab" aria-expanded="false">Liens</a></li>
		<li><a href="#Commentaires" data-toggle="tab" aria-expanded="false">Commentaires</a></li>
	</ul>
	<div id="myTabContent" class="tab-content">
		<div class="tab-pane fade active in" id="Description">
			<?php
				require('situation/description.php');
			?>
		</div>
		<div class="tab-pane fade" id="Activités">
			<?php
				require('situation/activites.php');
			?>
		</div>
		<div class="tab-pane fade" id="Reformuler">
			<?php
				require('situation/reformuler.php');
			?>
		</div>
		<div class="tab-pane fade" id="Liens">
			<?php
				require('situation/liens.php');
			?>
		</div>
		<div class="tab-pane fade" id="Commentaires">
			<?php
				require('situation/commentaires.php');
			?>
		</div>
	</div>