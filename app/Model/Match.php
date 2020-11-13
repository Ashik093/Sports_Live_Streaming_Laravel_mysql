<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
	protected $table = 'matchs';
    protected $fillable = ['category_id','team_one','team_two','team_one_image','team_two_image','time','date','channel_name','channel_link','status','description','score'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

}
