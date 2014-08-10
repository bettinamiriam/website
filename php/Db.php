<?php

class Db {
    const HOST = "205.178.146.104";
    const USERNAME = "eracoalition";
    const PASSWORD = "Coalition1";
    const DB = "eracoalition";
    const SIGNATURE_TABLE = 'signatures';

    public static function getSignatureCount() {
        $query = "SELECT * FROM " . self::SIGNATURE_TABLE;
        $result = self::dbQuery($query);
        mysqli_fetch_array($result);

        return mysqli_num_rows($result);
    }

    public static function getSignatures() {
        $query = "SELECT * FROM " . self::SIGNATURE_TABLE;
        return self::dbQuery($query);
    }

    public static function insertSignature($name, $email, $state) {
        if (!$name) {
            $output = "Please enter your name";
        } elseif (!$email) {
            $output = "Please enter your email address";
        } elseif (!$state) {
            $output = "Please select a state";
        } else {
            $query = "INSERT INTO " . self::SIGNATURE_TABLE . " (name, email, state) VALUES ('$name', '$email', '$state')";
            self::dbQuery($query);
            $output = "Thank you, $name for taking the ERA Pledge!";
        }

        return $output;
    }

    private static function dbQuery($query) {
        $con = mysqli_connect(self::HOST, self::USERNAME, self::PASSWORD, self::DB);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con, $query);
        mysqli_close($con);

        return $result;
    }

    private static function downloadCsv() {
        // output headers so that the file is downloaded rather than displayed
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');

        // create a file pointer connected to the output stream
        $output = fopen('php://output', 'w');

        // output the column headings
        fputcsv($output, array('Column 1', 'Column 2', 'Column 3'));

        // fetch the data
        $rows = self::getSignatures();
        // loop over the rows, outputting them
        while ($row = mysqli_fetch_assoc($rows)) fputcsv($output, $row);
    }

}