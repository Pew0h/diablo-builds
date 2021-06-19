<?php

namespace App\Console\Commands;

use App\Models\Build;
use Illuminate\Console\Command;

class StatsBuilds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'builds:stats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get stats for each class';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $builds = Build::all();
        $buildsTotal = Build::all()->count();
        $barbarian = $builds->where('classe', '=', 'barbarian')->count();
        $wizard = $builds->where('classe', '=', 'wizard')->count();
        $crusader = $builds->where('classe', '=', 'crusader')->count();
        $monk = $builds->where('classe', '=', 'monk')->count();
        $necromancer = $builds->where('classe', '=', 'necromancer')->count();
        $witch_doctor = $builds->where('classe', '=', 'witch-doctor')->count();
        $demon_hunter = $builds->where('classe', '=', 'demon-hunter')->count();

        $this->line("<fg=red>  _____  _       _     _         _           _ _     _
 |  __ \(_)     | |   | |       | |         (_) |   | |
 | |  | |_  __ _| |__ | | ___   | |__  _   _ _| | __| |___
 | |  | | |/ _` | '_ \| |/ _ \  | '_ \| | | | | |/ _` / __|
 | |__| | | (_| | |_) | | (_) | | |_) | |_| | | | (_| \__ \
 |_____/|_|\__,_|_.__/|_|\___/  |_.__/ \__,_|_|_|\__,_|___/
 </>");
        $this->setColorLine('green', 'Nombre total de builds enregistres : ' . $buildsTotal);
        $this->setColorLine('cyan', 'Nombre de builds barbare : ' . $barbarian . ' (Soit '.$this->getPourcentage($buildsTotal, $barbarian).')');
        $this->setColorLine('cyan', 'Nombre de builds sorcier : ' . $wizard . ' (Soit '.$this->getPourcentage($buildsTotal, $wizard).')');
        $this->setColorLine('cyan', 'Nombre de builds templier : ' . $crusader . ' (Soit '.$this->getPourcentage($buildsTotal, $crusader).')');
        $this->setColorLine('cyan', 'Nombre de builds moine : ' . $monk . ' (Soit '.$this->getPourcentage($buildsTotal, $monk).')');
        $this->setColorLine('cyan', 'Nombre de builds necromancier : ' . $necromancer . ' (Soit '.$this->getPourcentage($buildsTotal, $necromancer).')');
        $this->setColorLine('cyan', 'Nombre de builds feticheur : ' . $witch_doctor . ' (Soit '.$this->getPourcentage($buildsTotal, $witch_doctor).')');
        $this->setColorLine('cyan', 'Nombre de builds chasseur de demons : ' . $demon_hunter . ' (Soit '.$this->getPourcentage($buildsTotal, $demon_hunter).')');
        return 0;
    }

    public function getPourcentage(int $total, int $nombre)
    {
        return round(($nombre*100)/$total, 2) . '%';
    }

    public function setColorLine(string $color, string $text)
    {
        return $this->line('<fg='.$color.'>' . $text . '</>');
    }
}
