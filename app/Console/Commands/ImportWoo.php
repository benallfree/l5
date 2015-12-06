<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportWoo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'woo:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import orders from Woo';

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
     * @return mixed
     */
    public function handle()
    {
      $options = array(
          'ssl_verify'      => false,
      );

      try {

          $client = new \WC_API_Client(env('WOO_URL'), env('WOO_KEY'), env('WOO_SECRET'), $options );
          $orders = $client->orders->get( null, array( 'status' => 'completed' ) );
          dd($orders->orders[0]);
          

      } catch ( \WC_API_Client_Exception $e ) {

          echo $e->getMessage() . PHP_EOL;
          echo $e->getCode() . PHP_EOL;

          if ( $e instanceof \WC_API_Client_HTTP_Exception ) {

              print_r( $e->get_request() );
              print_r( $e->get_response() );
          }
      }      
    }
}
