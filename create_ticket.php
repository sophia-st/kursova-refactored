<?php
require 'main.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    createTicket();
}