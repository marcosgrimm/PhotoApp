<?php

namespace App\Http\Controllers;

use App\Models\PhotoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class PhotoController
 * @package App\Http\Controllers
 */
class PhotoController extends Controller
{

    protected $photoModel;

    public function __construct(PhotoModel $photoModel)
    {

        $this->photoModel=$photoModel;
    }

    /**
     * @param null $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($request = null){


        $files = $this->photoModel->index();
        return view('photos', ['photos' => $files   ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store (Request $request){

        $file = $request->file('photo');

        $this->photoModel->store($file);

        return  redirect('/');
    }

    public function update(Request $request){


        $form = $request->all();
        $removeFiles = $form['remove']??[];

        foreach ($removeFiles as $file){
            $this->photoModel->delete($file);
        }

        foreach($form as $file=>$input){
            if ($input){
                $this->photoModel->update($file,$input);
            }

        }
        return  redirect('/');
    }

}
