<?php

/**
 * Timezone component to manage timezone functions
 */
App::uses('Component', "Controller");
App::uses('CakeTime', 'Utility');

class TimezoneComponent extends Component 
{
    /**
     * to list all the timezones with its abbreviation and GMT offset
     * @return array of timezones
     * @author Laxmi Saini
     */
    public function getAllTimezones()
    {
        /*$timezoneList = CakeTime::listTimezones('', '', false);
        $dateTimeObj = new DateTime();
        foreach ($timezoneList as $timezoneIdentifier) {
            $dateTimeObj->setTimeZone(CakeTime::timezone($timezoneIdentifier));
            $timezoneOffsets[$timezoneIdentifier] = $timezoneIdentifier . " (" . $dateTimeObj->format('T') . "), [" . $this->getTimezoneOffset($timezoneIdentifier) . "]";
        }*/
        $timezoneOffsets = array(
            '(GMT-12:00) International Date Line West   ' => '  (GMT-12:00) International Date Line West',
            '(GMT-11:00) Midway Island, Samoa   ' => '  (GMT-11:00) Midway Island, Samoa',
            '(GMT-10:00) Hawaii ' => '  (GMT-10:00) Hawaii',
            '(GMT-09:00) Alaska ' => '  (GMT-09:00) Alaska',
            '(GMT-08:00) Pacific Time (US and Canada); Tijuana  ' => '  (GMT-08:00) Pacific Time (US and Canada); Tijuana',
            '(GMT-07:00) Mountain Time (US and Canada)  ' => '  (GMT-07:00) Mountain Time (US and Canada)',
            '(GMT-07:00) Chihuahua, La Paz, Mazatlan    ' => '  (GMT-07:00) Chihuahua, La Paz, Mazatlan',
            '(GMT-07:00) Arizona    ' => '  (GMT-07:00) Arizona',
            '(GMT-06:00) Central Time (US and Canada    ' => '  (GMT-06:00) Central Time (US and Canada',
            '(GMT-06:00) Saskatchewan   ' => '  (GMT-06:00) Saskatchewan',
            '(GMT-06:00) Guadalajara, Mexico City, Monterrey    ' => '  (GMT-06:00) Guadalajara, Mexico City, Monterrey',
            '(GMT-06:00) Central America    ' => '  (GMT-06:00) Central America',
            '(GMT-05:00) Eastern Time (US and Canada)   ' => '  (GMT-05:00) Eastern Time (US and Canada)',
            '(GMT-05:00) Indiana (East) ' => '  (GMT-05:00) Indiana (East)',
            '(GMT-05:00) Bogota, Lima, Quito    ' => '  (GMT-05:00) Bogota, Lima, Quito',
            '(GMT-04:00) Atlantic Time (Canada) ' => '  (GMT-04:00) Atlantic Time (Canada)',
            '(GMT-04:00) Caracas, La Paz    ' => '  (GMT-04:00) Caracas, La Paz',
            '(GMT-04:00) Santiago   ' => '  (GMT-04:00) Santiago',
            '(GMT-03:30) Newfoundland and Labrador  ' => '  (GMT-03:30) Newfoundland and Labrador',
            '(GMT-03:00) Brasilia   ' => '  (GMT-03:00) Brasilia',
            '(GMT-03:00) Buenos Aires, Georgetown   ' => '  (GMT-03:00) Buenos Aires, Georgetown',
            '(GMT-03:00) Greenland  ' => '  (GMT-03:00) Greenland',
            '(GMT-02:00) Mid-Atlantic   ' => '  (GMT-02:00) Mid-Atlantic',
            '(GMT-01:00) Azores ' => '  (GMT-01:00) Azores',
            '(GMT-01:00) Cape Verde Islands ' => '  (GMT-01:00) Cape Verde Islands',
            '(GMT) Greenwich Mean Time: Dublin, Edinburgh, Lisbon, London   ' => '  (GMT) Greenwich Mean Time: Dublin, Edinburgh, Lisbon, London',
            '(GMT) Casablanca, Monrovia ' => '  (GMT) Casablanca, Monrovia',
            '(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague  ' => '  (GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague',
            '(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb   ' => '  (GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb',
            '(GMT+01:00) Brussels, Copenhagen, Madrid, Paris    ' => '  (GMT+01:00) Brussels, Copenhagen, Madrid, Paris',
            '(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna   ' => '  (GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna',
            '(GMT+01:00) West Central Africa    ' => '  (GMT+01:00) West Central Africa',
            '(GMT+02:00) Bucharest  ' => '  (GMT+02:00) Bucharest',
            '(GMT+02:00) Cairo  ' => '  (GMT+02:00) Cairo',
            '(GMT+02:00) Helsinki, Kiev, Riga, Sofia, Tallinn, Vilnius  ' => '  (GMT+02:00) Helsinki, Kiev, Riga, Sofia, Tallinn, Vilnius',
            '(GMT+02:00) Athens, Istanbul, Minsk    ' => '  (GMT+02:00) Athens, Istanbul, Minsk',
            '(GMT+02:00) Jerusalem  ' => '  (GMT+02:00) Jerusalem',
            '(GMT+02:00) Harare, Pretoria   ' => '  (GMT+02:00) Harare, Pretoria',
            '(GMT+03:00) Moscow, St. Petersburg, Volgograd  ' => '  (GMT+03:00) Moscow, St. Petersburg, Volgograd',
            '(GMT+03:00) Kuwait, Riyadh ' => '  (GMT+03:00) Kuwait, Riyadh',
            '(GMT+03:00) Nairobi    ' => '  (GMT+03:00) Nairobi',
            '(GMT+03:00) Baghdad    ' => '  (GMT+03:00) Baghdad',
            '(GMT+03:30) Tehran ' => '  (GMT+03:30) Tehran',
            '(GMT+04:00) Abu Dhabi, Muscat  ' => '  (GMT+04:00) Abu Dhabi, Muscat',
            '(GMT+04:00) Baku, Tbilisi, Yerevan ' => '  (GMT+04:00) Baku, Tbilisi, Yerevan',
            '(GMT+04:30) Kabul  ' => '  (GMT+04:30) Kabul',
            '(GMT+05:00) Ekaterinburg   ' => '  (GMT+05:00) Ekaterinburg',
            '(GMT+05:00) Islamabad, Karachi, Tashkent   ' => '  (GMT+05:00) Islamabad, Karachi, Tashkent',
            '(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi    ' => '  (GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi',
            '(GMT+05:45) Kathmandu  ' => '  (GMT+05:45) Kathmandu',
            '(GMT+06:00) Astana, Dhaka  ' => '  (GMT+06:00) Astana, Dhaka',
            '(GMT+06:00) Sri Jayawardenepura    ' => '  (GMT+06:00) Sri Jayawardenepura',
            '(GMT+06:00) Almaty, Novosibirsk    ' => '  (GMT+06:00) Almaty, Novosibirsk',
            '(GMT+06:30) Yangon Rangoon ' => '  (GMT+06:30) Yangon Rangoon',
            '(GMT+07:00) Bangkok, Hanoi, Jakarta    ' => '  (GMT+07:00) Bangkok, Hanoi, Jakarta',
            '(GMT+07:00) Krasnoyarsk    ' => '  (GMT+07:00) Krasnoyarsk',
            '(GMT+08:00) Beijing, Chongqing, Hong Kong SAR, Urumqi  ' => '  (GMT+08:00) Beijing, Chongqing, Hong Kong SAR, Urumqi',
            '(GMT+08:00) Kuala Lumpur, Singapore    ' => '  (GMT+08:00) Kuala Lumpur, Singapore',
            '(GMT+08:00) Taipei ' => '  (GMT+08:00) Taipei',
            '(GMT+08:00) Perth  ' => '  (GMT+08:00) Perth',
            '(GMT+08:00) Irkutsk, Ulaanbaatar   ' => '  (GMT+08:00) Irkutsk, Ulaanbaatar',
            '(GMT+09:00) Seoul  ' => '  (GMT+09:00) Seoul',
            '(GMT+09:00) Osaka, Sapporo, Tokyo  ' => '  (GMT+09:00) Osaka, Sapporo, Tokyo',
            '(GMT+09:00) Yakutsk    ' => '  (GMT+09:00) Yakutsk',
            '(GMT+09:30) Darwin ' => '  (GMT+09:30) Darwin',
            '(GMT+09:30) Adelaide   ' => '  (GMT+09:30) Adelaide',
            '(GMT+10:00) Canberra, Melbourne, Sydney    ' => '  (GMT+10:00) Canberra, Melbourne, Sydney',
            '(GMT+10:00) Brisbane   ' => '  (GMT+10:00) Brisbane',
            '(GMT+10:00) Hobart ' => '  (GMT+10:00) Hobart',
            '(GMT+10:00) Vladivostok    ' => '  (GMT+10:00) Vladivostok',
            '(GMT+10:00) Guam, Port Moresby ' => '  (GMT+10:00) Guam, Port Moresby',
            '(GMT+11:00) Magadan, Solomon Islands, New Caledonia    ' => '  (GMT+11:00) Magadan, Solomon Islands, New Caledonia',
            '(GMT+12:00) Fiji Islands, Kamchatka, Marshall Islands  ' => '  (GMT+12:00) Fiji Islands, Kamchatka, Marshall Islands',
            '(GMT+12:00) Auckland, Wellington   ' => '  (GMT+12:00) Auckland, Wellington',
            '(GMT+13:00) Nuku alofa ' => '  (GMT+13:00) Nuku alofa'

            );
       // pr($timeZoneArray);die;
        //return $timezoneOffsets;
        return $timezoneOffsets;
    }

    /**
     * to convert offset into [GMT +/- hour:min] format
     * @param (int) $offset
     * @return string
     * @author Laxmi Saini
     */
    function formatGmtOffset($offset)
    {
        $hours = intval($offset / 3600);
        $minutes = abs(intval($offset % 3600 / 60));
        return 'GMT' . ($offset ? sprintf('%+03d:%02d', $hours, $minutes) : ' 00:00');
    }
    
    /**
     * Used for GMT offset for a timezone
     * @param string $timezone: timezone name
     * @return string GMT offset for the given timezone
     * @author Laxmi Saini
     */
    function getTimezoneOffset($timezone=null)
    {
        if($timezone!='') {
            $dateTimeObj = new DateTime();
            $date_time_zone = CakeTime::timezone($timezone);
            $dateTimeObj->setTimeZone($date_time_zone);        
            $offset = $dateTimeObj->getOffset();
            return $this->formatGmtOffset($offset);
        } else {
            return "";
        }
    }
}