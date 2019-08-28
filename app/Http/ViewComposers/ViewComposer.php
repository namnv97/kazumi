<?php 
namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Model\Option;

class ViewComposer
{
	public function compose(View $view)
    {
    	$logo = '/assets/uploads/images/logo.jpg';

    	$op = Option::where('meta_key','logo')->first();

    	if(!empty($op) && !empty($op->meta_value)) $logo = $op->meta_value;

    	return $view->with('logo',$logo);
    }
}
















 ?>