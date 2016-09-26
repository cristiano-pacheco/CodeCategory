<?php


namespace CodePress\CodeCategory\Models;


use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Validator;

class Category extends Model implements SluggableInterface
{

    use SluggableTrait;

    protected $table = "codepress_categories";

    protected $fillable = ['name', 'active', 'parent_id', 'slug'];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to' => 'slug',
        'unique' => true
    ];

    protected $validator;

    public function posts()
    {
        return $this->morphedByMany('\CodePress\CodePost\Models\Post', 'categorizable', 'codepress_categorizables');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function isValid()
    {
        $validator = $this->validator;

        $validator->setRules([
            'name' => 'required|max:255'
        ]);

        $validator->setData($this->getAttributes());

        if ($validator->fails()) {
            $this->errors = $validator->errors();
            return false;
        }

        return true;
    }

    public function setValidator(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function getValidator()
    {
        return $this->validator;
    }
}