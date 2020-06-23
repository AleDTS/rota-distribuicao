<?php

require 'database.php';

echo json_encode(queryCities());

$conn->close();
