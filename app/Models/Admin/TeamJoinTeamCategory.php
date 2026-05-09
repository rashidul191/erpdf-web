<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class TeamJoinTeamCategory extends Model
{
    protected $fillable = [
        'team_id',
        'team_category_id',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function category()
    {
        return $this->belongsTo(TeamCategory::class, 'team_category_id');
    }
}
