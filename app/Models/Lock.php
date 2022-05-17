<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Lock
 * @package App\Models
 * @version November 15, 2021, 11:34 am WET
 *
 * @property \Illuminate\Database\Eloquent\Relations\MorphTo $lockable
 * @property \App\Models\User $user
 * @property integer $user_id
 * @property string $lockable_type
 * @property integer $lockable_id
 * @property string|\Carbon\Carbon $locked_at
 */
class Lock extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;

    public $table = 'locks';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'user_id',
        'lockable_type',
        'lockable_id',
        'locked_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'lockable_type' => 'string',
        'lockable_id' => 'integer',
        'locked_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules(){
        return [
            'user_id' => 'required|integer',
            'lockable_type' => 'required|string|max:255',
            'lockable_id' => 'required',
            'locked_at' => 'required',
            'created_at' => 'nullable',
            'updated_at' => 'nullable'
        ];
    }

    /**
     * Attribute labels
     *
     * @return array
     */
    public static function attributeLabels()
    {
        return [
            'id' => __('Id'),
            'user_id' => __('User'),
            'lockable_type' => __('Lockable Type'),
            'lockable_id' => __('Lockable Id'),
            'locked_at' => __('Locked at'),
            'created_at' => __('Created At'),
            'updated_at' => __('Updated At')
        ];
    }

    /**
     * Return the attribute label
     * @param string $attribute
     * @return string
     */
    public function getAttributeLabel($attribute){
        $attributeLabels = static::attributeLabels();
        return isset($attributeLabels[$attribute]) ? $attributeLabels[$attribute] : __($attribute);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * Get the parent lockable model (almost all).
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function lockable()
    {
        return $this->morphTo();
    }

    /**
     * Check if the current model is locked if not lock and update the timer
     * @param $model
     * @return bool
     */
    public static function setLockOrReject($model = null, $modelType = null, $modelId=null, $close = false){
        if(!empty($model)){
            $modelType = get_class($model);
            $modelId = $model->id;
        }
        //this should not happen but if happen not block anything and let the things run
        if(empty($modelType) || empty($modelId)) {
            return true;
        }

        $lock = self::where('lockable_type', $modelType)->where('lockable_id',$modelId)->first();
        //remove the lock
        if($close && !empty($lock) && $lock->user_id == auth()->user()->id){
            $lock->delete();
            return true;
        }
        //don't have any lock so start a lock
        if($lock == null){
            $lock = new Lock();
            $lock->lockable_type = $modelType;
            $lock->lockable_id = $modelId;
            $lock->locked_at = Carbon::now();
            $lock->user_id = auth()->user()->id;
            $lock->save();
            return true;
        }else{ // check if can access
            //is is the same user that have the lock then update the time
            if($lock->user_id == auth()->user()->id){
                $lock->locked_at = Carbon::now();
                $lock->save();
                return true;
            }elseif($lock->locked_at->diffInSeconds() > 60){ // other user
                $lock->user_id = auth()->user()->id;
                $lock->locked_at = Carbon::now();
                $lock->save();
                return true;
            }else{ // if exist a lock from other user in less than 60s
                return false;
            }
        }
    }
}
