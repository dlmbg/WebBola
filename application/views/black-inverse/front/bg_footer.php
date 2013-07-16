<div class="cleaner_h20"></div>

<div id="footer-menu">
<div id="center-footer-menu">
<?php
$get_atas = $this->db->get_where("dlmbg_menu");
foreach($get_atas->result() as $ga)
{
	echo '<a href="'.base_url().'web/pages/'.$ga->url_route.'">'.$ga->menu.'</a> | ';
}
?>
</div>
</div>

<div id="footer">
<div id="center-footer">
Copyright © 2012 SMAN 9 Pekanbaru. All Rights Reserved.<br />
Mirah Hotel, Yos Sudarso Street 28. Banyuwangi, East Java, Indonesia. Tel.-62 333 420600. Fax.-62 333 414890<br />
You come here with the IP Address 180.247.235.203<br />
</div>
</div>


</body>
</html>
