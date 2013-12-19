<?php $this->load->view("common/header"); ?>

<?php if(@$error_msg): ?>
U heeft onvoldoende energie om de kroeg binnen te treden.<br><br>

<a href="/index.php">Klik hier om terug te keren</a>
<?php else: ?>
Welkom bij de kroeg. U heeft minimaal 20% energie nodig om binnen te gaan.<br><br>

<a href="/index.php/location/enter/<?php echo $type; ?>">Ga de kroeg in</a>
<?php endif; ?>