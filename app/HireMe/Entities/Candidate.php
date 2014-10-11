<?php namespace HireMe\Entities;

class Candidate extends \Eloquent {

	protected $fillable = ['website_url', 'description', 'job_type', 'category_id', 'available'];
//    protected $guarded  = [];     // Campos que no se rellenarán en asignación masiva.
    protected $perPage  = 3;

    public function user()
    {
        return $this->hasOne('HireMe\Entities\User', 'id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('HireMe\Entities\Category');
    }

    public function getJobTypeTitleAttribute()
    {
        return \Lang::get('utils.job_types.' . $this->job_type);
    }
}