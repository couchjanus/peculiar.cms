<?php
$address = conf('contact');
render('contact/index', ['address'=>$address]);