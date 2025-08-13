<?php
    // Connection Data Base
    try {
        $conx = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    } catch (PDOException $e) {
       echo 'Error: ' . $e->getMessage();
    }
 
   // Login
    function login($email, $pass, $conx) {
        try {
            $sql = "SELECT *
                    FROM users
                    WHERE email = :email
                    LIMIT 1";
            $stmt = $conx->prepare($sql);
            $stmt->bindparam(':email', $email);
            $stmt->execute();
 
            if($stmt->rowCount() > 0) {
                $usr = $stmt->fetch(PDO::FETCH_ASSOC);
                if(password_verify($pass, $usr['password'])) {
                    $_SESSION['uid'] = $usr['id'];
                    return true;
                } else {
                    $_SESSION['error'] = "El password es incorrecto!";
                    return false;
                }
            } else {
                $_SESSION['error'] = "El usuario no esta registrado!";
                return false;
            }
 
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
 
    }

    //list pets
    function listPets($conx) {
        try {
            $sql = "SELECT p.id AS id,
                            p.name AS name,
                            p.photo AS photo,
                            s.name AS specie,
                            b.name AS breed
                    FROM pets AS p,
                        species AS s,
                        breeds AS b
                    WHERE s.id = p.specie_id
                    AND b.id = p.breed_id";
            $stmt = $conx->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }