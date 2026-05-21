<?php

class Booking extends Model
{
    protected $table = "bookings";

    public function byUser($user_id)
    {
        $query = "
            SELECT 
                bookings.*,
                properties.property_title,
                properties.property_type,
                properties.address,
                properties.price_per_month,
                properties.image_path
            FROM bookings
            JOIN properties 
                ON bookings.property_id = properties.property_id
            WHERE bookings.user_id = :user_id
            ORDER BY bookings.booking_id DESC
        ";

        return $this->query($query, [
            'user_id' => $user_id
        ]);
    }

    public function createBooking($data)
    {
        $query = "
            INSERT INTO bookings
            (
                user_id,
                property_id,
                booking_date,
                check_in_date,
                check_out_date,
                booking_status,
                is_confirmed,
                notes
            )
            VALUES
            (
                :user_id,
                :property_id,
                NOW(),
                :check_in_date,
                :check_out_date,
                'Pending',
                0,
                :notes
            )
        ";

        return $this->query($query, [
            'user_id' => $data['user_id'],
            'property_id' => $data['property_id'],
            'check_in_date' => $data['check_in_date'],
            'check_out_date' => $data['check_out_date'],
            'notes' => $data['notes']
        ]);
    }

    public function deleteBooking($booking_id)
    {
        $query = "
            DELETE FROM bookings
            WHERE booking_id = :booking_id
        ";

        return $this->query($query, [
            'booking_id' => $booking_id
        ]);
    }

    public function updateBooking($data)
    {
        $query = "
            UPDATE bookings
            SET
                check_in_date = :check_in_date,
                check_out_date = :check_out_date,
                notes = :notes
            WHERE booking_id = :booking_id
        ";

        return $this->query($query, [
            'check_in_date' => $data['check_in_date'],
            'check_out_date' => $data['check_out_date'],
            'notes' => $data['notes'],
            'booking_id' => $data['booking_id']
        ]);
    }
}
?>