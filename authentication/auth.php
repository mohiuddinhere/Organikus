<?php

    session_start();
    if(!$_SESSION['auth'])
    {
        echo "session didn''t start";
    }

?>