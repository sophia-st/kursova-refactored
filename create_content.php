<?php
require 'main.php';

if(!empty($_POST)){
    createContent();
}

header("Location: index.php");