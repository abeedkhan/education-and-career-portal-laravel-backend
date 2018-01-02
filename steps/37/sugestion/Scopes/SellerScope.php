<?php
/**
 * Created by: Md. Abid Azam Khan
 * Email:macatip@gmail.com.
 * Mobile:+8801866454466.
 * Created At: Date- 2/26/2019 , Time- 2:50 PM
 */

namespace App\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SellerScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->has('product');
    }
}