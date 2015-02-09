<?php
session_start();
require("simple_form_dom.php");

if(isset($_POST['side']) && $_POST['side'] == 'left') {
  $_SESSION['left_host'] = parse_url($_POST['url'])['host'];
} else {
  $_SESSION['right_host'] = parse_url($_POST['url'])['host'];
}

$html = file_get_html($_POST['url']);
foreach($html->find('body') as $element) {
  echo $element;
}
