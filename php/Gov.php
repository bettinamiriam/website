<?php

class Gov {
    const API_KEY = 'ec66accce31f4329b4c4da3654742f9b';
    const HJRES56_ID = '294516';
    const HJRES113_ID = '292635';
    const SJRES10_ID = '285631';
    const SJRES15_ID = '292629';
    const HJRES56_STR = 'hjres56-113';
    const HJRES113_STR = 'hjres113-113';
    const SJRES10_STR = 'sjres10-113';
    const SJRES15_STR = 'sjres15-113';

    public static function getCongressDataByZip($zip) {
        $congress_members = self::getCongressMembersByZipCode($zip);
        $co_sponsors_56 = self::getCoSponsors(self::HJRES56_ID);
        $co_sponsors_113 = self::getCoSponsors(self::HJRES113_ID);
        $co_sponsors_10 = self::getCoSponsors(self::SJRES10_ID);
        $co_sponsors_15 = self::getCoSponsors(self::SJRES15_ID);

        $congress_data = array();
        foreach($congress_members as $name => $data) {
            $bioguideid = $data['bioguide'];

            $bills = "";
            if (in_array($bioguideid, $co_sponsors_10)) {
                $bills .= ' S.J.RES.10,';
            }
            if (in_array($bioguideid, $co_sponsors_15)) {
                $bills .= ' S.J.RES.15,';
            }
            if (in_array($bioguideid, $co_sponsors_113)) {
                $bills .= ' H.J.RES.113,';
            }
            if (in_array($bioguideid, $co_sponsors_56)) {
                $bills .= ' H.J.RES.56,';
            }
            $bills = rtrim($bills, ",");
            $bills = trim($bills, " ");
            $data['bills'] = $bills;

            $congress_data[$name] = $data;
        }
        return $congress_data;
    }

    public static function getCongressDataByState($state) {
        $congress_members = self::getCongressMembersByState($state);
        if (!$congress_members) {
            return null;
        }
        
        $co_sponsors_56 = self::getCoSponsors(self::HJRES56_ID);
        $co_sponsors_113 = self::getCoSponsors(self::HJRES113_ID);
        $co_sponsors_10 = self::getCoSponsors(self::SJRES10_ID);
        $co_sponsors_15 = self::getCoSponsors(self::SJRES15_ID);

        $sponsors = array_merge($co_sponsors_10, $co_sponsors_113, $co_sponsors_15, $co_sponsors_56);

        $supporters = array();
        $nonsupporters = array();
        foreach($congress_members as $name => $data) {
            $bioguideid = $data['bioguide'];
            if (in_array($bioguideid, $sponsors)) {
                $supporters[] = $name;
            } else {
                $nonsupporters[] = $name;
            }
        }

        return array('supporters' => $supporters, 'nonsupporters' => $nonsupporters);
    }


    // =========================================================================
    // Helper Functions
    // =========================================================================

    /*
     * URL must be a string with single quotes (i.e. 'url')
     */
    public static function getData($url) {
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        $contents = curl_exec($ch);
        curl_close($ch);

        return json_decode($contents, true);
    }

    public static function getCongressMembersByZipCode($zip) {
        $url = 'http://congress.api.sunlightfoundation.com/legislators/locate?apikey=' . self::API_KEY . '&in_office=true&zip=' . $zip;

        $data = self::getData($url);
        $congress_members = $data['results'];

        $congress_data = array();
        foreach($congress_members as $member) {
            $member_data = array();
            $name = "{$member['title']}. {$member['first_name']} {$member['middle_name']} {$member['last_name']}";
            $member_data['role'] = ($member['chamber'] === 'house') ? 'Representative' : 'Senator';
            $member_data['contact'] = !($member['contact_form']) ? $member['website'] : $member['contact_form'];
            $member_data['bioguide'] = $member['bioguide_id'];
            $congress_data[$name] = $member_data;
        }
        return $congress_data;
    }

    public static function getCongressMembersByState($state) {
        $url = 'http://congress.api.sunlightfoundation.com/legislators?apikey=' . self::API_KEY . '&in_office=true&state=' . $state;

        $data = self::getData($url);
        $congress_members = $data['results'];

        $congress_data = array();
        foreach($congress_members as $member) {
            $member_data = array();
            $name = "{$member['title']}. {$member['first_name']} {$member['middle_name']} {$member['last_name']}";
            $member_data['bioguide'] = $member['bioguide_id'];
            $congress_data[$name] = $member_data;
        }
        return $congress_data;
    }

    public static function getCoSponsors($res) {
        $url = 'https://www.govtrack.us/api/v2/bill/' . $res;
        $data = self::getData($url);

        $sponsor = $data['sponsor']['bioguideid'];
        $cosponsors = $data['cosponsors'];
        $cosponsor_ids = array();
        foreach($cosponsors as $cosponsor) {
            $cosponsor_ids[] = $cosponsor['bioguideid'];
        }

        return array_merge(array($sponsor), $cosponsor_ids);
    }

    public static function getPdfUrlFromRes($res) {
        $url = 'http://congress.api.sunlightfoundation.com/bills?apikey=' . self::API_KEY . '&bill_id=' . $res;
        $data = self::getData($url);
        return $data['urls']['pdf'];
    }

}
