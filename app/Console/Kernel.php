<?php

namespace App\Console;

use App\Activite;
use App\Http\Controllers\ActiviteController;
use App\Mail\Contact;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function() {
          $activite =  Activite::with('projet')
            ->where('debut','>=', Carbon::now()->format('Y-m-d'))
            ->get();
            $activites = $this->activiteRepository->getActivite();
            foreach ($activites as $key => $activite) {
                $datediff = $this->datediff($activite->debut,Carbon::now()->format('Y-m-d'));
               if($datediff < 10){
                $contenu = [

                    'title' => 'Mail depuis Letecode.com',
                    'body' => 'Ce mail est pour tester l\'envoi de mail depuis laravel',
                    'name'=> 'Ibra Ndiaye',
                    'email' =>'ibrandiaye@endaecopop.org',
                ];

                Mail::to($activite->email)->send(new Contact($contenu));

                dd("Email envoyé avec succès.");
               }
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
    public function datediff($debut,$fin){


        // Declare and define two dates
        $date1 = strtotime($debut);
        $date2 = strtotime($fin);

        // Formulate the Difference between two dates
        $diff = abs($date2 - $date1);

        // To get the year divide the resultant date into
        // total seconds in a year (365*60*60*24)
        $years = floor($diff / (365*60*60*24));

        // To get the month, subtract it with years and
        // divide the resultant date into
        // total seconds in a month (30*60*60*24)
        $months = floor(($diff - $years * 365*60*60*24)
                                        / (30*60*60*24));

        // To get the day, subtract it with years and
        // months and divide the resultant date into
        // total seconds in a days (60*60*24)
        $days = floor(($diff - $years * 365*60*60*24 -
                    $months*30*60*60*24)/ (60*60*24));



        return $days;


      }
}
