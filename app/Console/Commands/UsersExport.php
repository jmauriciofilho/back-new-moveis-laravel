<?php

namespace App\Console\Commands;

use App\Domain\Users\User;
use Illuminate\Console\Command;

class UsersExport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csktech:users:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export users to csv file.';

    public $users;

    /**
     * Create a new command instance.
     *
     * @param User $user
     */
    public function __construct(User $users)
    {
        parent::__construct();
        $this->users = $users;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('Digite o nome do arquivo csv (sem extensão):');

        if ($name == 'users')
        {
            $this->error('O nome do arquivo é obrigatório. Tente novamente mais tarde!');
        }
        else
        {
            $users = $this->users->all()->toArray();

            $filename = 'app/public/' . str_slug($name) . '.csv';

            $fp = fopen(storage_path($filename), 'w+');

            foreach ($users as $user) {
                fputcsv($fp, $user);
            }

            fclose($fp);

            $this->info('file generated: ' . $filename);
        }
    }
}
