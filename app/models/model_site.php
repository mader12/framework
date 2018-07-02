<?php

class Model_Site extends Model {

    /**
     * return user
     * @param array $data
     */
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

    /**
     * 
     * @param int $userid
     * @return array money
     */
    public function get_money($userid) {
        $query = 'SELECT * FROM money where user_id = :USERID';
        $dbh = $this->db->prepare($query);
        $dbh->bindParam(':USERID', $userid, PDO::PARAM_INT);
        $dbh->execute();
        $result = $dbh->fetchAll();
        return $result[0];
    }

    /**
     * set sum money to user
     * @param int $userid
     * @param int $sum
     * @return boolean
     */
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

    /**
     * 
     * @param string $sessionName
     * @param array $result
     */
    public function toSession($sessionName, $result) {
        session_start();
        $_SESSION[$sessionName] = [
            'name' => $result['username'],
            'id' => $result['id']
        ];
        session_write_close();
    }

}
