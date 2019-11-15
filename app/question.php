<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected  $table="question";
    public function getTableColumn()
    {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing('question');
    }
}
