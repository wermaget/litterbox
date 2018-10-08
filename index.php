<?php
require 'config/site.php';

header("Location: ".$config['base_url']."/home");

exit; // <- don't forget this!
