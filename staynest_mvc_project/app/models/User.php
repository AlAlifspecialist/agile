<?php

class User extends Model
{
    protected $table = "users";

    public function create($data)
    {
        $query = "
            INSERT INTO users
            (
                full_name,
                email,
                password_hash,
                phone_number,
                user_role,
                is_active,
                date_joined
            )
            VALUES
            (
                :full_name,
                :email,
                :password_hash,
                :phone_number,
                :user_role,
                1,
                NOW()
            )
        ";

        return $this->query($query, [

            'full_name' => $data['full_name'],

            'email' => $data['email'],

            'password_hash' => $data['password'],

            'phone_number' => $data['phone_number'],

            'user_role' => $data['user_role']

        ]);
    }

    public function findByEmail($email)
    {
        $query = "
            SELECT *
            FROM users
            WHERE email = :email
            LIMIT 1
        ";

        $stmt = $this->query($query, [
            'email' => $email
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function allUsers()
    {
        $query = "
            SELECT *
            FROM users
            ORDER BY user_id DESC
        ";

        $stmt = $this->query($query);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteUser($id)
    {
        $query = "
            DELETE FROM users
            WHERE user_id = :id
        ";

        return $this->query($query, [
            'id' => $id
        ]);
    }
}
?>