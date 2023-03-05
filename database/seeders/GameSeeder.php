<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;
use Carbon\Carbon;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $omori=Game::create(['title'=>'Omori','description'=>'Explore a strange world full of colorful friends and foes. When the time comes, the path you’ve chosen will determine your fate... and perhaps the fate of others as well.','image'=>'img/omori.png','fecha_salida'=>Carbon::parse('2020-12-25'),'genero'=>'RPG']);
        $ultrakill=Game::create(['title'=>'Ultrakill','description'=>'A fast-paced ultraviolent retro FPS combining the skill-based style scoring from character action games with unadulterated carnage inspired by the best shooters of the 90s. Rip apart your foes with varied destructive weapons and shower in their blood to regain your health','image'=>'img/ultrakill.png','fecha_salida'=>Carbon::parse('2020-09-03'),'genero'=>'Shooter']);
        $slime_rancher=Game::create(['title'=>'Slime Rancher','description'=>'Slime Rancher is the tale of Beatrix LeBeau, a plucky, young rancher who sets out for a life a thousand light years away from Earth on the Far, Far Range where she tries her hand at making a living wrangling slimes.','image'=>'img/slime.png','fecha_salida'=>Carbon::parse('2017-08-01'),'genero'=>'Adventure']);
        $shin_megami_tensei_iii_nocturne_hd_remaster=Game::create(['title'=>'Shin Megami Tensei III Nocturne HD Remaster','description'=>'What begins as a normal day in Tokyo turns out to be everything but, when the Conception (an ethereal apocalypse) is invoked. The remains of the world are swallowed by chaos, as a demonic revolution descends into a broken city. Caught between a battle of Gods and demons, the choices you make can bring life, rebirth, or death, and determine who triumphs.','image'=>'img/smt.png','fecha_salida'=>Carbon::parse('2021-05-21'),'genero'=>'RPG']);
        $sekiro_shadows_die_twice=Game::create(['title'=>'Sekiro: Shadows Die Twice','description'=>'Explore late 1500s Sengoku Japan, a brutal period of constant life and death conflict, as you come face to face with larger than life foes in a dark and twisted world. Unleash an arsenal of deadly prosthetic tools and powerful ninja abilities while you blend stealth, vertical traversal, and visceral head to head combat in a bloody confrontation.','image'=>'img/sekiro.png','fecha_salida'=>Carbon::parse('2021-03-21'),'genero'=>'Action']);
        $nierautomata=Game::create(['title'=>'NieR:Automata','description'=>'NieR: Automata tells the story of androids 2B, 9S and A2 and their battle to reclaim the machine-driven dystopia overrun by powerful machines.Humanity has been driven from the Earth by mechanical beings from another world. In a final effort to take back the planet, the human resistance sends a force of android soldiers to destroy the invaders. Now, a war between machines and androids rages on... A war that could soon unveil a long-forgotten truth of the world.','image'=>'img/nier.png','fecha_salida'=>Carbon::parse('2017-03-17'),'genero'=>'Action']);
        $nier_replicant_ver122474487139=Game::create(['title'=>'NieR Replicant ver.1.22474487139','description'=>'The upgraded prequel of NieR:Automata. A kind young man sets out with Grimoire Weiss, a strange talking book, to search for the "Sealed verses" in order to save his sister Yonah, who fell terminally ill to the Black Scrawl.','image'=>'img/nierrep.png','fecha_salida'=>Carbon::parse('2021-04-23'),'genero'=>'Action']);
        $mirrors_edge_catalyst=Game::create(['title'=>'Mirrors Edge Catalyst','description'=>'Mirrors Edge Catalyst raises the action-adventure bar through fluid, first person action and immerses players in Faiths story as she fights for freedom.','image'=>'img/mirrorsedge.png','fecha_salida'=>Carbon::parse('2016-06-07'),'genero'=>'Adventure']);
        $hollow_knight=Game::create(['title'=>'Hollow Knight','description'=>'Forge your own path in Hollow Knight! An epic action adventure through a vast ruined kingdom of insects and heroes. Explore twisting caverns, battle tainted creatures and befriend bizarre bugs, all in a classic, hand-drawn 2D style.','image'=>'img/hollow.png','fecha_salida'=>Carbon::parse('2017-02-24'),'genero'=>'Platformer']);
        $eastward=Game::create(['title'=>'Eastward','description'=>'Welcome to the charming world of Eastward - population declining! Journey through a society on the brink of collapse. Discover delightful towns, strange creatures and even stranger people! Wield a trusty frying pan and mystic powers on an adventure into the unknown…','image'=>'img/eastward.png','fecha_salida'=>Carbon::parse('2021-09-16'),'genero'=>'RPG']);
        $tower_unite=Game::create(['title'=>'Tower Unite','description'=>'PLAY, CREATE, PARTY! Tower Unite is a community-based virtual world party game with online games, entertainment, activities, and absolutely NO microtransactions.','image'=>'img/towerunite.png','fecha_salida'=>Carbon::parse('2016-04-08'),'genero'=>'MMO']);
        $terraria=Game::create(['title'=>'Terraria','description'=>'Dig, fight, explore, build! Nothing is impossible in this action-packed adventure game. Four Pack also available!','image'=>'img/terraria.png','fecha_salida'=>Carbon::parse('2011-05-16'),'genero'=>'Adventure']);
        $spyro_reignited_trilogy=Game::create(['title'=>'Spyro Reignited Trilogy','description'=>'Explore the expansive realms, re-encounter the fiery personalities and relive the adventure in fully remastered glory. Because when there’s a realm that needs saving, there’s only one dragon to call.','image'=>'img/spyro.png','fecha_salida'=>Carbon::parse('2019-09-03'),'genero'=>'Adventure']);
        $rust=Game::create(['title'=>'Rust','description'=>'The only aim in Rust is to survive. Everything wants you to die - the island’s wildlife and other inhabitants, the environment, other survivors. Do whatever it takes to last another night.','image'=>'img/rust.png','fecha_salida'=>Carbon::parse('2018-02-08'),'genero'=>'PVP']);
        $portal_2=Game::create(['title'=>'Portal 2','description'=>'The game’s two-player cooperative mode features its own entirely separate campaign with a unique story, test chambers, and two new player characters. This new mode forces players to reconsider everything they thought they knew about portals. Success will require them to not just act cooperatively, but to think cooperatively.','image'=>'img/portal.png','fecha_salida'=>Carbon::parse('2011-04-19'),'genero'=>'Adventure']);
        $monster_hunter_world=Game::create(['title'=>'Monster Hunter: World','description'=>'As a hunter, youll take on quests to hunt monsters in a variety of habitats.Take down these monsters and receive materials that you can use to create stronger weapons and armor in order to hunt even more dangerous monsters.','image'=>'img/mh.png','fecha_salida'=>Carbon::parse('2018-08-09'),'genero'=>'Action']);
        $beat_saber=Game::create(['title'=>'Beat Saber','description'=>'Beat Saber is a VR rhythm game where you slash the beats of adrenaline-pumping music as they fly towards you, surrounded by a futuristic world.','image'=>'img/beatsaber.png','fecha_salida'=>Carbon::parse('2019-05-21'),'genero'=>'Rythm']);
    }
}
