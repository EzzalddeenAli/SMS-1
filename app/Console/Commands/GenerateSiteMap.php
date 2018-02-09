<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

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
        SitemapGenerator::create('http://www.jilcstanauan.com')
            ->getSitemap()
            ->add(Url::create('http://www.jilcstanauan.com/login')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.1))
            ->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap Created');
    }
}
