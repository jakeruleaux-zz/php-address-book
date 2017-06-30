<?php
    class contact
    {
        private $name;
        private $address;
        private $phone;

        function __construct()
        {
            $this->name;
            $this->address;
            $this->phone;
        }

        function setName($new_name)
        {
            $this->name = $new_name
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
