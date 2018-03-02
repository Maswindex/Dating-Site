<?php

/*
CREATE TABLE Members (
    member_id int PRIMARY KEY AUTO_INCREMENT,
    fname varchar(50),
    lname varchar(50),
    age int,
    gender char(1),
    phone varchar(15),
    email varchar(50),
    state char(2),
    seeking char(1),
    bio varchar(255),
    premium bit(1),
    image varchar(255),
    interests varchar(255)
);
 */

class DatingDatabase
{
    /*
     * This function takes a member object and
     * inserts the member into the database as
     * a new member
     *
     * @param member a member object
     * @return boolean true if successful insert
     */
    function memberInsert($member)
    {
        try {
            //Instantiate a database object
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return;
        }

        $sql = "
            INSERT INTO Members 
            (fname, lname, age, gender, phone, email, state, seeking, bio, image, interests, premium) 
            VALUES 
            (:fname, :lname, :age, :gender, :phone, :email, :state, :seeking, :bio, :image, :interests, :premium)";

        //grabs interests if premium
        $interests = ($member->isPremium())?$member->getInterests():null;
        $premium = ($member->isPremium())?1:0;

        //Prepeare the statemenet
        $statement = $dbh->prepare($sql);

        //Bind the parameters
        $statement->bindParam(':fname', $member->getFname(), PDO::PARAM_STR);
        $statement->bindParam(':lname', $member->getLname(), PDO::PARAM_STR);
        $statement->bindParam(':age', $member->getAge(), PDO::PARAM_INT);
        $statement->bindParam(':gender', $member->getGender(), PDO::PARAM_STR);
        $statement->bindParam(':phone', $member->getPhone(), PDO::PARAM_STR);
        $statement->bindParam(':email', $member->getEmail(), PDO::PARAM_STR);
        $statement->bindParam(':state', $member->getState(), PDO::PARAM_STR);
        $statement->bindParam(':seeking', $member->getSeeking(), PDO::PARAM_STR);
        $statement->bindParam(':bio', $member->getBio(), PDO::PARAM_STR);
        $statement->bindParam(':premium', $premium, PDO::PARAM_BOOL);
        $statement->bindParam(':image', $member->getImg(), PDO::PARAM_STR);
        $statement->bindParam(':interests',  $interests, PDO::PARAM_STR);

        //execute the statement
        $statement->execute();

        $id = $dbh->lastInsertId();
        echo "<p>Member $id inserted succesfully.</p>";
    }

    /**
     * This function takes in a Member object
     * and updates the information for its row
     * in a database
     *
     * @return boolean true if successful update
     */
    function memberUpdate($member)
    {
        return false;
    }

    /**
     * This function returns all Members in the dating database
     *
     * @return array of members
     */
    function getAllMembers() {
        try {
            //Instantiate a database object
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return;
        }

        $sql = "SELECT * FROM Members";

        $statement = $dbh->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}