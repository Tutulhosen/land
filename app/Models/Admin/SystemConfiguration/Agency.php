<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;
    protected $table = 'agencies';
    protected $fillable = ['agency_name', 'agency_type', 'project_id', 'phone', 'whatsapp', 'landline', 'email', 'sign_in_date', 'opening_time', 'address', 'closing_time', 'is_active'];

    public function project()
    {
        return $this->belongsTo(ProjectList::class, 'project_id');
    }
}
