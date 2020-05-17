<?php

namespace App;

use App\Scopes\ScopePerson;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use DateTimeInterface;

class Person extends Model
{
    use Searchable;

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150'
    );

    protected static function boot()
    {
        parent::boot();
        //static::addGlobalScope(new ScopePerson);
    }

    public function boards()
    {
        return $this->hasMany('App\Board');
    }

    public function getData()
    {
        return "{$this->id}: {$this->name} ({$this->age})";
    }

    public function scopeNameEqual($query, $str)
    {
        return $query->where('name', $str);
    }

    public function scopeAgeGreaterThan($query, $n)
    {
        return $query->where('age', '>=', $n);
    }

    public function scopeAgeLessThan($query, $n)
    {
        return $query->where('age', '<=', $n);
    }

    public function newCollection(array $models = [])
    {
        return new MyCollection($models);
    }

    public function getNameAndIdAttribute()
    {
        return "{$this->name} [id={$this->id}]";
    }

    public function getNameAndMailAttribute()
    {
        return "{$this->name} ({$this->mail})";
    }

    public function getNameAndAgeAttribute()
    {
        return "{$this->name}({$this->age})";
    }

    public function getAllDataAttribute()
    {
        return "{$this->name}({$this->age}) [{$this->mail}]";
    }

    // public function getNameAttribute($value)
    // {
    //     return strtoupper($value);
    // }

    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = strtoupper($value);
    // }

    public function setAllDataAttribute(array $value)
    {
        $this->attributes['name'] = $value[0];
        $this->attributes['mail'] = $value[1];
        $this->attributes['age'] = $value[2];
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        $array['reverse'] = strrev($array['name']);
        return $array;
    }

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        // TZなし
        return $date->format('Y-m-d H:i:s');
    }
}

class MyCollection extends Collection
{
    public function fields()
    {
        $item = $this->first();
        return array_keys($item->toArray());
    }
}
