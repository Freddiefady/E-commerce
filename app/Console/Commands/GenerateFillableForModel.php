<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GenerateFillableForModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:fillable {model}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate $fillable property for the specified model based on the table columns';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $modelName = $this->argument('model');
        $modelClass = "App\\Models\\$modelName";

        if (! self::modelExists($modelClass)) { //check if model not exists
            $this->error("Model {$modelClass} does not exist.");
            return;
        }

        $model = new $modelClass(); // get the model instance
        $tableName = $model->getTable(); // get the table name from the model instance
        if (! self::tableExists($tableName)) { // check if table not exists
            $this->error("Table {$tableName} does not exist.");
            return;
        }

        $fillableColumns = self::getFillableColumns($tableName); // get the fillable columns from the table
        if (empty($fillableColumns)) {
            $this->error("No fillable columns found for table {$tableName}.");
            return;
        }
        self::updateModelFile($modelName, $fillableColumns); // update the model file
    }
    protected function modelExists($modelClass)
    {
        return class_exists($modelClass);
    }
    protected function tableExists($tableName)
    {
        return DB::getSchemaBuilder()->hasTable($tableName);
    }
    protected function getFillableColumns(string $tableName)
    {
        $columns = DB::getSchemaBuilder()->getColumnListing($tableName);
        return array_filter($columns, function ($column){
            return !in_array($column, ['id', 'created_at', 'updated_at']);
        });
    }
    /**
     * update the model file by adding the $fillable property
     * @param string $modelName
     * @param array $fillableColumns
     * @return void
     */
    protected function updateModelFile($modelName, $fillableColumns)
    {
        $modelPath = app_path("Models/{$modelName}.php");
        if (!file_exists($modelPath)) {
            $this->error("Model file {$modelPath} does not exist.");
            return;
        }

        $modelContent = file_get_contents($modelPath);
        if (Str::contains($modelContent, '$fillable')) {
            $this->error("The model already contain a \$fillable array");
        }

        $fillableArray = self::generateFillableArray($fillableColumns);
        $fillableStub = self::generateFillableStub($fillableArray);
        $newContent = str_replace('//', $fillableStub . "\n", $modelContent); //add the $fillable property before the closing bracket

        file_put_contents($modelPath, $newContent);
        $this->info("The \$fillable array has been added to the {$modelName} model.");
    }
    /**
     * Generate the formatted $fillable array
     * @param array $fillableColumns
     * @return string
     */
    protected function generateFillableArray($fillableColumns)
    {
        return "'" . implode("',\n            '", $fillableColumns) . "'";
    }
    /**
     * Generate the stub for the $fillable property.
     * @param string $fillableArray
     * @return string
     */
    protected function generateFillableStub($fillableArray)
    {
        return <<<EOT

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected \$fillable = [
            {$fillableArray}
        ];

EOT;
    }
}
