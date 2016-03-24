<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBConnect
 *
 * @author web
 */
class DBConnect {

    private $link;

    public function __construct() {
        $this->link = mysqli_connect('localhost', 'root', '', 'users');
    }

    public function getAllUsers() {
        if ($this->link) {
            $query = "SELECT id, login, email  FROM users";
            $res = mysqli_query($this->link, $query);
            if ($res) {
                $users = array();
                while ($row = mysqli_fetch_assoc($res)) {
                    array_push($users, $row);
                }
                return $users;
            } else {
                return false;
            }
        }
    }

    public function createUser($login, $email, $pass) {
        if ($this->link) {
            $is_exist = false;
            $query = "SELECT * FROM users WHERE login='$login'";
            $res = mysqli_query($this->link, $query);
            if ($res) {
                $is_exist = true;
            }
            $query = "SELECT * FROM users WHERE email='$email'";
            $res = mysqli_query($this->link, $query);
            if ($res) {
                $is_exist = true;
                if (!$is_exist) {
                    $insert_user = "INSERT INTO users (email, login, pass) VALUES ('$email','$login','$pass')";
                    $insert = mysqli_query($this->link, $insert_user);
                    if ($insert) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        }
    }

    public function authUser($login, $pass) {
        if ($this->link) {
            $query = "SELECT * FROM users WHERE login='$login' AND pass='$pass'";
            $res = mysqli_query($this->link, $query);
            $is_exist = false;
            if ($res) {
                $is_exist = true;
            }
            return $is_exist;
        }
    }

    public function deleteUser($id) {
        if ($this->link) {
            $query = "DELETE  FROM users WHERE id='$id'";
            $res = mysqli_query($this->link, $query);
            if ($res) {
                return true;
            } else {
                echo 'no query to db';
            }
        } else {
            echo 'no connect to db';
        }
     
    }
}
