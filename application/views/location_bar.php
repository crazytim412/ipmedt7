<?php $this->load->view("common/header"); ?>

Welkom in de kroeg<br>
U heeft nog <?php echo $this->session->userdata("consumptions_left"); ?> consumpties over.
<br><br>

<?php foreach($consumptions->result() as $row): ?>
<a href="/index.php/location/consume/<?php echo $row->id; ?>/">Neem een <?php echo $row->name; ?> (<?php echo $row->consumption_weight; ?>) </a><br>
<?php endforeach; ?><br><br>

<a href="/index.php/location/exitlocation">Verlaat de kroeg</a>
