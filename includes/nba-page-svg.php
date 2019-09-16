<?php require_once "nba-vars.php"; ?>

<?php /*
	echo "<pre>";
	print_r($nba);
	echo "</pre>";
*/ ?>

<form class="wrapper cf">
	<label class="form-label" for="nhl-nav"><?= $content['copy']['chooseTeam'] ?></label>
	<div class="fancy-select fancy-select-lg">
		<select onChange="if(this.selectedIndex!=0) self.location=this.options[this.selectedIndex].value" id="nba-nav">
			<option value="" selected>Teams:</option>
		<?php foreach ($nba as $teams => $values) { ?>
			<option value="#<?=$values['LongName']?>"><?=$values['FullName']?></option>
		<?php } ?>
		</select>
	</div>
	<p class="sg-toggler"><a href="#nba-raw" onclick="toggled('nba-raw'); return false;"><?= $content['copy']['viewData'] ?></a></p>
</form>

<div class="wrapper" id="nba-raw" style="display: none;">
	<table class="data-table">
		<caption>NBA Raw Data</caption>
		<thead class="data-table-head">
			<tr>
				<th scope="col" class="table-fullname">Full Names</th>
				<th scope="col" class="table-longname">Long Names</th>
				<th scope="col" class="table-shortname">Short Names</th>
				<th scope="col" class="hex-values">Hex Values</th>
			</tr>
		</thead>

		<tbody class="data-table-body">
			<?php foreach ($nba as $teams => $values) { ?>
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

<?php foreach ($nba as $teams => $values) { ?>
<article class="wrapper" id="<?=$values['LongName']?>">
	<h3 class="sg-subheading" style="color: <?=$values['HeadingColour']?>">
		<span class="ico-inline ico-25-inline i-<?=$values['ShortName']?>"><?=$values['FullName']?></span>
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
			<?php foreach ($values['TeamColours'] as $colors => $color_value) {	?>
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
				<img class="i-sm" src="img/team_logos/svg/basketball/nba/<?=$values['LongName']?>.svg" onerror="this.src='img/team_logos/59x59/basketball/nba/<?=$values['LongName']?>.png';this.onerror=null;" alt="" height="59" width="59">
				<p class="sg-label">59x59</p>
			</li>
			<li>
				<img class="i-m" src="img/team_logos/svg/basketball/nba/<?=$values['LongName']?>.svg" onerror="this.src='img/team_logos/90x90/basketball/nba/<?=$values['LongName']?>.png';this.onerror=null;" alt="" height="90" width="90">
				<p class="sg-label">90x90</p>
			</li>
			<li>
				<a href="#"><img class="i-lg bgcolor" src="img/team_logos/svg/basketball/nba/<?=$values['LongName']?>.svg" onerror="this.src='img/team_logos/170x170/basketball/nba/<?=$values['LongName']?>.png';this.onerror=null;" alt="" height="170" width="170"></a>
				<p class="sg-label">170x170 - w/link</p>
			</li>
			<li>
				<img class="i-xlg" src="img/team_logos/svg/basketball/nba/<?=$values['LongName']?>.svg" onerror="this.src='img/team_logos/200x200/basketball/nba/<?=$values['LongName']?>.png';this.onerror=null;" alt="" height="200" width="200">
				<p class="sg-label">200x200</p>
			</li>
		</ul>
	</div>

	<div class="span-of-2">
		<h4 class="sg-tileheading">Logos - As Backgrounds <small>(With a bg colour)</small></h4>
		<ul class="sg-logos <?=$values['ShortName']?>">
			<li>
				<span class="i-tl i-sm i-<?=$values['ShortName']?>"></span>
				<p class="sg-label">59x59</p>
			</li>
			<li>
				<span class="i-tl i-m i-<?=$values['ShortName']?>"></span>
				<p class="sg-label">90x90</p>
			</li>
			<li>
				<a href="#"><span class="i-tl i-lg i-<?=$values['ShortName']?>"></span></a>
				<p class="sg-label">170x170 - w/link</p>
			</li>
			<li>
				<span class="bgcolor i-tl i-xlg i-<?=$values['ShortName']?>"></span>
				<p class="sg-label">200x200</p>
			</li>
		</ul>
	</div>
	
	<div class="content-wrapper">
		<?php /* start text icons */ ?>
		<?php include "includes/aside-texticons-svg.php"; ?>
	</div>
</article>
<?php } ?>





