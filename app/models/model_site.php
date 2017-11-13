<?php

class Model_Site extends Model {

    public function get_user($data) {
        $query = 'SELECT * FROM user where username = :USERNAME AND pass = :PASS';
        $dbh = $this->db->prepare($query);
        $user = trim($data['username']);
        $pass = trim($data['password']);
        $pass = md5($pass);
        $dbh->bindParam(':USERNAME', $user, PDO::PARAM_STR);
        $dbh->bindParam(':PASS', $pass, PDO::PARAM_STR);
        $dbh->execute();
        $result = $dbh->fetchAll();

        $this->toSession('user', $result[0]);
    }

    public function get_money($userid) {
        $query = 'SELECT * FROM money where user_id = :USERID';
        $dbh = $this->db->prepare($query);
        $dbh->bindParam(':USERID', $userid, PDO::PARAM_INT);
        $dbh->execute();
        $result = $dbh->fetchAll();
        return $result[0];
        //$this->toSession('user', $result[0]);
    }

    public function set_money($userid, $sum) {
        $query = 'SELECT * FROM money where user_id = :USERID';
        $dbh = $this->db->prepare($query);
        $dbh->bindParam(':USERID', $userid, PDO::PARAM_INT);
        $dbh->execute();
        $result = $dbh->fetchAll();
        $money = $result[0]['money'] - $sum;

        $query = 'UPDATE money SET money = :MONEY WHERE user_id = :USERID';
        $dbh = $this->db->prepare($query);
        $dbh->bindParam(':USERID', $userid, PDO::PARAM_INT);
        $dbh->bindParam(':MONEY', $money, PDO::PARAM_INT);
        $dbh->execute();

        return true;
    }

    public function toSession($name, $result) {
        session_start();
        $_SESSION[$name] = [
            'name' => $result['username'],
            'id' => $result['id']
        ];
        session_write_close();
    }

}
