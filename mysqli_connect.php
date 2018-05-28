<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 5/25/2018
 * Time: 10:50 AM
 */

// This file contains the database access information.
// This file also establishes a connection to MySQL,
// selects the database, and sets the encoding.

// Set the database access information as constants:
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_USER', 'c34_2018');
DEFINE ('DB_PASSWORD', 'comp334!');
DEFINE ('DB_NAME', 'c34_2018');

// Make the connection:
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to
MySQL: ' . mysqli_connect_error( ) );

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');