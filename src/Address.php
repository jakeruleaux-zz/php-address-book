<?php
    class Contact
    {
        private $name;
        private $address;
        private $phone;
        private $email;

        function __construct($contact_name, $contact_address, $contact_phone, $contact_email)
        {
            $this->name = $contact_name;
            $this->address = $contact_address;
            $this->phone = $contact_phone;
            $this->email = $contact_email;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function getName()
        {
            return $this->name;
        }

        function setAddress($new_address)
        {
            $this->address = $new_address;
        }

        function getAddress()
        {
            return $this->address;
        }

        function setPhone($new_phone)
        {
            $this->phone = $new_phone;
        }
        function getPhone()
        {
            return $this->phone;
        }

        function setEmail($new_email)
        {
            $this->email = $new_email;
        }
        function getEmail()
        {
            return $this->email;
        }

        function save()
        {
            array_push($_SESSION['list_of_contacts'], $this);
        }

        static function getAll()
        {
            return $_SESSION['list_of_contacts'];
        }

        static function deleteAll()
        {
            return $_SESSION['list_of_contacts'] = array();
        }
    }


?>
