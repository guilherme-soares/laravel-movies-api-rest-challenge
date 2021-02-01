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
    			"name" => "Harry Potter e a Pedra Filosofal",
    			"year" => 2001,
    			"sinopse" => "Uma criança órfã se enrolla em uma escola de magia, onde ele aprende a verdade sobre si mesmo, sua família e o terrível mal que se esconde no mundo mágico.",
    			"duration" => "2h32",
    			"directors" => "Chris Columbus",
    			"writers" => " J.K. Rowling",
    			"stars" => "[{\"name\": \"Daniel Radcliffe\"}, {\"name\": \" Rupert Grint\"}, {\"name\": \"Emma Watson\"}]",
    			"rating" => 7.6,
    			"image" => "https://2.bp.blogspot.com/-sFwWC75KopI/W7LZe-PQnoI/AAAAAAAAD_4/6_DvXc9eJdAbxTj8XOL1PEAO-XEcJf-NACLcBGAs/s1600/harry%2Bpotter%2Be%2Ba%2Bpedra%2Bfilosofal.png",
    			'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
    		],
    		[
    			"name" => "Harry Potter e a Câmara Secreta",
    			"year" => 2002,
    			"sinopse" => "Um mito antigo parece ser corroborado quando uma misteriosa presença começa a perseguir os corredores da escola mágica, deixando suas vítimas petrificadas.",
    			"duration" => "2h41",
    			"directors" => "Chris Columbus",
    			"writers" => " J.K. Rowling",
    			"stars" => "[{\"name\": \"Daniel Radcliffe\"}, {\"name\": \" Rupert Grint\"}, {\"name\": \"Emma Watson\"}]",
    			"rating" => 7.,
    			"image" => "https://2.bp.blogspot.com/-Xr5U3Aa-QZ8/W9Kp58zvBMI/AAAAAAAAEYQ/r2oNpUqcYBQutfWY6aVXpUIKh1L9TIi-QCLcBGAs/s1600/harry%2Bpotter%2Be%2Ba%2Bc%25C3%25A2mara%2Bsecreta.png",
    			'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
    		],
    		[
    			"name" => "Harry Potter e o Prisioneiro de Azkaban",
    			"year" => 2004,
    			"sinopse" => "Harry está prestes a começar o seu terceiro ano em Hogwarts quando o terrível assassino Sirius Black, um aliado de Voldemort, foge da prisão de Azkaban. Apesar da vigilância, Harry sabe que, cedo ou tarde, Black virá ao seu encontro.",
    			"duration" => "2h22",
    			"directors" => "Alfonso Cuarón",
    			"writers" => " J.K. Rowling",
    			"stars" => "[{\"name\": \"Daniel Radcliffe\"}, {\"name\": \" Rupert Grint\"}, {\"name\": \"Emma Watson\"}]",
    			"rating" => 7.9,
    			"image" => "https://3.bp.blogspot.com/-88pYDS6c2oA/WW2J2MWSC0I/AAAAAAAAwNg/qT5xOb_pdbMpYG9PN5QMUvMms8yam78zgCLcBGAs/s1600/00%2B-%2BHarry-Potter-and-the-Prisoner-of-Azkaban-movie-poster.jpg",
    			'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
    		],
    		[
    			"name" => "Harry Potter e o Calice de Fogo",
    			"year" => 2005,
    			"sinopse" => "Com sua advertência sobre o retorno de Lord Voldemort, Harry e Dumbledore, são atacados pelas autoridades do mago, enquanto um burocrata autoritário toma o poder lentamente em Hogwarts.",
    			"duration" => "2h37",
    			"directors" => "Mike Newell",
    			"writers" => " J.K. Rowling",
    			"stars" => "[{\"name\": \"Daniel Radcliffe\"}, {\"name\": \" Rupert Grint\"}, {\"name\": \"Emma Watson\"}]",
    			"rating" => 7.7,
    			"image" => "http://pipocacombo.com/public/wp-content/uploads/2016/10/harry-potter-e-o-calice-de-fogo-875x540.jpg",
    			'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
    		],
    		[
    			"name" => "Harry Potter e a Ordem da Fenix",
    			"year" => 2007,
    			"sinopse" => "Com sua advertência sobre o retorno de Lord Voldemort, Harry e Dumbledore, são atacados pelas autoridades do mago, enquanto um burocrata autoritário toma o poder lentamente em Hogwarts.",
    			"duration" => "2h18",
    			"directors" => "David Yates",
    			"writers" => " J.K. Rowling",
    			"stars" => "[{\"name\": \"Daniel Radcliffe\"}, {\"name\": \" Rupert Grint\"}, {\"name\": \"Emma Watson\"}]",
    			"rating" => 7.5,
    			"image" => "https://www.magazine-hd.com/apps/wp/wp-content/uploads/2018/11/harry-potter-ordem-fenix.jpg",
    			'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
    		],
    		[
    			"name" => "Harry Potter e o Enigma do Principe",
    			"year" => 2009,
    			"sinopse" => "Harry Potter começa seu sexto ano em Hogwarts, descobre um livro de propriedade do Príncipe Mestiço, e começa a aprender mais sobre o passado sombrio de Voldemort.",
    			"duration" => "2h33",
    			"directors" => "David Yates",
    			"writers" => " J.K. Rowling",
    			"stars" => "[{\"name\": \"Daniel Radcliffe\"}, {\"name\": \" Rupert Grint\"}, {\"name\": \"Emma Watson\"}]",
    			"rating" => 7.6,
    			"image" => "https://2.bp.blogspot.com/-g2NNtpCpaUg/W8An-y_RaHI/AAAAAAAAELM/wFRkUqs2fwAM30WO_8jYwYoEaz2GR36AACLcBGAs/s1600/harry%2Bpotter%2Be%2Bo%2Benigma%2Bdo%2Bpr%25C3%25ADncipe.png",
    			'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
    		],
    		[
    			"name" => "Harry Potter e as Reliquias da Morte Parte 1",
    			"year" => 2010,
    			"sinopse" => "Harry embarca em uma corrida contra o tempo para destruir as Horcruxes e descobre a existência dos três objetos mais poderosos do mundo mágico: as relíquias da morte.",
    			"duration" => "2h26",
    			"directors" => "David Yates",
    			"writers" => " J.K. Rowling",
    			"stars" => "[{\"name\": \"Daniel Radcliffe\"}, {\"name\": \" Rupert Grint\"}, {\"name\": \"Emma Watson\"}]",
    			"rating" => 7.7,
    			"image" => "https://1.bp.blogspot.com/-PmiPFTUbN4M/W8PUySZfXeI/AAAAAAAAENU/MKwuzw7FTC4CAjwszVpMNdxc1UDcKNZHACLcBGAs/s1600/harry%2Bpotter%2Be%2Bas%2Brel%25C3%25ADquias%2Bda%2Bmorte%2B-%2Bparte%2B1.png",
    			'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
    		],
    		[
    			"name" => "Harry Potter e as Reliquias da Morte Parte 2",
    			"year" => 2011,
    			"sinopse" => "Harry, Ron e Hermione devem escapar a Voldemort e tentar trabalhar em conjunto para localizar e aniquilar os Horcruxes, que contêm pedaços da alma de Voldemort.",
    			"duration" => "2h10",
    			"directors" => "David Yates",
    			"writers" => " J.K. Rowling",
    			"stars" => "[{\"name\": \"Daniel Radcliffe\"}, {\"name\": \" Rupert Grint\"}, {\"name\": \"Emma Watson\"}]",
    			"rating" => 8.1,
    			"image" => "https://1.bp.blogspot.com/-BDdXbJ5MSx0/W-bhlgnkIUI/AAAAAAAAEvk/diIGyn9RLgExfqMUup1LMMeuGnOm2r5zwCLcBGAs/s1600/harry%2Bpotter%2Be%2Bas%2Brel%25C3%25ADquias%2Bda%2Bmorte%2B-%2Bparte%2B2.png",
    			'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
    		],

    	];

    	\DB::table('movies')->insert($movies);
    }




}
