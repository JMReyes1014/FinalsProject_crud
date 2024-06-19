<?php 

class database {
    function opencon() {
        return new PDO ('mysql:host=localhost; dbname=portfolio_crud', 'root', '');
    }

}
?>