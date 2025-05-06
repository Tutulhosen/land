<?php

namespace App\Models\Admin\HrAdminSetup;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HrDocuments\OfficialLetter;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentTemplate extends Model
{
    use HasFactory;
    protected $fillable = [
        'documenttemplate_name',
        'template',
        'status',
    ];

    public function officialLetter()
    {
        return $this->belongsTo(OfficialLetter::class, 'letter_type_id');
    }
}
