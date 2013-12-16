<?php $this->load->view("common/header"); ?>

<div id="barBackground"	>

Welkom in de kroeg<br>
U heeft nog <?php echo $this->session->userdata("consumptions_left"); ?> consumpties over.
<br><br>



<a href="/index.php/location/exitlocation">Verlaat de kroeg</a>

</div>

<?php $this->load->view("common/footer");?>