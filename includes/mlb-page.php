<?php require_once "mlb-vars.php"; ?>

<?php /*
	echo "<pre>";
	print_r($mlb);
	echo "</pre>";
*/ ?>

<form class="wrapper cf">
	<label class="form-label" for="mlb-nav"><?= $content['copy']['chooseTeam'] ?></label>
	<div class="fancy-select fancy-select-lg">
		<select onChange="if(this.selectedIndex!=0) self.location=this.options[this.selectedIndex].value" id="mlb-nav">
			<option value="" selected>Select a Team</option>
		<?php foreach ($nhl as $teams => $values) { ?>
			<option value="#<?=$values['LongName']?>"><?=$values['FullName']?></option>
		<?php } ?>
		</select>
	</div>
	<p class="sg-toggler"><a href="#mlb-raw" onclick="toggled('mlb-raw'); return false;"><?= $content['copy']['viewData'] ?></a></p>
</form>

<div class="wrapper" id="mlb-raw" style="display: none;">
	<table class="data-table">
		<caption>MLB Raw Data</caption>
		<thead class="data-table-head">
			<tr>
				<th scope="col" class="table-fullname">Full Names</th>
				<th scope="col" class="table-longname">Long Names</th>
				<th scope="col" class="table-shortname">Short Names</th>
				<th scope="col" class="hex-values">Hex Values</th>
			</tr>
		</thead>

		<tbody class="data-table-body">
			<?php foreach ($mlb as $teams => $values) { ?>
			<tr>
				<td><?=$values['FullName']?></td>
				<td><?=$values['LongName']?></td>
				<td><?=$values['ShortName']?></td>
				<td>
				<?php if (isset($values['TeamColours'])) foreach ($values['TeamColours'] as $colors => $color_value): ?>
					<span class="hex-value"><?=$color_value?></span>
				<?php endforeach ?>
				</td>
			</tr>
			<?php }	?>

		</tbody>

	</table>
</div>


<?php /** START TEAM */ ?>

<?php foreach ($mlb as $teams => $values) { ?>
<article class="wrapper">
	<h3 class="sg-subheading" style="color: <?=$values['HeadingColour']?>" id="<?=$values['LongName']?>">
		<span class="ico-inline ico-25-inline <?=$values['ShortName']?>--25x25"><?=$values['FullName']?></span>
	</h3>

	<?php if (isset($values['TeamColours'])) { ?>
	<div class="span-of-2">
		<h3 class="sg-tileheading"><?= $content['titles']['Primary'] ?></h3>

		<ul class="sg-colors">
			<?php foreach ($values['TeamColours'] as $colors => $color_value) {	?>
			<li>
				<span style="background: <?=$color_value?>" class="sg-swatch">&nbsp;</span>
				<p class="sg-label"><?=$color_value?></p>
			</li>
			<?php }	?>
		</ul>
	</div>
	<?php } ?>

	<?php if (isset($values['SecondaryColours'])) { ?>
	<div class="span-of-2 cf">
		<h3 class="sg-tileheading"><?=$values['SecondaryLabel']?></h3>

		<ul class="sg-colors border-left">
			<?php foreach ($values['SecondaryColours'] as $colors => $color_value) { ?>
			<li>
				<span style="background: <?=$color_value?>" class="sg-swatch">&nbsp;</span>
				<p class="sg-label"><?=$color_value?></p>
			</li>
			<?php }	?>
		</ul>
	</div>
	<?php } ?>

	<div class="span-of-2 clear">
		<h4 class="sg-tileheading">Logos - Inline with img tag <small>(With a bg colour)</small></h4>
		<ul class="sg-logos <?=$values['ShortName']?>">
			<li>
				<img src="img/team_logos/59x59/baseball/mlb/<?=$values['LongName']?>.png" alt="">
				<p class="sg-label">59x59</p>
			</li>
			<li>
				<img src="img/team_logos/90x90/baseball/mlb/<?=$values['LongName']?>.png" alt="">
				<p class="sg-label">90x90</p>
			</li>
			<li>
				<img class="bgcolor" src="img/team_logos/170x170/baseball/mlb/<?=$values['LongName']?>.png" alt="">
				<p class="sg-label">170x170</p>
			</li>
			<li>
				<img src="img/team_logos/200x200/baseball/mlb/<?=$values['LongName']?>.png" alt="">
				<p class="sg-label">200x200</p>
			</li>
		</ul>
	</div>

	<div class="span-of-2">
		<h4 class="sg-tileheading">Logos - As Backgrounds <small>(With a bg colour)</small></h4>
		<ul class="sg-logos <?=$values['ShortName']?>">
			<li>
				<span class="ico-59 ico <?=$values['ShortName']?>--59x59"></span>
				<p class="sg-label">59x59</p>
			</li>
			<li>
				<span class="ico-90 ico <?=$values['ShortName']?>--90x90"></span>
				<p class="sg-label">90x90</p>
			</li>
			<li>
				<span class="ico-170 ico <?=$values['ShortName']?>--170x170"></span>
				<p class="sg-label">170x170</p>
			</li>
			<li>
				<span class="bgcolor ico-200 ico <?=$values['ShortName']?>--200x200"></span>
				<p class="sg-label">200x200</p>
			</li>
		</ul>
	</div>
	
	<div class="content-wrapper">
		<?php /* start text icons */ ?>
		<?php include "includes/aside-texticons.php"; ?>
	</div>
</article>
<?php } ?>