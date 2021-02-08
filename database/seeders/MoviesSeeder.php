<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MoviesSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTimestamp = Carbon::now();

        $movies = [
            [
                "name"       => "Batman Begins",
                "year"       => 2005,
                "synopsis"   => "Driven by tragedy, billionaire Bruce Wayne dedicates his life to uncovering and defeating the corruption that plagues his home, Gotham City. Unable to work within the system, he instead creates a new identity, a symbol of fear for the criminal underworld – The Batman.",
                "duration"   => "2h20",
                "directors"  => "Christopher Nolan",
                "writers"    => " Christopher Nolan, David S Goyer",
                "stars"      => "[{\"name\": \"Christian Bale\"}, {\"name\": \"Michael Caine\"}, {\"name\": \"Katie Holmes\"}, {\"name\": \"Liam Neeson\"}]",
                "rating"     => 8.4,
                "image"      => "https://resizing.flixster.com/gG9jEpn7NVg5pYWwQidlxiBJ3HA=/206x305/v2/https://flxt.tmsimg.com/NowShowing/48435/48435_aa.jpg",
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                "name"       => "The Dark Knight",
                "year"       => 2008,
                "synopsis"   => "Batman raises the stakes in his war on crime. With the help of Lt. Jim Gordon and District Attorney Harvey Dent, Batman sets out to dismantle the remaining criminal organizations that plague the streets. The partnership proves to be effective, but they soon find themselves prey to a reign of chaos unleashed by a rising criminal mastermind known to the terrified citizens of Gotham as the Joker.",
                "duration"   => "2h32",
                "directors"  => "Christopher Nolan",
                "writers"    => "Christopher Nolan, Jonathan Nolan, David S Goyer",
                "stars"      => "[{\"name\": \"Christian Bale\"}, {\"name\": \"Michael Caine\"}, {\"name\": \"Heath Ledger\"}, {\"name\": \"Morgan Freeman\"}]",
                "rating"     => 9.4,
                "image"      => "https://resizing.flixster.com/l_yp_jJl0uhaly5u8cK-1zklk6o=/206x305/v2/https://flxt.tmsimg.com/NowShowing/63045/63045_aa.jpg",
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                "name"       => "The Dark Knight Rises",
                "year"       => 2012,
                "synopsis"   => "Following the death of District Attorney Harvey Dent, Batman assumes responsibility for Dent’s crimes to protect the late attorney’s reputation and is subsequently hunted by the Gotham City Police Department. Eight years later, Batman encounters the mysterious Selina Kyle and the villainous Bane, a new terrorist leader who overwhelms Gotham’s finest. The Dark Knight resurfaces to protect a city that has branded him an enemy.",
                "duration"   => "2h22",
                "directors"  => "Christopher Nolan",
                "writers"    => "Christopher Nolan, Jonathan Nolan, David S Goyer",
                "stars"      => "[{\"name\": \"Christian Bale\"}, {\"name\": \"Michael Caine\"}, {\"name\": \"Gary Oldman\"}, {\"name\": \"Anne Hathaway\"}, {\"name\": \"Tom Hardy\"}]",
                "rating"     => 8.7,
                "image"      => "https://resizing.flixster.com/Ev6G8Z0H3SFepS-SDY0X-OsVpmQ=/206x305/v2/https://flxt.tmsimg.com/NowShowing/108806/108806_ac.jpg",
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],

        ];

        \DB::table('movies')->insert($movies);
    }


}
